<?php

namespace App\Services\Sri;

use App\Models\Facturas;
use App\Models\Emisor;
use Illuminate\Support\Facades\Storage;

class SriService
{
    protected $xmlGenerator;
    protected $signer;
    protected $webService;

    public function __construct(XmlGenerator $xmlGenerator, Signer $signer, SriWebService $webService)
    {
        $this->xmlGenerator = $xmlGenerator;
        $this->signer = $signer;
        $this->webService = $webService;
    }

    public function procesarFactura(Facturas $factura)
    {
        $emisor = Emisor::where('is_active', true)->first();


        if (!$emisor) {
            return ['status' => 'error', 'message' => 'No hay emisor configurado'];
        }

        try {


            // 1. Generar XML
            $xmlContent = $this->xmlGenerator->generateFacturaXml($factura, $emisor);

            $claveAcceso = $this->xmlGenerator->generarClaveAcceso($factura, $emisor);

            $fileName = $claveAcceso . '.xml';
            $generatedPath = storage_path('app/xml/generated/' . $fileName);
            $signedPath = storage_path('app/xml/signed/' . $fileName);

            if (!file_exists(dirname($generatedPath)))
                mkdir(dirname($generatedPath), 0777, true);
            if (!file_exists(dirname($signedPath)))
                mkdir(dirname($signedPath), 0777, true);

            file_put_contents($generatedPath, $xmlContent);

            // 2. Firmar XML
            $this->signer->sign($generatedPath, $emisor->path_firma, $emisor->pass_firma, $signedPath);

            // 3. Enviar a SRI (Recepcion)
            $recepcion = $this->webService->recepcionar($signedPath, $emisor->ambiente);

            if ($recepcion->RespuestaRecepcionComprobante->estado === 'RECIBIDA') {
                // 4. Autorizar
                // Wait a bit? Sometimes it's instant.
                sleep(2);
                $autorizacion = $this->webService->autorizar($claveAcceso, $emisor->ambiente);

                // Update Factura
                $factura->clave_acceso = $claveAcceso;
                $factura->xml_path = $signedPath;
                $factura->ambiente = $emisor->ambiente;

                if (isset($autorizacion->autorizaciones->autorizacion->estado) && $autorizacion->autorizaciones->autorizacion->estado === 'AUTORIZADO') {
                    $factura->estado_sri = 'AUTORIZADO';
                    $factura->mensaje_sri = 'Autorizado correctamente';
                    $factura->save();
                    return ['status' => 'success', 'message' => 'Factura autorizada', 'clave_acceso' => $claveAcceso];
                } else {
                    $factura->estado_sri = 'RECHAZADO'; // O ENVIADO si está en proceso
                    // Extract error message
                    $mensaje = json_encode($autorizacion);
                    $factura->mensaje_sri = substr($mensaje, 0, 1000); // Truncate
                    $factura->save();
                    return ['status' => 'error', 'message' => 'Factura no autorizada', 'detalle' => $autorizacion];
                }

            } else {
                $factura->estado_sri = 'RECHAZADO';
                $mensaje = json_encode($recepcion);
                $factura->mensaje_sri = substr($mensaje, 0, 1000);
                $factura->save();
                return ['status' => 'error', 'message' => 'Error en recepción', 'detalle' => $recepcion];
            }

        } catch (\Exception $e) {
            $factura->estado_sri = 'ERROR';
            $factura->mensaje_sri = $e->getMessage();
            $factura->save();
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
