<?php

namespace App\Services\Sri;

use SoapClient;

class SriWebService
{
    const URL_PRUEBAS_RECEPCION = 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl';
    const URL_PRUEBAS_AUTORIZACION = 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl';

    const URL_PRODUCCION_RECEPCION = 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl';
    const URL_PRODUCCION_AUTORIZACION = 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl';

    public function recepcionar($xmlPath, $ambiente)
    {
        $url = ($ambiente == 1) ? self::URL_PRUEBAS_RECEPCION : self::URL_PRODUCCION_RECEPCION;

        try {
            $client = new SoapClient($url);
            $xmlContent = file_get_contents($xmlPath);
            $response = $client->validarComprobante(['xml' => $xmlContent]);
            return $response;
        } catch (\Exception $e) {


            return (object) ['estado' => 'ERROR', 'mensaje' => $e->getMessage()];
        }
    }

    public function autorizar($claveAcceso, $ambiente)
    {


        $url = ($ambiente == 1) ? self::URL_PRUEBAS_AUTORIZACION : self::URL_PRODUCCION_AUTORIZACION;

        try {
            $client = new SoapClient($url);

            $response = $client->autorizacionComprobante(['claveAccesoComprobante' => $claveAcceso]);



            return $response;
        } catch (\Exception $e) {
            return (object) ['estado' => 'ERROR', 'mensaje' => $e->getMessage()];
        }
    }
}
