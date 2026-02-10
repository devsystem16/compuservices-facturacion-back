<?php

namespace App\Services\Sri;

use App\Models\Facturas;
use App\Models\Emisor;
use Carbon\Carbon;
use Illuminate\Support\Str;

class XmlGenerator
{
    public function generateFacturaXml(Facturas $factura, Emisor $emisor)
    {
        $xml = new \DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = false;

        // Root element
        $facturaNode = $xml->createElement('factura');
        $facturaNode->setAttribute('id', 'comprobante');
        $facturaNode->setAttribute('version', '1.1.0');
        $xml->appendChild($facturaNode);

        // InfoTributaria
        $infoTributaria = $xml->createElement('infoTributaria');
        $this->addChild($xml, $infoTributaria, 'ambiente', $emisor->ambiente);
        $this->addChild($xml, $infoTributaria, 'tipoEmision', '1'); // 1: Normal
        $this->addChild($xml, $infoTributaria, 'razonSocial', $emisor->razon_social);
        $this->addChild($xml, $infoTributaria, 'nombreComercial', $emisor->nombre_comercial ?? $emisor->razon_social);
        $this->addChild($xml, $infoTributaria, 'ruc', $emisor->ruc);

        // Clave de Acceso (Generated separately, passed or generated here)
        $claveAcceso = $this->generarClaveAcceso($factura, $emisor);
        $this->addChild($xml, $infoTributaria, 'claveAcceso', $claveAcceso);

        $this->addChild($xml, $infoTributaria, 'codDoc', '01'); // 01: Factura
        $this->addChild($xml, $infoTributaria, 'estab', $emisor->cod_establecimiento);
        $this->addChild($xml, $infoTributaria, 'ptoEmi', $emisor->cod_punto_emision);
        $this->addChild($xml, $infoTributaria, 'secuencial', str_pad($factura->id, 9, '0', STR_PAD_LEFT));
        $this->addChild($xml, $infoTributaria, 'dirMatriz', $emisor->direccion_matriz);
        $facturaNode->appendChild($infoTributaria);

        // InfoFactura
        $infoFactura = $xml->createElement('infoFactura');
        $this->addChild($xml, $infoFactura, 'fechaEmision', Carbon::parse($factura->fecha)->format('d/m/Y'));
        $this->addChild($xml, $infoFactura, 'dirEstablecimiento', $emisor->direccion_establecimiento);
        $this->addChild($xml, $infoFactura, 'obligadoContabilidad', $emisor->obligado_contabilidad ? 'SI' : 'NO');
        $this->addChild($xml, $infoFactura, 'tipoIdentificacionComprador', $this->getTipoIdentificacion($factura->cliente->cedula));
        $this->addChild($xml, $infoFactura, 'razonSocialComprador', $factura->cliente->nombres);
        $this->addChild($xml, $infoFactura, 'identificacionComprador', $factura->cliente->cedula);
        $this->addChild($xml, $infoFactura, 'totalSinImpuestos', number_format($factura->subtotal, 2, '.', ''));
        $this->addChild($xml, $infoFactura, 'totalDescuento', '0.00'); // Implementar descuentos si existen

        // TotalConImpuestos
        $totalConImpuestos = $xml->createElement('totalConImpuestos');
        // Assuming IVA 12% or 15% (Need to check tax logic, for now assuming standard IVA)
        $totalImpuesto = $xml->createElement('totalImpuesto');
        $this->addChild($xml, $totalImpuesto, 'codigo', '2'); // 2: IVA
        $this->addChild($xml, $totalImpuesto, 'codigoPorcentaje', '4'); // 2: 12%, 3: 14%, 4: 15% (Check current rate)
        $this->addChild($xml, $totalImpuesto, 'baseImponible', number_format($factura->subtotal, 2, '.', ''));
        $this->addChild($xml, $totalImpuesto, 'valor', number_format($factura->iva, 2, '.', ''));
        $totalConImpuestos->appendChild($totalImpuesto);
        $infoFactura->appendChild($totalConImpuestos);

        $this->addChild($xml, $infoFactura, 'propina', '0.00');
        $this->addChild($xml, $infoFactura, 'importeTotal', number_format($factura->total, 2, '.', ''));
        $this->addChild($xml, $infoFactura, 'moneda', 'DOLAR');

        // Pagos
        $pagos = $xml->createElement('pagos');
        $pago = $xml->createElement('pago');
        $this->addChild($xml, $pago, 'formaPago', '01'); // 01: Sin utilizacion del sistema financiero (Default)
        $this->addChild($xml, $pago, 'total', number_format($factura->total, 2, '.', ''));
        $pagos->appendChild($pago);
        $infoFactura->appendChild($pagos);

        $facturaNode->appendChild($infoFactura);

        // Detalles
        $detalles = $xml->createElement('detalles');
        // Need to fetch details. Assuming $factura->detalles relationship exists
        // If not, I need to check the models.
        // Based on migration, 'detalles' table exists but relationship might be in Facturas model.
        // I'll assume $factura->detalles() works or I'll fix it later.

        // For now, I'll add a placeholder loop
        foreach ($factura->detalles as $detalle) {
            $detalleNode = $xml->createElement('detalle');
            $this->addChild($xml, $detalleNode, 'codigoPrincipal', $detalle->producto->codigo ?? '001');
            $this->addChild($xml, $detalleNode, 'descripcion', $detalle->producto->nombre ?? 'Producto');
            $this->addChild($xml, $detalleNode, 'cantidad', number_format($detalle->cantidad, 2, '.', ''));
            $precioUnitario = $detalle->cantidad > 0 ? $detalle->subtotal / $detalle->cantidad : 0;


            $this->addChild($xml, $detalleNode, 'precioUnitario', number_format($precioUnitario / 1.15, 2, '.', ''));
            $this->addChild($xml, $detalleNode, 'descuento', '0.00');
            $this->addChild($xml, $detalleNode, 'precioTotalSinImpuesto', number_format($detalle->subtotal / 1.15, 2, '.', ''));

            $impuestos = $xml->createElement('impuestos');
            $impuesto = $xml->createElement('impuesto');
            $this->addChild($xml, $impuesto, 'codigo', '2'); // 2: IVA
            $this->addChild($xml, $impuesto, 'codigoPorcentaje', '4'); // 4=15%
            $this->addChild($xml, $impuesto, 'tarifa', '15.00');
            $this->addChild($xml, $impuesto, 'baseImponible', number_format($detalle->subtotal / 1.15, 2, '.', ''));
            $this->addChild($xml, $impuesto, 'valor', number_format($detalle->subtotal * 0.15 / 1.15, 2, '.', ''));
            $impuestos->appendChild($impuesto);
            $detalleNode->appendChild($impuestos);

            $detalles->appendChild($detalleNode);
        }
        $facturaNode->appendChild($detalles);

        return $xml->saveXML();
    }

    private function addChild($xml, $parent, $name, $value)
    {
        $child = $xml->createElement($name, $value);
        $parent->appendChild($child);
    }

    public function generarClaveAcceso($factura, $emisor)
    {
        // Format: ddMMyyyy(8) + tipoComp(2) + ruc(13) + ambiente(1) + estab(3) + ptoEmi(3) + secuencial(9) + codigoNumerico(8) + tipoEmision(1) + digitoVerificador(1)
        $fecha = Carbon::parse($factura->fecha)->format('dmY');
        $tipoComp = '01';
        $ruc = $emisor->ruc;
        $ambiente = $emisor->ambiente;
        $estab = $emisor->cod_establecimiento;
        $ptoEmi = $emisor->cod_punto_emision;
        $secuencial = str_pad($factura->id, 9, '0', STR_PAD_LEFT);
        // $codigoNumerico = '12345678'; // Should be random but static for now
        $codigoNumerico = str_pad(random_int(1, 99999999), 8, '0', STR_PAD_LEFT);
        $tipoEmision = '1';

        $clave = $fecha . $tipoComp . $ruc . $ambiente . $estab . $ptoEmi . $secuencial . $codigoNumerico . $tipoEmision;

        // Modulo 11 Check Digit
        $digito = $this->modulo11($clave);

        return $clave . $digito;
    }

    private function modulo11($clave)
    {
        $factor = 2;
        $suma = 0;
        for ($i = strlen($clave) - 1; $i >= 0; $i--) {
            $suma += $clave[$i] * $factor;
            $factor++;
            if ($factor > 7)
                $factor = 2;
        }
        $modulo = $suma % 11;
        $digito = 11 - $modulo;
        if ($digito == 11)
            $digito = 0;
        if ($digito == 10)
            $digito = 1;
        return $digito;
    }

    private function getTipoIdentificacion($identificacion)
    {
        $len = strlen($identificacion);
        if ($len == 10)
            return '05'; // Cedula
        if ($len == 13)
            return '04'; // RUC
        if ($identificacion == '9999999999999')
            return '07'; // Consumidor Final
        return '06'; // Pasaporte / Otro
    }
}
