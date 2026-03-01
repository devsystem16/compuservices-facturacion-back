<?php

namespace App\Services;

use App\Models\Bodega;
use App\Models\KardexMovimiento;
use App\Models\Productos;

class KardexService
{
    /**
     * Registrar un movimiento de salida en el Kardex (ej: venta).
     */
    public static function registrarSalida(
        int $productoId,
        float $cantidad,
        string $tipo,
        ?string $detalle = null,
        ?string $referencia = null,
        ?string $usuario = null,
        ?int $bodegaId = null
    ): KardexMovimiento {
        $producto = Productos::findOrFail($productoId);
        $bodegaId = $bodegaId ?? self::bodegaPrincipalId();
        $stockAnterior = $producto->stock;
        $stockNuevo = $stockAnterior - $cantidad;

        $producto->stock = $stockNuevo;
        $producto->save();

        return KardexMovimiento::create([
            'fecha'          => now(),
            'codigo'         => $producto->codigo_barra ?? $producto->id,
            'producto'       => $producto->nombre,
            'bodega_id'      => $bodegaId,
            'detalle'        => $detalle,
            'tipo'           => $tipo,
            'entrada'        => 0,
            'salida'         => $cantidad,
            'saldo'          => $stockNuevo,
            'costo_unitario' => $producto->precio_compra,
            'costo_total'    => $cantidad * $producto->precio_compra,
            'usuario'        => $usuario,
            'referencia'     => $referencia,
            'producto_id'    => $productoId,
        ]);
    }

    /**
     * Registrar un movimiento de entrada en el Kardex (ej: compra, anulación, devolución).
     */
    public static function registrarEntrada(
        int $productoId,
        float $cantidad,
        string $tipo,
        ?string $detalle = null,
        ?string $referencia = null,
        ?string $usuario = null,
        ?int $bodegaId = null
    ): KardexMovimiento {
        $producto = Productos::findOrFail($productoId);
        $bodegaId = $bodegaId ?? self::bodegaPrincipalId();
        $stockAnterior = $producto->stock;
        $stockNuevo = $stockAnterior + $cantidad;

        $producto->stock = $stockNuevo;
        $producto->save();

        return KardexMovimiento::create([
            'fecha'          => now(),
            'codigo'         => $producto->codigo_barra ?? $producto->id,
            'producto'       => $producto->nombre,
            'bodega_id'      => $bodegaId,
            'detalle'        => $detalle,
            'tipo'           => $tipo,
            'entrada'        => $cantidad,
            'salida'         => 0,
            'saldo'          => $stockNuevo,
            'costo_unitario' => $producto->precio_compra,
            'costo_total'    => $cantidad * $producto->precio_compra,
            'usuario'        => $usuario,
            'referencia'     => $referencia,
            'producto_id'    => $productoId,
        ]);
    }

    /**
     * Registrar un ajuste manual de inventario.
     */
    public static function registrarAjuste(
        int $productoId,
        float $cantidad,
        string $tipoAjuste,
        ?string $detalle = null,
        ?string $usuario = null,
        ?int $bodegaId = null
    ): KardexMovimiento {
        $producto = Productos::findOrFail($productoId);
        $bodegaId = $bodegaId ?? self::bodegaPrincipalId();
        $stockAnterior = $producto->stock;

        $entrada = 0;
        $salida = 0;

        if ($tipoAjuste === 'positivo') {
            $entrada = $cantidad;
            $stockNuevo = $stockAnterior + $cantidad;
        } else {
            $salida = $cantidad;
            $stockNuevo = $stockAnterior - $cantidad;
        }

        $producto->stock = $stockNuevo;
        $producto->save();

        return KardexMovimiento::create([
            'fecha'          => now(),
            'codigo'         => $producto->codigo_barra ?? $producto->id,
            'producto'       => $producto->nombre,
            'bodega_id'      => $bodegaId,
            'detalle'        => $detalle ?? 'Ajuste manual de inventario',
            'tipo'           => 'Ajuste',
            'entrada'        => $entrada,
            'salida'         => $salida,
            'saldo'          => $stockNuevo,
            'costo_unitario' => $producto->precio_compra,
            'costo_total'    => $cantidad * $producto->precio_compra,
            'usuario'        => $usuario,
            'referencia'     => null,
            'producto_id'    => $productoId,
        ]);
    }

    /**
     * Registrar una transferencia entre bodegas.
     */
    public static function registrarTransferencia(
        int $productoId,
        float $cantidad,
        int $bodegaOrigenId,
        int $bodegaDestinoId,
        ?string $detalle = null,
        ?string $usuario = null
    ): array {
        $producto = Productos::findOrFail($productoId);
        $bodegaOrigen = Bodega::findOrFail($bodegaOrigenId);
        $bodegaDestino = Bodega::findOrFail($bodegaDestinoId);

        $salida = KardexMovimiento::create([
            'fecha'          => now(),
            'codigo'         => $producto->codigo_barra ?? $producto->id,
            'producto'       => $producto->nombre,
            'bodega_id'      => $bodegaOrigenId,
            'detalle'        => $detalle ?? "Transferencia a {$bodegaDestino->nombre}",
            'tipo'           => 'Transferencia',
            'entrada'        => 0,
            'salida'         => $cantidad,
            'saldo'          => $producto->stock,
            'costo_unitario' => $producto->precio_compra,
            'costo_total'    => $cantidad * $producto->precio_compra,
            'usuario'        => $usuario,
            'referencia'     => null,
            'producto_id'    => $productoId,
        ]);

        $entrada = KardexMovimiento::create([
            'fecha'          => now(),
            'codigo'         => $producto->codigo_barra ?? $producto->id,
            'producto'       => $producto->nombre,
            'bodega_id'      => $bodegaDestinoId,
            'detalle'        => $detalle ?? "Transferencia desde {$bodegaOrigen->nombre}",
            'tipo'           => 'Transferencia',
            'entrada'        => $cantidad,
            'salida'         => 0,
            'saldo'          => $producto->stock,
            'costo_unitario' => $producto->precio_compra,
            'costo_total'    => $cantidad * $producto->precio_compra,
            'usuario'        => $usuario,
            'referencia'     => null,
            'producto_id'    => $productoId,
        ]);

        return ['salida' => $salida, 'entrada' => $entrada];
    }

    /**
     * Obtener el ID de la bodega principal (primera activa o crear una por defecto).
     */
    public static function bodegaPrincipalId(): int
    {
        $bodega = Bodega::where('estado', true)->first();

        if (!$bodega) {
            $bodega = Bodega::create([
                'nombre' => 'Principal',
                'direccion' => null,
                'estado' => true,
            ]);
        }

        return $bodega->id;
    }
}
