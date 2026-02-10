<?php
namespace App\Services\Sri;

use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;
use Illuminate\Support\Facades\Log;

class Signer
{
    public function sign($xmlPath, $p12Path, $password, $outputPath)
    {
        if (!file_exists($xmlPath)) {
            throw new \Exception("XML file not found: $xmlPath");
        }
        if (!file_exists($p12Path)) {
            throw new \Exception("Certificate file not found: $p12Path");
        }

        $doc = new \DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = false;
        $doc->load($xmlPath);

        // Load the certificate
        $certs = [];
        if (!openssl_pkcs12_read(file_get_contents($p12Path), $certs, $password)) {
            throw new \Exception("Could not read certificate file. Check password.");
        }

        $privateKey = $certs['pkey'];
        $signingCert = null;

        // Collect all certificates (main + extra)
        $allCerts = [];
        if (isset($certs['cert'])) {
            $allCerts[] = $certs['cert'];
        }
        if (isset($certs['extracerts']) && is_array($certs['extracerts'])) {
            $allCerts = array_merge($allCerts, $certs['extracerts']);
        }

        Log::info("=== ANÁLISIS DE CERTIFICADOS ===");
        Log::info("Total de certificados encontrados: " . count($allCerts));
        Log::info("Fecha/hora actual del servidor: " . date('Y-m-d H:i:s'));

        // Find a valid certificate that matches the private key
        foreach ($allCerts as $index => $cert) {
            $certInfo = openssl_x509_parse($cert);
            if (!$certInfo) {
                Log::warning("Certificado #$index: No se pudo parsear");
                continue;
            }

            $subject = $certInfo['subject']['CN'] ?? 'Desconocido';
            $validFrom = $certInfo['validFrom_time_t'];
            $validTo = $certInfo['validTo_time_t'];
            $now = time();

            $isDateValid = ($now >= $validFrom && $now <= $validTo);
            $matchesKey = openssl_x509_check_private_key($cert, $privateKey);

            Log::info("Certificado #$index: $subject");
            Log::info("  - Válido desde: " . date('Y-m-d H:i:s', $validFrom));
            Log::info("  - Válido hasta: " . date('Y-m-d H:i:s', $validTo));
            Log::info("  - ¿Fecha válida?: " . ($isDateValid ? 'SÍ' : 'NO'));
            Log::info("  - ¿Coincide con llave privada?: " . ($matchesKey ? 'SÍ' : 'NO'));

            if ($isDateValid && $matchesKey) {
                $signingCert = $cert;
                Log::info("  - ✅ SELECCIONADO PARA FIRMAR");
                break;
            }
        }

        if (!$signingCert) {
            // Buscar cuál certificado coincide con la llave (aunque esté expirado)
            $expiredButMatches = null;
            foreach ($allCerts as $cert) {
                if (openssl_x509_check_private_key($cert, $privateKey)) {
                    $expiredButMatches = openssl_x509_parse($cert);
                    break;
                }
            }

            if ($expiredButMatches) {
                $validTo = $expiredButMatches['validTo_time_t'];
                $subject = $expiredButMatches['subject']['CN'] ?? 'Desconocido';
                throw new \Exception(
                    "El certificado de '$subject' que coincide con tu llave privada EXPIRÓ el: " .
                    date('Y-m-d H:i:s', $validTo) .
                    ". Debes RENOVAR tu firma electrónica en el Banco Central del Ecuador."
                );
            }

            throw new \Exception("No se encontró ningún certificado que coincida con la llave privada.");
        }

        // Register the ID attribute
        $doc->documentElement->setIdAttribute('id', true);

        $objDSig = new XMLSecurityDSig();
        $objDSig->setCanonicalMethod(XMLSecurityDSig::C14N);

        $objDSig->addReference(
            $doc->documentElement,
            XMLSecurityDSig::SHA256,
            ['http://www.w3.org/2000/09/xmldsig#enveloped-signature'],
            ['force_uri' => true, 'uri' => '#comprobante', 'id_name' => 'id', 'overwrite' => false]
        );

        $objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, ['type' => 'private']);
        $objKey->loadKey($privateKey);

        $objDSig->sign($objKey);

        $objDSig->add509Cert($signingCert, true, false, ['subjectName' => true]);

        if (isset($certs['extracerts']) && is_array($certs['extracerts'])) {
            foreach ($certs['extracerts'] as $extraCert) {
                $extraCertInfo = openssl_x509_parse($extraCert);
                if ($extraCertInfo && isset($extraCertInfo['validTo_time_t'])) {
                    if (time() < $extraCertInfo['validTo_time_t']) {
                        if ($extraCert !== $signingCert) {
                            $objDSig->add509Cert($extraCert, true, false);
                        }
                    }
                }
            }
        }

        $objDSig->appendSignature($doc->documentElement);
        $doc->save($outputPath);

        return true;
    }
}
