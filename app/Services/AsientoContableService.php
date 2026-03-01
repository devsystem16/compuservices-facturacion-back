<?php

namespace App\Services;

use App\Models\AsientoContable;
use App\Models\CuentaContable;
use App\Models\DetalleAsiento;
use Illuminate\Support\Facades\DB;

class AsientoContableService
{
    /**
     * Crear asiento contable con sus detalles.
     * $lineas = [['cuenta_contable_id' => X, 'descripcion' => '', 'debe' => 0, 'haber' => 0], ...]
     */
    public function crearAsiento(array $cabecera, array $lineas): AsientoContable
    {
        return DB::transaction(function () use ($cabecera, $lineas) {
            $totalDebe = collect($lineas)->sum('debe');
            $totalHaber = collect($lineas)->sum('haber');

            $asiento = AsientoContable::create([
                'numero' => AsientoContable::siguienteNumero(),
                'fecha' => $cabecera['fecha'],
                'descripcion' => $cabecera['descripcion'],
                'tipo' => $cabecera['tipo'] ?? 'manual',
                'referencia_tipo' => $cabecera['referencia_tipo'] ?? null,
                'referencia_id' => $cabecera['referencia_id'] ?? null,
                'estado' => $cabecera['estado'] ?? 'borrador',
                'usuario_id' => $cabecera['usuario_id'] ?? null,
                'total_debe' => $totalDebe,
                'total_haber' => $totalHaber,
            ]);

            $detalles = [];
            $now = now();
            foreach ($lineas as $linea) {
                $detalles[] = [
                    'asiento_contable_id' => $asiento->id,
                    'cuenta_contable_id' => $linea['cuenta_contable_id'],
                    'descripcion' => $linea['descripcion'] ?? null,
                    'debe' => $linea['debe'] ?? 0,
                    'haber' => $linea['haber'] ?? 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            DetalleAsiento::insert($detalles);

            return $asiento->load('detallesConCuenta');
        });
    }

    /**
     * Generar asiento desde una factura (venta).
     * DEBE: Caja         $total
     * HABER: Ventas      $subtotal
     * HABER: IVA Ventas  $iva
     */
    public function desdeFactura($factura, $usuarioId = null): AsientoContable
    {
        $caja = CuentaContable::where('codigo', '1.1.01')->first();
        $ventas = CuentaContable::where('codigo', '4.1.01')->first();
        $ivaVentas = CuentaContable::where('codigo', '2.1.02')->first();

        $lineas = [
            [
                'cuenta_contable_id' => $caja->id,
                'descripcion' => 'Cobro factura #' . $factura->id,
                'debe' => $factura->total,
                'haber' => 0,
            ],
            [
                'cuenta_contable_id' => $ventas->id,
                'descripcion' => 'Venta factura #' . $factura->id,
                'debe' => 0,
                'haber' => $factura->subtotal,
            ],
        ];

        if ($factura->iva > 0) {
            $lineas[] = [
                'cuenta_contable_id' => $ivaVentas->id,
                'descripcion' => 'IVA factura #' . $factura->id,
                'debe' => 0,
                'haber' => $factura->iva,
            ];
        }

        return $this->crearAsiento([
            'fecha' => $factura->fecha,
            'descripcion' => 'Venta - Factura #' . $factura->id,
            'tipo' => 'venta',
            'referencia_tipo' => 'factura',
            'referencia_id' => $factura->id,
            'estado' => 'contabilizado',
            'usuario_id' => $usuarioId,
        ], $lineas);
    }

    /**
     * Generar asiento desde venta a crédito.
     * DEBE: Cuentas por Cobrar  $total
     * HABER: Ventas             $subtotal
     * HABER: IVA Ventas         $iva
     */
    public function desdeFacturaCredito($factura, $usuarioId = null): AsientoContable
    {
        $cxc = CuentaContable::where('codigo', '1.1.03')->first();
        $ventas = CuentaContable::where('codigo', '4.1.01')->first();
        $ivaVentas = CuentaContable::where('codigo', '2.1.02')->first();

        $lineas = [
            [
                'cuenta_contable_id' => $cxc->id,
                'descripcion' => 'Crédito factura #' . $factura->id,
                'debe' => $factura->total,
                'haber' => 0,
            ],
            [
                'cuenta_contable_id' => $ventas->id,
                'descripcion' => 'Venta a crédito factura #' . $factura->id,
                'debe' => 0,
                'haber' => $factura->subtotal,
            ],
        ];

        if ($factura->iva > 0) {
            $lineas[] = [
                'cuenta_contable_id' => $ivaVentas->id,
                'descripcion' => 'IVA factura #' . $factura->id,
                'debe' => 0,
                'haber' => $factura->iva,
            ];
        }

        return $this->crearAsiento([
            'fecha' => $factura->fecha,
            'descripcion' => 'Venta a crédito - Factura #' . $factura->id,
            'tipo' => 'credito',
            'referencia_tipo' => 'factura',
            'referencia_id' => $factura->id,
            'estado' => 'contabilizado',
            'usuario_id' => $usuarioId,
        ], $lineas);
    }

    /**
     * Generar asiento desde abono a crédito.
     * DEBE: Caja                $abono
     * HABER: Cuentas por Cobrar $abono
     */
    public function desdeAbonoCredito($credito, $montoAbono, $usuarioId = null): AsientoContable
    {
        $caja = CuentaContable::where('codigo', '1.1.01')->first();
        $cxc = CuentaContable::where('codigo', '1.1.03')->first();

        return $this->crearAsiento([
            'fecha' => now()->toDateString(),
            'descripcion' => 'Abono a crédito #' . $credito->id,
            'tipo' => 'abono_credito',
            'referencia_tipo' => 'credito',
            'referencia_id' => $credito->id,
            'estado' => 'contabilizado',
            'usuario_id' => $usuarioId,
        ], [
            [
                'cuenta_contable_id' => $caja->id,
                'descripcion' => 'Cobro abono crédito #' . $credito->id,
                'debe' => $montoAbono,
                'haber' => 0,
            ],
            [
                'cuenta_contable_id' => $cxc->id,
                'descripcion' => 'Abono a cuenta por cobrar crédito #' . $credito->id,
                'debe' => 0,
                'haber' => $montoAbono,
            ],
        ]);
    }

    /**
     * Generar asiento desde un gasto.
     * DEBE: [Cuenta Gasto]  $monto
     * HABER: Caja           $monto
     */
    public function desdeGasto($gasto, $usuarioId = null): AsientoContable
    {
        $caja = CuentaContable::where('codigo', '1.1.01')->first();
        $gastoContable = CuentaContable::where('codigo', '5.1.07')->first(); // Gastos Generales

        return $this->crearAsiento([
            'fecha' => $gasto->fecha,
            'descripcion' => 'Gasto - ' . $gasto->concepto,
            'tipo' => 'gasto',
            'referencia_tipo' => 'gasto',
            'referencia_id' => $gasto->id,
            'estado' => 'contabilizado',
            'usuario_id' => $usuarioId,
        ], [
            [
                'cuenta_contable_id' => $gastoContable->id,
                'descripcion' => $gasto->concepto,
                'debe' => $gasto->monto,
                'haber' => 0,
            ],
            [
                'cuenta_contable_id' => $caja->id,
                'descripcion' => 'Pago gasto - ' . $gasto->concepto,
                'debe' => 0,
                'haber' => $gasto->monto,
            ],
        ]);
    }

    /**
     * Generar asiento desde un retiro de caja.
     * DEBE: Retiros/Gastos Generales  $monto
     * HABER: Caja                     $monto
     */
    public function desdeRetiro($retiro, $usuarioId = null): AsientoContable
    {
        $caja = CuentaContable::where('codigo', '1.1.01')->first();
        $gastoGeneral = CuentaContable::where('codigo', '5.1.07')->first();

        return $this->crearAsiento([
            'fecha' => now()->toDateString(),
            'descripcion' => 'Retiro de caja - ' . $retiro->concepto,
            'tipo' => 'retiro',
            'referencia_tipo' => 'retiro',
            'referencia_id' => $retiro->id,
            'estado' => 'contabilizado',
            'usuario_id' => $usuarioId,
        ], [
            [
                'cuenta_contable_id' => $gastoGeneral->id,
                'descripcion' => 'Retiro: ' . $retiro->concepto,
                'debe' => $retiro->valorRetiro,
                'haber' => 0,
            ],
            [
                'cuenta_contable_id' => $caja->id,
                'descripcion' => 'Salida de caja por retiro',
                'debe' => 0,
                'haber' => $retiro->valorRetiro,
            ],
        ]);
    }

    /**
     * Generar asiento por anulación de factura.
     * Reversa el asiento original.
     */
    public function desdeAnulacionFactura($factura, $usuarioId = null): AsientoContable
    {
        $caja = CuentaContable::where('codigo', '1.1.01')->first();
        $cxc = CuentaContable::where('codigo', '1.1.03')->first();
        $ventas = CuentaContable::where('codigo', '4.1.01')->first();
        $ivaVentas = CuentaContable::where('codigo', '2.1.02')->first();

        $cuentaCredito = $factura->es_credito ? $cxc : $caja;

        $lineas = [
            [
                'cuenta_contable_id' => $ventas->id,
                'descripcion' => 'Anulación venta factura #' . $factura->id,
                'debe' => $factura->subtotal,
                'haber' => 0,
            ],
            [
                'cuenta_contable_id' => $cuentaCredito->id,
                'descripcion' => 'Anulación cobro factura #' . $factura->id,
                'debe' => 0,
                'haber' => $factura->total,
            ],
        ];

        if ($factura->iva > 0) {
            $lineas[] = [
                'cuenta_contable_id' => $ivaVentas->id,
                'descripcion' => 'Anulación IVA factura #' . $factura->id,
                'debe' => $factura->iva,
                'haber' => 0,
            ];
        }

        return $this->crearAsiento([
            'fecha' => now()->toDateString(),
            'descripcion' => 'Anulación - Factura #' . $factura->id,
            'tipo' => 'anulacion',
            'referencia_tipo' => 'factura',
            'referencia_id' => $factura->id,
            'estado' => 'contabilizado',
            'usuario_id' => $usuarioId,
        ], $lineas);
    }
}
