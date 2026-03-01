<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CuentaContable;

class CuentaContableSeeder extends Seeder
{
    public function run()
    {
        $cuentas = [
            // =============================================
            // 1. ACTIVOS
            // =============================================
            ['codigo' => '1', 'nombre' => 'ACTIVOS', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 1, 'es_detalle' => false, 'parent_codigo' => null],

            ['codigo' => '1.1', 'nombre' => 'ACTIVO CORRIENTE', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '1'],
            ['codigo' => '1.1.01', 'nombre' => 'Caja', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.1'],
            ['codigo' => '1.1.02', 'nombre' => 'Bancos', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.1'],
            ['codigo' => '1.1.03', 'nombre' => 'Cuentas por Cobrar', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.1'],
            ['codigo' => '1.1.04', 'nombre' => 'Inventario de Mercaderias', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.1'],
            ['codigo' => '1.1.05', 'nombre' => 'IVA en Compras (Credito Tributario)', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.1'],

            ['codigo' => '1.2', 'nombre' => 'ACTIVO NO CORRIENTE', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '1'],
            ['codigo' => '1.2.01', 'nombre' => 'Equipos y Maquinaria', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.2'],
            ['codigo' => '1.2.02', 'nombre' => 'Muebles y Enseres', 'tipo' => 'activo', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.2'],
            ['codigo' => '1.2.03', 'nombre' => '(-) Depreciacion Acumulada', 'tipo' => 'activo', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '1.2'],

            // =============================================
            // 2. PASIVOS
            // =============================================
            ['codigo' => '2', 'nombre' => 'PASIVOS', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 1, 'es_detalle' => false, 'parent_codigo' => null],

            ['codigo' => '2.1', 'nombre' => 'PASIVO CORRIENTE', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '2'],
            ['codigo' => '2.1.01', 'nombre' => 'Cuentas por Pagar', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '2.1'],
            ['codigo' => '2.1.02', 'nombre' => 'IVA en Ventas', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '2.1'],
            ['codigo' => '2.1.03', 'nombre' => 'Retenciones por Pagar', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '2.1'],
            ['codigo' => '2.1.04', 'nombre' => 'Sueldos por Pagar', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '2.1'],

            ['codigo' => '2.2', 'nombre' => 'PASIVO NO CORRIENTE', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '2'],
            ['codigo' => '2.2.01', 'nombre' => 'Prestamos Bancarios', 'tipo' => 'pasivo', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '2.2'],

            // =============================================
            // 3. PATRIMONIO
            // =============================================
            ['codigo' => '3', 'nombre' => 'PATRIMONIO', 'tipo' => 'patrimonio', 'naturaleza' => 'acreedora', 'nivel' => 1, 'es_detalle' => false, 'parent_codigo' => null],

            ['codigo' => '3.1', 'nombre' => 'CAPITAL', 'tipo' => 'patrimonio', 'naturaleza' => 'acreedora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '3'],
            ['codigo' => '3.1.01', 'nombre' => 'Capital Social', 'tipo' => 'patrimonio', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '3.1'],
            ['codigo' => '3.1.02', 'nombre' => 'Resultados del Ejercicio', 'tipo' => 'patrimonio', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '3.1'],
            ['codigo' => '3.1.03', 'nombre' => 'Resultados Acumulados', 'tipo' => 'patrimonio', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '3.1'],

            // =============================================
            // 4. INGRESOS
            // =============================================
            ['codigo' => '4', 'nombre' => 'INGRESOS', 'tipo' => 'ingreso', 'naturaleza' => 'acreedora', 'nivel' => 1, 'es_detalle' => false, 'parent_codigo' => null],

            ['codigo' => '4.1', 'nombre' => 'INGRESOS OPERACIONALES', 'tipo' => 'ingreso', 'naturaleza' => 'acreedora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '4'],
            ['codigo' => '4.1.01', 'nombre' => 'Ventas de Productos', 'tipo' => 'ingreso', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '4.1'],
            ['codigo' => '4.1.02', 'nombre' => 'Ingresos por Servicios Tecnicos', 'tipo' => 'ingreso', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '4.1'],

            ['codigo' => '4.2', 'nombre' => 'INGRESOS NO OPERACIONALES', 'tipo' => 'ingreso', 'naturaleza' => 'acreedora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '4'],
            ['codigo' => '4.2.01', 'nombre' => 'Otros Ingresos', 'tipo' => 'ingreso', 'naturaleza' => 'acreedora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '4.2'],

            // =============================================
            // 5. GASTOS
            // =============================================
            ['codigo' => '5', 'nombre' => 'GASTOS', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 1, 'es_detalle' => false, 'parent_codigo' => null],

            ['codigo' => '5.1', 'nombre' => 'GASTOS OPERACIONALES', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '5'],
            ['codigo' => '5.1.01', 'nombre' => 'Costo de Ventas', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],
            ['codigo' => '5.1.02', 'nombre' => 'Sueldos y Salarios', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],
            ['codigo' => '5.1.03', 'nombre' => 'Servicios Basicos', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],
            ['codigo' => '5.1.04', 'nombre' => 'Arriendo', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],
            ['codigo' => '5.1.05', 'nombre' => 'Suministros de Oficina', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],
            ['codigo' => '5.1.06', 'nombre' => 'Depreciaciones', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],
            ['codigo' => '5.1.07', 'nombre' => 'Gastos Generales', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.1'],

            ['codigo' => '5.2', 'nombre' => 'GASTOS NO OPERACIONALES', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 2, 'es_detalle' => false, 'parent_codigo' => '5'],
            ['codigo' => '5.2.01', 'nombre' => 'Gastos Financieros', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.2'],
            ['codigo' => '5.2.02', 'nombre' => 'Otros Gastos', 'tipo' => 'gasto', 'naturaleza' => 'deudora', 'nivel' => 3, 'es_detalle' => true, 'parent_codigo' => '5.2'],
        ];

        // Primero insertar todas las cuentas sin parent_id
        $codigoToId = [];

        foreach ($cuentas as $cuenta) {
            $parentId = null;
            if ($cuenta['parent_codigo']) {
                $parentId = $codigoToId[$cuenta['parent_codigo']] ?? null;
            }

            $created = CuentaContable::updateOrCreate(
                ['codigo' => $cuenta['codigo']],
                [
                    'nombre' => $cuenta['nombre'],
                    'tipo' => $cuenta['tipo'],
                    'naturaleza' => $cuenta['naturaleza'],
                    'parent_id' => $parentId,
                    'nivel' => $cuenta['nivel'],
                    'es_detalle' => $cuenta['es_detalle'],
                ]
            );

            $codigoToId[$cuenta['codigo']] = $created->id;
        }
    }
}
