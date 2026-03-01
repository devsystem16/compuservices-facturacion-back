# ESPECIFICACION TECNICA — Modulo Utilidad de Productos

**Proyecto:** CompuServices POS | **Fecha:** 14/02/2026 | **Version:** 1.0
**Estado:** Implementado en Frontend — Pendiente Backend

---

## 1. Resumen del Modulo

El modulo **Utilidad de Productos** permite visualizar la rentabilidad de cada producto en inventario, calculando automaticamente la utilidad unitaria y total basandose en precios de venta, costos unitarios y stock disponible. Incluye filtros por bodega, busqueda general, paginacion y exportacion a Excel.

---

## 2. Ruta y Acceso

| Concepto | Valor |
|----------|-------|
| **Ruta frontend** | `/app/utilidad-productos` |
| **Icono sidebar** | `DollarSign` (ya registrado en NavBar) |
| **Titulo sidebar** | `Utilidad Productos` |
| **Acceso controlado por** | API `api/pantallapos/acceso/obtener-acceso/{tipoUsuario}` |

### Para habilitar en el sidebar (Backend):

Agregar el siguiente registro en la tabla de accesos del backend para los tipos de usuario que lo requieran:

```json
{
  "href": "/app/utilidad-productos",
  "icon": "DollarSign",
  "title": "Utilidad Productos"
}
```

---

## 3. Archivos Frontend Creados

| Archivo | Descripcion |
|---------|-------------|
| `src/context/UtilidadProductosContext.js` | Context provider con llamadas API (listar, exportar, bodegas) |
| `src/views/utilidadProductos/index.js` | Vista principal con filtros, tabla paginada y totales |
| `src/routes.js` | Ruta agregada: `utilidad-productos` |
| `src/index.js` | Provider `UtilidadProductosProvider` registrado |

---

## 4. Endpoints API Requeridos (Backend Laravel)

### 4.1 GET `/api/utilidad-productos`

Retorna la lista paginada de productos con campos calculados de utilidad.

**Parametros Query:**

| Parametro | Tipo | Requerido | Default | Descripcion |
|-----------|------|-----------|---------|-------------|
| `bodega_id` | integer | No | null (todos) | Filtra por bodega especifica |
| `search` | string | No | null | Busqueda parcial en `codigo` y `nombre` |
| `per_page` | integer | No | 25 | Registros por pagina |
| `page` | integer | No | 1 | Pagina actual |

**Respuesta esperada (JSON):**

```json
{
  "data": [
    {
      "id": 10098,
      "codigo": "1555FERT",
      "nombre": "18-46-0 @",
      "precio": 0.695652,
      "precio2": 0.80,
      "precio3": 0.00,
      "stock": 82,
      "costo_unitario": 0.40,
      "costo_total": 32.80,
      "utilidad_unitaria": 0.295652,
      "utilidad_total": 24.24
    }
  ],
  "meta": {
    "current_page": 1,
    "per_page": 25,
    "total": 150
  },
  "totales": {
    "total_costo": 125890.50,
    "total_utilidad": 45230.75,
    "total_stock": 5420
  }
}
```

**Campos calculados (NO almacenados en BD, calculados en la query):**

| Campo | Formula | Descripcion |
|-------|---------|-------------|
| `costo_total` | `costo_unitario * stock` | Costo total del inventario |
| `utilidad_unitaria` | `precio - costo_unitario` | Ganancia por unidad |
| `utilidad_total` | `(precio - costo_unitario) * stock` | Ganancia potencial total |

**Query sugerida (Eloquent):**

```php
$productos = Producto::query()
    ->select([
        'id', 'codigo', 'nombre',
        'precio', 'precio2', 'precio3',
        'stock', 'costo_unitario',
        DB::raw('costo_unitario * stock as costo_total'),
        DB::raw('(precio - costo_unitario) as utilidad_unitaria'),
        DB::raw('(precio - costo_unitario) * stock as utilidad_total'),
    ])
    ->when($request->bodega_id, fn($q, $bodegaId) => $q->where('bodega_id', $bodegaId))
    ->when($request->search, fn($q, $search) => $q->where(function($q) use ($search) {
        $q->where('codigo', 'LIKE', "%{$search}%")
          ->orWhere('nombre', 'LIKE', "%{$search}%");
    }))
    ->whereNull('deleted_at')
    ->paginate($request->per_page ?? 25);
```

**Respuesta con totales generales:**

```php
// Calcular totales con los mismos filtros (sin paginar)
$query = Producto::query()
    ->when($request->bodega_id, fn($q, $bodegaId) => $q->where('bodega_id', $bodegaId))
    ->when($request->search, fn($q, $search) => $q->where(function($q) use ($search) {
        $q->where('codigo', 'LIKE', "%{$search}%")
          ->orWhere('nombre', 'LIKE', "%{$search}%");
    }))
    ->whereNull('deleted_at');

$totales = [
    'total_stock' => $query->sum('stock'),
    'total_costo' => $query->sum(DB::raw('costo_unitario * stock')),
    'total_utilidad' => $query->sum(DB::raw('(precio - costo_unitario) * stock')),
];

return response()->json([
    'data' => $productos->items(),
    'meta' => [
        'current_page' => $productos->currentPage(),
        'per_page' => $productos->perPage(),
        'total' => $productos->total(),
    ],
    'totales' => $totales,
]);
```

---

### 4.2 GET `/api/utilidad-productos/export-excel`

Descarga un archivo `.xlsx` con los datos filtrados.

**Parametros Query:**

| Parametro | Tipo | Requerido | Descripcion |
|-----------|------|-----------|-------------|
| `bodega_id` | integer | No | Filtra por bodega |
| `search` | string | No | Busqueda parcial en codigo/nombre |

**Respuesta:** Archivo binario `.xlsx` con headers:
```
Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
Content-Disposition: attachment; filename="utilidad_productos.xlsx"
```

**Contenido del Excel:**

| Fila | Contenido |
|------|-----------|
| 1 | Titulo: "Utilidad de Productos" |
| 2 | Bodega: "[nombre bodega o Todas]" — Fecha: "[fecha generacion]" |
| 3 | Fila vacia |
| 4 | Encabezados: Id, Codigo, Nombre, Precio, Precio2, Precio3, Stock, Costo Unitario, Costo Total, Utilidad Unitaria, Utilidad Total |
| 5..N | Datos de productos |
| N+1 | **Fila de totales:** Suma de Stock, Costo Total, Utilidad Total |

**Formato condicional:**
- Utilidades negativas en rojo
- Paquete recomendado: `maatwebsite/excel`

**Implementacion sugerida (Laravel):**

```php
// app/Exports/UtilidadProductosExport.php
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UtilidadProductosExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    protected $bodegaId;
    protected $search;

    public function __construct($bodegaId = null, $search = null)
    {
        $this->bodegaId = $bodegaId;
        $this->search = $search;
    }

    public function collection()
    {
        return Producto::query()
            ->select([
                'id', 'codigo', 'nombre',
                'precio', 'precio2', 'precio3',
                'stock', 'costo_unitario',
                DB::raw('costo_unitario * stock as costo_total'),
                DB::raw('(precio - costo_unitario) as utilidad_unitaria'),
                DB::raw('(precio - costo_unitario) * stock as utilidad_total'),
            ])
            ->when($this->bodegaId, fn($q, $id) => $q->where('bodega_id', $id))
            ->when($this->search, fn($q, $s) => $q->where(function($q) use ($s) {
                $q->where('codigo', 'LIKE', "%{$s}%")
                  ->orWhere('nombre', 'LIKE', "%{$s}%");
            }))
            ->whereNull('deleted_at')
            ->get();
    }

    public function headings(): array
    {
        return ['Id', 'Codigo', 'Nombre', 'Precio', 'Precio2', 'Precio3',
                'Stock', 'Costo Unitario', 'Costo Total',
                'Utilidad Unitaria', 'Utilidad Total'];
    }

    public function title(): string
    {
        return 'Utilidad de Productos';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
```

---

### 4.3 GET `/api/bodegas`

Retorna la lista de bodegas activas para el dropdown de filtro.

**Respuesta esperada:**

```json
{
  "data": [
    { "id": 1, "nombre": "Bodega Principal" },
    { "id": 2, "nombre": "Bodega Secundaria" }
  ]
}
```

---

## 5. Archivos Backend a Crear/Modificar

| Archivo | Accion | Descripcion |
|---------|--------|-------------|
| `app/Http/Controllers/UtilidadProductoController.php` | **Crear** | Controller con `index()` y `exportExcel()` |
| `app/Exports/UtilidadProductosExport.php` | **Crear** | Clase de exportacion Excel (maatwebsite/excel) |
| `routes/api.php` | **Modificar** | Agregar rutas del modulo |
| `database/migrations/xxxx_add_campos_utilidad_to_productos.php` | **Crear (si aplica)** | Migracion para `precio2`, `precio3`, `costo_unitario` si no existen |

### Rutas a agregar en `routes/api.php`:

```php
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/utilidad-productos', [UtilidadProductoController::class, 'index']);
    Route::get('/utilidad-productos/export-excel', [UtilidadProductoController::class, 'exportExcel']);
});
```

### Controller sugerido:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UtilidadProductosExport;
use Maatwebsite\Excel\Facades\Excel;

class UtilidadProductoController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::query()
            ->select([
                'id', 'codigo', 'nombre',
                'precio', 'precio2', 'precio3',
                'stock', 'costo_unitario',
                DB::raw('costo_unitario * stock as costo_total'),
                DB::raw('(precio - costo_unitario) as utilidad_unitaria'),
                DB::raw('(precio - costo_unitario) * stock as utilidad_total'),
            ])
            ->when($request->bodega_id, fn($q, $bodegaId) => $q->where('bodega_id', $bodegaId))
            ->when($request->search, fn($q, $search) => $q->where(function($q) use ($search) {
                $q->where('codigo', 'LIKE', "%{$search}%")
                  ->orWhere('nombre', 'LIKE', "%{$search}%");
            }))
            ->whereNull('deleted_at')
            ->paginate($request->per_page ?? 25);

        // Totales generales (mismos filtros, sin paginar)
        $baseQuery = Producto::query()
            ->when($request->bodega_id, fn($q, $bodegaId) => $q->where('bodega_id', $bodegaId))
            ->when($request->search, fn($q, $search) => $q->where(function($q) use ($search) {
                $q->where('codigo', 'LIKE', "%{$search}%")
                  ->orWhere('nombre', 'LIKE', "%{$search}%");
            }))
            ->whereNull('deleted_at');

        $totales = [
            'total_stock' => (int) (clone $baseQuery)->sum('stock'),
            'total_costo' => round((clone $baseQuery)->sum(DB::raw('costo_unitario * stock')), 2),
            'total_utilidad' => round((clone $baseQuery)->sum(DB::raw('(precio - costo_unitario) * stock')), 2),
        ];

        return response()->json([
            'data' => $productos->items(),
            'meta' => [
                'current_page' => $productos->currentPage(),
                'per_page' => $productos->perPage(),
                'total' => $productos->total(),
            ],
            'totales' => $totales,
        ]);
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(
            new UtilidadProductosExport($request->bodega_id, $request->search),
            'utilidad_productos.xlsx'
        );
    }
}
```

---

## 6. Migracion (si aplica)

Verificar si los siguientes campos existen en la tabla `productos`. Si no existen, crear migracion:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'precio2')) {
                $table->decimal('precio2', 10, 2)->default(0)->after('precio');
            }
            if (!Schema::hasColumn('productos', 'precio3')) {
                $table->decimal('precio3', 10, 2)->default(0)->after('precio2');
            }
            if (!Schema::hasColumn('productos', 'costo_unitario')) {
                $table->decimal('costo_unitario', 10, 4)->default(0)->after('stock');
            }
            if (!Schema::hasColumn('productos', 'bodega_id')) {
                $table->unsignedBigInteger('bodega_id')->nullable()->after('costo_unitario');
                $table->foreign('bodega_id')->references('id')->on('bodegas');
            }
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn(['precio2', 'precio3', 'costo_unitario']);
            if (Schema::hasColumn('productos', 'bodega_id')) {
                $table->dropForeign(['bodega_id']);
                $table->dropColumn('bodega_id');
            }
        });
    }
};
```

---

## 7. Estructura Visual del Frontend

```
+----------------------------------------------------------------+
|                   UTILIDAD DE PRODUCTOS                         |
+----------------------------------------------------------------+
| [Buscar por codigo o nombre...] [Bodega: Todos v] [Exportar]   |
+----------------------------------------------------------------+
| Total Stock    | Total Costo Inventario | Total Utilidad        |
| 5,420          | $125,890.50            | $45,230.75            |
+----------------------------------------------------------------+
| Id | Codigo | Nombre | Precio | P2 | P3 | Stock | CU | CT | UU | UT |
|----|--------|--------|--------|----|----|-------|----|----|----|----|
| 01 | ABC123 | Prod1  | $1.50  |$2  |$0  |  100  |0.8 | 80 |0.70|70  |
| 02 | DEF456 | Prod2  | $0.50  |$1  |$0  |   50  |0.7 | 35 |-0.2|-10 |  <- ROJO
+----------------------------------------------------------------+
|           < Pagina 1 de 6 (150 registros) >                    |
+----------------------------------------------------------------+
```

### Comportamiento visual:

- **Encabezado tabla:** Fondo azul oscuro (#1a237e) con texto blanco
- **Filas alternadas:** Blanco / gris claro (#f5f6fa)
- **Utilidad positiva:** Color verde (#388e3c), negrita
- **Utilidad negativa:** Color rojo (#d32f2f), negrita
- **Boton Exportar:** Fondo verde (#43a047)
- **Columnas numericas:** Alineadas a la derecha
- **Columnas texto:** Alineadas a la izquierda
- **Ordenamiento:** Click en encabezado para ordenar ASC/DESC

### Tarjetas de resumen:

| Tarjeta | Color |
|---------|-------|
| Total Stock | Azul (#1e88e5) |
| Total Costo Inventario | Indigo (#3949ab) |
| Total Utilidad | Verde (#43a047) si positivo, Rojo (#e53935) si negativo |

---

## 8. Flujo de Datos Frontend

```
1. Usuario accede a /app/utilidad-productos
2. useEffect carga bodegas (GET /api/bodegas) y productos (GET /api/utilidad-productos?page=1&per_page=25)
3. Frontend renderiza tarjetas de totales + tabla paginada
4. Usuario puede:
   a. Escribir en busqueda + Enter o click lupa -> recarga con search
   b. Cambiar bodega en dropdown -> recarga con bodega_id
   c. Click en encabezado columna -> ordena localmente (frontend)
   d. Click en paginacion -> recarga con page
   e. Click "Exportar Excel" -> descarga archivo .xlsx
```

---

## 9. Dependencias

### Frontend (ya instaladas):
- `@material-ui/core` v4.12.4
- `@material-ui/icons`
- `axios`
- `react-router-dom` v6

### Backend (instalar si no existe):
- `maatwebsite/excel` — `composer require maatwebsite/excel`

---

## 10. Configuracion Backend para Acceso

Para que el modulo aparezca en el sidebar, se debe insertar en la tabla de accesos/pantallas del backend:

```sql
INSERT INTO pantalla_accesos (tipousuario_id, href, icon, title, orden)
VALUES (1, '/app/utilidad-productos', 'DollarSign', 'Utilidad Productos', 15);
```

> Nota: Ajustar `tipousuario_id` y `orden` segun los roles que necesiten acceso.

---

## 11. Checklist de Implementacion Backend

- [ ] Verificar/crear campos `precio2`, `precio3`, `costo_unitario`, `bodega_id` en tabla `productos`
- [ ] Crear migracion si faltan campos
- [ ] Crear endpoint `GET /api/bodegas` si no existe
- [ ] Crear `UtilidadProductoController` con metodos `index()` y `exportExcel()`
- [ ] Crear `UtilidadProductosExport` para exportacion Excel
- [ ] Registrar rutas en `routes/api.php`
- [ ] Instalar `maatwebsite/excel` si no esta instalado
- [ ] Insertar acceso en tabla de pantallas/accesos para roles correspondientes
- [ ] Ejecutar `php artisan migrate --force` en produccion
- [ ] Probar endpoints con Postman/Insomnia

---

*CompuServices — Sistema POS — compustar.top*
