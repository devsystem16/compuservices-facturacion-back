<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permiso;
use App\Models\TipoUsuario;

class PermisosSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            // DASHBOARD (6)
            ['codigo' => 'dashboard.ver', 'modulo' => 'dashboard', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de dashboard'],
            ['codigo' => 'dashboard.ver-estadisticas', 'modulo' => 'dashboard', 'tipo' => 'accion', 'descripcion' => 'Ver estadísticas y gráficos del dashboard'],
            ['codigo' => 'dashboard.ver-ventas-periodo', 'modulo' => 'dashboard', 'tipo' => 'accion', 'descripcion' => 'Ver gráfico Ventas por Período'],
            ['codigo' => 'dashboard.ver-top-productos', 'modulo' => 'dashboard', 'tipo' => 'accion', 'descripcion' => 'Ver gráfico Top 10 Productos'],
            ['codigo' => 'dashboard.ver-top-clientes', 'modulo' => 'dashboard', 'tipo' => 'accion', 'descripcion' => 'Ver gráfico Top 10 Clientes'],
            ['codigo' => 'dashboard.ver-detalles-ventas', 'modulo' => 'dashboard', 'tipo' => 'accion', 'descripcion' => 'Ver tabla Detalles de Ventas'],

            // CLIENTES (5)
            ['codigo' => 'clientes.ver', 'modulo' => 'clientes', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de clientes'],
            ['codigo' => 'clientes.crear', 'modulo' => 'clientes', 'tipo' => 'accion', 'descripcion' => 'Crear nuevos clientes'],
            ['codigo' => 'clientes.editar', 'modulo' => 'clientes', 'tipo' => 'accion', 'descripcion' => 'Editar clientes existentes'],
            ['codigo' => 'clientes.eliminar', 'modulo' => 'clientes', 'tipo' => 'accion', 'descripcion' => 'Eliminar clientes'],
            ['codigo' => 'clientes.buscar', 'modulo' => 'clientes', 'tipo' => 'accion', 'descripcion' => 'Buscar clientes'],

            // PRODUCTOS (5)
            ['codigo' => 'productos.ver', 'modulo' => 'productos', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de productos'],
            ['codigo' => 'productos.crear', 'modulo' => 'productos', 'tipo' => 'accion', 'descripcion' => 'Crear nuevos productos'],
            ['codigo' => 'productos.editar', 'modulo' => 'productos', 'tipo' => 'accion', 'descripcion' => 'Editar productos existentes'],
            ['codigo' => 'productos.eliminar', 'modulo' => 'productos', 'tipo' => 'accion', 'descripcion' => 'Eliminar productos'],
            ['codigo' => 'productos.buscar', 'modulo' => 'productos', 'tipo' => 'accion', 'descripcion' => 'Buscar productos'],

            // INGRESOS / ORDENES (8)
            ['codigo' => 'ingresos.ver', 'modulo' => 'ingresos', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de ingresos/órdenes'],
            ['codigo' => 'ingresos.crear', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Crear nuevos ingresos'],
            ['codigo' => 'ingresos.editar-cliente', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo cliente en ingreso'],
            ['codigo' => 'ingresos.editar-fecha', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo fecha en ingreso'],
            ['codigo' => 'ingresos.editar-serie', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo serie en ingreso'],
            ['codigo' => 'ingresos.editar-equipo', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo equipo en ingreso'],
            ['codigo' => 'ingresos.editar-marca', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo marca en ingreso'],
            ['codigo' => 'ingresos.editar-modelo', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo modelo en ingreso'],
            ['codigo' => 'ingresos.editar-falla', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo falla en ingreso'],
            ['codigo' => 'ingresos.editar-trabajo', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo trabajo en ingreso'],
            ['codigo' => 'ingresos.editar-abono', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo abono en ingreso'],
            ['codigo' => 'ingresos.editar-total', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo total en ingreso'],
            ['codigo' => 'ingresos.editar-estado', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar estado del equipo en ingreso'],
            ['codigo' => 'ingresos.editar-observacion', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Editar campo observación en ingreso'],
            ['codigo' => 'ingresos.imprimir', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Imprimir comprobante de ingreso'],
            ['codigo' => 'ingresos.ver-detalle', 'modulo' => 'ingresos', 'tipo' => 'accion', 'descripcion' => 'Ver detalle de un ingreso'],

            // FACTURACION (6)
            ['codigo' => 'facturacion.ver', 'modulo' => 'facturacion', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de facturación (POS)'],
            ['codigo' => 'facturacion.crear', 'modulo' => 'facturacion', 'tipo' => 'accion', 'descripcion' => 'Crear nuevas facturas'],
            ['codigo' => 'facturacion.anular', 'modulo' => 'facturacion', 'tipo' => 'accion', 'descripcion' => 'Anular facturas (nota de crédito)'],
            ['codigo' => 'facturacion.reimprimir', 'modulo' => 'facturacion', 'tipo' => 'accion', 'descripcion' => 'Reimprimir facturas'],
            ['codigo' => 'facturacion.ver-historial', 'modulo' => 'facturacion', 'tipo' => 'accion', 'descripcion' => 'Ver historial de facturas'],
            ['codigo' => 'facturacion.ver-detalle', 'modulo' => 'facturacion', 'tipo' => 'accion', 'descripcion' => 'Ver detalle de una factura'],
            ['codigo' => 'facturas.editar-forma-pago', 'modulo' => 'facturacion', 'tipo' => 'accion', 'descripcion' => 'Editar forma de pago de facturas'],

            // CREDITOS (5)
            ['codigo' => 'creditos.ver', 'modulo' => 'creditos', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de créditos'],
            ['codigo' => 'creditos.abonar', 'modulo' => 'creditos', 'tipo' => 'accion', 'descripcion' => 'Registrar abonos a créditos'],
            ['codigo' => 'creditos.anular', 'modulo' => 'creditos', 'tipo' => 'accion', 'descripcion' => 'Anular créditos'],
            ['codigo' => 'creditos.ver-historial', 'modulo' => 'creditos', 'tipo' => 'accion', 'descripcion' => 'Ver historial de pagos de créditos'],
            ['codigo' => 'creditos.ver-detalle', 'modulo' => 'creditos', 'tipo' => 'accion', 'descripcion' => 'Ver detalle de un crédito'],

            // PROFORMAS (5)
            ['codigo' => 'proformas.ver', 'modulo' => 'proformas', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de proformas'],
            ['codigo' => 'proformas.crear', 'modulo' => 'proformas', 'tipo' => 'accion', 'descripcion' => 'Crear nuevas proformas'],
            ['codigo' => 'proformas.editar', 'modulo' => 'proformas', 'tipo' => 'accion', 'descripcion' => 'Editar proformas existentes'],
            ['codigo' => 'proformas.eliminar', 'modulo' => 'proformas', 'tipo' => 'accion', 'descripcion' => 'Eliminar proformas'],
            ['codigo' => 'proformas.imprimir', 'modulo' => 'proformas', 'tipo' => 'accion', 'descripcion' => 'Imprimir proformas'],

            // RETIROS (4)
            ['codigo' => 'retiros.ver', 'modulo' => 'retiros', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de retiros'],
            ['codigo' => 'retiros.crear', 'modulo' => 'retiros', 'tipo' => 'accion', 'descripcion' => 'Registrar retiros de caja'],
            ['codigo' => 'retiros.eliminar', 'modulo' => 'retiros', 'tipo' => 'accion', 'descripcion' => 'Eliminar retiros de caja'],
            ['codigo' => 'retiros.ver-historial', 'modulo' => 'retiros', 'tipo' => 'accion', 'descripcion' => 'Ver historial de retiros'],

            // PERIODO / CAJA (3)
            ['codigo' => 'periodo.ver', 'modulo' => 'periodo', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de periodo/caja'],
            ['codigo' => 'periodo.abrir', 'modulo' => 'periodo', 'tipo' => 'accion', 'descripcion' => 'Abrir periodo de caja'],
            ['codigo' => 'periodo.cerrar', 'modulo' => 'periodo', 'tipo' => 'accion', 'descripcion' => 'Cerrar/finalizar periodo de caja'],

            // REPORTES (5)
            ['codigo' => 'reportes.ver', 'modulo' => 'reportes', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de reportes'],
            ['codigo' => 'reportes.ventas-diarias', 'modulo' => 'reportes', 'tipo' => 'accion', 'descripcion' => 'Ver reporte de ventas diarias'],
            ['codigo' => 'reportes.avanzados', 'modulo' => 'reportes', 'tipo' => 'accion', 'descripcion' => 'Ver reportes avanzados (utilidades, inventario, etc.)'],
            ['codigo' => 'reportes.exportar-excel', 'modulo' => 'reportes', 'tipo' => 'accion', 'descripcion' => 'Exportar reportes a Excel'],
            ['codigo' => 'reportes.exportar-pdf', 'modulo' => 'reportes', 'tipo' => 'accion', 'descripcion' => 'Exportar reportes a PDF'],

            // USUARIOS (5)
            ['codigo' => 'usuarios.ver', 'modulo' => 'usuarios', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de gestión de usuarios'],
            ['codigo' => 'usuarios.crear', 'modulo' => 'usuarios', 'tipo' => 'accion', 'descripcion' => 'Crear nuevos usuarios'],
            ['codigo' => 'usuarios.editar', 'modulo' => 'usuarios', 'tipo' => 'accion', 'descripcion' => 'Editar usuarios existentes'],
            ['codigo' => 'usuarios.eliminar', 'modulo' => 'usuarios', 'tipo' => 'accion', 'descripcion' => 'Eliminar usuarios'],
            ['codigo' => 'usuarios.cambiar-password', 'modulo' => 'usuarios', 'tipo' => 'accion', 'descripcion' => 'Cambiar contraseña de usuarios'],

            // GASTOS (5)
            ['codigo' => 'gastos.ver', 'modulo' => 'gastos', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de gastos'],
            ['codigo' => 'gastos.crear', 'modulo' => 'gastos', 'tipo' => 'accion', 'descripcion' => 'Registrar nuevos gastos'],
            ['codigo' => 'gastos.editar', 'modulo' => 'gastos', 'tipo' => 'accion', 'descripcion' => 'Editar gastos existentes'],
            ['codigo' => 'gastos.eliminar', 'modulo' => 'gastos', 'tipo' => 'accion', 'descripcion' => 'Eliminar gastos'],
            ['codigo' => 'gastos.ver-balance', 'modulo' => 'gastos', 'tipo' => 'accion', 'descripcion' => 'Ver balance de caja'],

            // KARDEX (5)
            ['codigo' => 'kardex.ver', 'modulo' => 'kardex', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de kardex'],
            ['codigo' => 'kardex.ajuste', 'modulo' => 'kardex', 'tipo' => 'accion', 'descripcion' => 'Realizar ajustes manuales de inventario'],
            ['codigo' => 'kardex.entrada', 'modulo' => 'kardex', 'tipo' => 'accion', 'descripcion' => 'Registrar entradas manuales de inventario'],
            ['codigo' => 'kardex.transferencia', 'modulo' => 'kardex', 'tipo' => 'accion', 'descripcion' => 'Realizar transferencias entre bodegas'],
            ['codigo' => 'kardex.exportar', 'modulo' => 'kardex', 'tipo' => 'accion', 'descripcion' => 'Exportar kardex a Excel'],

            // PERMISOS (2)
            ['codigo' => 'permisos.ver', 'modulo' => 'permisos', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de gestión de permisos'],
            ['codigo' => 'permisos.asignar', 'modulo' => 'permisos', 'tipo' => 'accion', 'descripcion' => 'Asignar/modificar permisos por tipo de usuario'],

            // UTILIDAD PRODUCTOS (3)
            ['codigo' => 'utilidad-productos.ver', 'modulo' => 'utilidad-productos', 'tipo' => 'pantalla', 'descripcion' => 'Ver pantalla de utilidad por productos'],
            ['codigo' => 'utilidad-productos.ver-detalle', 'modulo' => 'utilidad-productos', 'tipo' => 'accion', 'descripcion' => 'Ver detalle de utilidad por producto'],
            ['codigo' => 'utilidad-productos.exportar', 'modulo' => 'utilidad-productos', 'tipo' => 'accion', 'descripcion' => 'Exportar utilidad de productos a Excel'],

            // CONTABILIDAD (10)
            ['codigo' => 'contabilidad.ver', 'modulo' => 'contabilidad', 'tipo' => 'pantalla', 'descripcion' => 'Ver módulo de contabilidad'],
            ['codigo' => 'contabilidad.cuentas-crear', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Crear cuentas contables'],
            ['codigo' => 'contabilidad.cuentas-editar', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Editar cuentas contables'],
            ['codigo' => 'contabilidad.cuentas-eliminar', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Eliminar cuentas contables'],
            ['codigo' => 'contabilidad.asientos-crear', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Crear asientos contables'],
            ['codigo' => 'contabilidad.asientos-editar', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Editar asientos contables'],
            ['codigo' => 'contabilidad.asientos-contabilizar', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Contabilizar asientos'],
            ['codigo' => 'contabilidad.asientos-anular', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Anular asientos contables'],
            ['codigo' => 'contabilidad.reportes', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Ver reportes contables'],
            ['codigo' => 'contabilidad.exportar', 'modulo' => 'contabilidad', 'tipo' => 'accion', 'descripcion' => 'Exportar reportes contables'],
        ];

        // Insert all permissions
        foreach ($permisos as $permiso) {
            Permiso::updateOrCreate(
                ['codigo' => $permiso['codigo']],
                $permiso
            );
        }

        $todosLosPermisos = Permiso::pluck('id', 'codigo');
        $todosLosIds = $todosLosPermisos->values()->toArray();

        // ============================================
        // ADMINISTRADOR (tipo_usuario_id = 1) — TODOS
        // ============================================
        $admin = TipoUsuario::find(1);
        if ($admin) {
            $admin->permisos()->sync($todosLosIds);
        }

        // ============================================
        // TECNICO (tipo_usuario_id = 2) — Limitado
        // ============================================
        $tecnicoPermisos = [
            'ingresos.ver',
            'ingresos.crear',
            'ingresos.editar-trabajo',
            'ingresos.editar-observacion',
            'ingresos.imprimir',
            'ingresos.ver-detalle',
            'facturacion.ver',
            'facturacion.crear',
            'facturacion.reimprimir',
            'creditos.ver',
            'creditos.abonar',
            'creditos.ver-historial',
        ];
        $tecnico = TipoUsuario::find(2);
        if ($tecnico) {
            $tecnicoIds = $todosLosPermisos->only($tecnicoPermisos)->values()->toArray();
            $tecnico->permisos()->sync($tecnicoIds);
        }

        // ============================================
        // ATENCION AL PUBLICO (tipo_usuario_id = 3)
        // Todo excepto: anular factura, anular crédito, eliminar retiros,
        // usuarios, permisos, y campos restringidos de ingresos
        // ============================================
        $atencionExcluidos = [
            'facturacion.anular',
            'creditos.anular',
            'retiros.eliminar',
            'usuarios.ver',
            'usuarios.crear',
            'usuarios.editar',
            'usuarios.eliminar',
            'usuarios.cambiar-password',
            'permisos.ver',
            'permisos.asignar',
            // Contabilidad — solo administradores
            'contabilidad.ver',
            'contabilidad.cuentas-crear',
            'contabilidad.cuentas-editar',
            'contabilidad.cuentas-eliminar',
            'contabilidad.asientos-crear',
            'contabilidad.asientos-editar',
            'contabilidad.asientos-contabilizar',
            'contabilidad.asientos-anular',
            'contabilidad.reportes',
            'contabilidad.exportar',
            // Campos de ingreso restringidos (basado en Permisos.json: false para ATENCION)
            'ingresos.editar-cliente',
            'ingresos.editar-fecha',
            'ingresos.editar-serie',
            'ingresos.editar-equipo',
            'ingresos.editar-marca',
            'ingresos.editar-modelo',
            'ingresos.editar-falla',
            'ingresos.editar-abono',
            'ingresos.editar-total',
            'ingresos.editar-estado',
        ];
        $atencion = TipoUsuario::find(3);
        if ($atencion) {
            $atencionIds = $todosLosPermisos->except($atencionExcluidos)->values()->toArray();
            $atencion->permisos()->sync($atencionIds);
        }

        // ============================================
        // SUPER USUARIO (tipo_usuario_id = 4) — TODOS
        // ============================================
        $superUsuario = TipoUsuario::find(4);
        if ($superUsuario) {
            $superUsuario->permisos()->sync($todosLosIds);
        }
    }
}
