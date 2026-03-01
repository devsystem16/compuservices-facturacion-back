# Implementar Modulo de Contabilidad — Frontend

## Contexto del proyecto

El frontend es una app **React 18 + Material-UI v4 + Context API + Axios**. La estructura sigue este patron:
- **Context** (`src/context/`) — Estado y llamadas API (similar a `KardexContext.js`)
- **Views** (`src/views/`) — Paginas/pantallas
- **Components** (`src/components/`) — Componentes reutilizables
- **Environment/config.js** — Instancia Axios con `REACT_APP_BASE_URL`

Para este modulo, usa como referencia directa el modulo de **Kardex** (`src/context/KardexContext.js`, `src/views/kardex/index.js`) ya que tiene estructura identica (CRUD + filtros + modals + reportes).

La API base es la misma del proyecto: `API` importado desde `src/Environment/config.js`.

---

## Que se debe crear

### Archivos nuevos

```
src/context/ContabilidadContext.js       ← Estado global del modulo
src/views/contabilidad/index.js          ← Pagina principal (tabs: Plan de Cuentas | Asientos | Reportes)
src/views/contabilidad/PlanCuentas.js    ← Tab plan de cuentas (arbol + CRUD)
src/views/contabilidad/Asientos.js       ← Tab asientos contables (listado + crear/ver/editar)
src/views/contabilidad/Reportes.js       ← Tab reportes contables
src/components/Contabilidad/ModalAsiento.js       ← Modal crear/editar asiento
src/components/Contabilidad/DetalleAsiento.js     ← Vista detalle de un asiento
src/components/Contabilidad/FormCuenta.js         ← Form crear/editar cuenta contable
src/components/Contabilidad/ArbolCuentas.js       ← Componente arbol jerarquico
```

### Archivos a modificar

```
src/index.js                          ← Agregar <ContabilidadProvider>
src/routes.js                         ← Agregar ruta /app/contabilidad
src/context/LoginContext.js           ← El menu ya se carga dinamico, no requiere cambio manual
```

---

## 1. ContabilidadContext.js

Crear el context con este patron (igual que KardexContext):

```javascript
import React, { createContext, useState } from 'react';
import API from '../Environment/config';

export const ContabilidadContext = createContext();

export const ContabilidadProvider = ({ children }) => {

  // ========== ESTADO ==========

  // Plan de cuentas
  const [cuentasArbol, setCuentasArbol] = useState([]);         // GET /api/cuenta-contables
  const [cuentasLista, setCuentasLista] = useState([]);          // GET /api/cuenta-contables/lista
  const [loadingCuentas, setLoadingCuentas] = useState(false);

  // Asientos
  const [asientos, setAsientos] = useState([]);
  const [paginacion, setPaginacion] = useState({});
  const [loadingAsientos, setLoadingAsientos] = useState(false);
  const [asientoSeleccionado, setAsientoSeleccionado] = useState(null);

  // Filtros asientos
  const [filtrosAsientos, setFiltrosAsientos] = useState({
    fecha_desde: '',
    fecha_hasta: '',
    tipo: '',
    estado: '',
    limite: 25,
  });

  // Reportes
  const [reporteData, setReporteData] = useState(null);
  const [loadingReporte, setLoadingReporte] = useState(false);

  // Modals
  const [modalAsiento, setModalAsiento] = useState(false);      // crear/editar asiento
  const [modalCuenta, setModalCuenta] = useState(false);        // crear/editar cuenta
  const [modalDetalle, setModalDetalle] = useState(false);       // ver detalle asiento

  // ========== ENDPOINTS ==========

  const END_POINTS = {
    cuentasArbol:     'api/cuenta-contables',
    cuentasLista:     'api/cuenta-contables/lista',
    cuentas:          'api/cuenta-contables',
    asientos:         'api/asientos-contables',
    generarFactura:   'api/asientos-contables/generar/desde-factura/',
    generarGasto:     'api/asientos-contables/generar/desde-gasto/',
    generarRetiro:    'api/asientos-contables/generar/desde-retiro/',
    libroDiario:      'api/contabilidad/libro-diario',
    libroMayor:       'api/contabilidad/libro-mayor',
    balanceComprobacion: 'api/contabilidad/balance-comprobacion',
    balanceGeneral:   'api/contabilidad/balance-general',
    estadoResultados: 'api/contabilidad/estado-resultados',
  };

  // ========== FUNCIONES ==========
  // (implementar cada una segun la documentacion de API abajo)

  const value = {
    // Estado
    cuentasArbol, cuentasLista, loadingCuentas,
    asientos, paginacion, loadingAsientos, asientoSeleccionado,
    filtrosAsientos, setFiltrosAsientos,
    reporteData, loadingReporte,
    modalAsiento, setModalAsiento,
    modalCuenta, setModalCuenta,
    modalDetalle, setModalDetalle,
    // Funciones plan de cuentas
    obtenerCuentasArbol, obtenerCuentasLista,
    crearCuenta, editarCuenta, eliminarCuenta,
    // Funciones asientos
    obtenerAsientos, crearAsiento, editarAsiento,
    verAsiento, contabilizarAsiento, anularAsiento,
    generarDesdeFactura, generarDesdeGasto, generarDesdeRetiro,
    // Funciones reportes
    obtenerLibroDiario, obtenerLibroMayor,
    obtenerBalanceComprobacion, obtenerBalanceGeneral,
    obtenerEstadoResultados,
  };

  return (
    <ContabilidadContext.Provider value={value}>
      {children}
    </ContabilidadContext.Provider>
  );
};
```

---

## 2. API — Todos los endpoints con request/response

### 2.1 Plan de Cuentas

#### GET `api/cuenta-contables` — Arbol completo
```
Response:
{
  "data": [
    {
      "id": 1, "codigo": "1", "nombre": "ACTIVOS", "tipo": "activo",
      "naturaleza": "deudora", "parent_id": null, "nivel": 1,
      "es_detalle": false, "activo": true,
      "children_recursive": [
        {
          "id": 2, "codigo": "1.1", "nombre": "ACTIVO CORRIENTE",
          "children_recursive": [
            { "id": 3, "codigo": "1.1.01", "nombre": "Caja", "es_detalle": true, "children_recursive": [] }
          ]
        }
      ]
    }
  ]
}
```

#### GET `api/cuenta-contables/lista` — Solo cuentas de detalle (para selects)
```
Response:
{
  "data": [
    { "id": 3, "codigo": "1.1.01", "nombre": "Caja", "tipo": "activo", "naturaleza": "deudora" },
    { "id": 4, "codigo": "1.1.02", "nombre": "Bancos", "tipo": "activo", "naturaleza": "deudora" },
    ...28 cuentas de detalle
  ]
}
```

#### POST `api/cuenta-contables` — Crear cuenta
```
Request:
{
  "codigo": "5.1.08",
  "nombre": "Publicidad y Marketing",
  "tipo": "gasto",             // activo | pasivo | patrimonio | ingreso | gasto
  "naturaleza": "deudora",     // deudora | acreedora
  "parent_id": 33,             // ID de la cuenta padre (o null)
  "nivel": 3,                  // 1-5
  "es_detalle": true           // true = puede recibir movimientos
}

Response 201:
{ "codigo": 201, "mensaje": "Cuenta contable creada correctamente", "data": { ...cuenta } }
```

#### PUT `api/cuenta-contables/{id}` — Editar cuenta
Mismos campos que crear, todos opcionales.

#### DELETE `api/cuenta-contables/{id}` — Eliminar cuenta
```
Response 200: { "codigo": 200, "mensaje": "Cuenta contable eliminada correctamente" }
Response 422: { "codigo": 422, "mensaje": "No se puede eliminar: la cuenta tiene movimientos contables" }
Response 422: { "codigo": 422, "mensaje": "No se puede eliminar: la cuenta tiene subcuentas" }
```

---

### 2.2 Asientos Contables

#### GET `api/asientos-contables` — Listar con filtros y paginacion
```
Query params: ?fecha_desde=2026-02-01&fecha_hasta=2026-02-28&tipo=venta&estado=contabilizado&limite=25&page=1

Response (paginado estilo Laravel):
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "numero": 1,
      "fecha": "2026-02-15",
      "descripcion": "Venta - Factura #42",
      "tipo": "venta",                    // manual|venta|gasto|retiro|credito|abono_credito|anulacion|ajuste|cierre
      "referencia_tipo": "factura",       // factura|gasto|retiro|credito|null
      "referencia_id": 42,
      "estado": "contabilizado",          // borrador|contabilizado|anulado
      "total_debe": "150.00",
      "total_haber": "150.00",
      "created_at": "2026-02-15T10:30:00",
      "detalles_con_cuenta": [
        {
          "id": 1,
          "cuenta_contable_id": 3,
          "descripcion": "Cobro factura #42",
          "debe": "150.00",
          "haber": "0.00",
          "cuenta_contable": { "id": 3, "codigo": "1.1.01", "nombre": "Caja" }
        },
        {
          "id": 2,
          "cuenta_contable_id": 28,
          "descripcion": "Venta factura #42",
          "debe": "0.00",
          "haber": "133.93",
          "cuenta_contable": { "id": 28, "codigo": "4.1.01", "nombre": "Ventas de Productos" }
        },
        {
          "id": 3,
          "cuenta_contable_id": 15,
          "descripcion": "IVA factura #42",
          "debe": "0.00",
          "haber": "16.07",
          "cuenta_contable": { "id": 15, "codigo": "2.1.02", "nombre": "IVA en Ventas" }
        }
      ]
    }
  ],
  "total": 100,
  "per_page": 25,
  "last_page": 4
}
```

#### POST `api/asientos-contables` — Crear asiento manual
```
Request:
{
  "fecha": "2026-02-15",
  "descripcion": "Pago de arriendo del local - Febrero 2026",
  "usuario_id": 1,
  "lineas": [
    { "cuenta_contable_id": 38, "descripcion": "Arriendo febrero", "debe": 500.00, "haber": 0 },
    { "cuenta_contable_id": 3, "descripcion": "Pago desde caja", "debe": 0, "haber": 500.00 }
  ]
}

Validaciones (el back las hace, pero el front deberia validar tambien):
- Minimo 2 lineas
- total_debe === total_haber (asiento cuadrado)
- Cada linea: debe > 0 O haber > 0 (no ambos, no cero en ambos)

Response 201:
{ "codigo": 201, "mensaje": "Asiento contable creado correctamente", "data": { ...asiento con detalles } }

Response 422 (no cuadrado):
{ "codigo": 422, "mensaje": "El asiento no esta cuadrado. Debe ($600.00) != Haber ($500.00)" }
```

#### GET `api/asientos-contables/{id}` — Ver detalle
```
Response: { "data": { ...asiento completo con detalles_con_cuenta } }
```

#### PUT `api/asientos-contables/{id}` — Editar (solo estado borrador)
```
Request (misma estructura que crear, todos los campos opcionales):
{
  "fecha": "2026-02-16",
  "descripcion": "Descripcion corregida",
  "lineas": [ ...nuevas lineas reemplazan las anteriores ]
}

Response 422: { "codigo": 422, "mensaje": "Solo se pueden editar asientos en estado borrador" }
```

#### POST `api/asientos-contables/{id}/contabilizar`
```
Response 200: { "codigo": 200, "mensaje": "Asiento contabilizado correctamente", "data": { ...asiento } }
Response 422: { "codigo": 422, "mensaje": "Solo se pueden contabilizar asientos en estado borrador" }
```

#### POST `api/asientos-contables/{id}/anular`
```
Response 200: { "codigo": 200, "mensaje": "Asiento anulado correctamente", "data": { ...asiento } }
Response 422: { "codigo": 422, "mensaje": "El asiento ya esta anulado" }
```

---

### 2.3 Generacion automatica (para usar desde otras pantallas)

#### POST `api/asientos-contables/generar/desde-factura/{facturaId}`
```
Genera automaticamente:
- Venta contado: DEBE Caja → HABER Ventas + IVA
- Venta credito: DEBE CxC → HABER Ventas + IVA

Response 201: { "codigo": 201, "mensaje": "Asiento generado desde factura correctamente", "data": { ...asiento } }
Response 422: { "codigo": 422, "mensaje": "Ya existe un asiento contable para esta factura (Asiento #3)" }
```

#### POST `api/asientos-contables/generar/desde-gasto/{gastoId}`
```
Genera: DEBE Gastos Generales → HABER Caja

Response 201: { "codigo": 201, "mensaje": "Asiento generado desde gasto correctamente", "data": { ...asiento } }
Response 422: { "codigo": 422, "mensaje": "Ya existe un asiento contable para este gasto (Asiento #5)" }
```

#### POST `api/asientos-contables/generar/desde-retiro/{retiroId}`
```
Genera: DEBE Gastos Generales → HABER Caja

Response 201: { "codigo": 201, "mensaje": "Asiento generado desde retiro correctamente", "data": { ...asiento } }
```

---

### 2.4 Reportes Contables

#### POST `api/contabilidad/libro-diario`
```
Request: { "fecha_desde": "2026-02-01", "fecha_hasta": "2026-02-28" }

Response:
{
  "data": [ ...array de asientos contabilizados con detalles_con_cuenta ],
  "totales": { "total_debe": 5250.00, "total_haber": 5250.00 },
  "periodo": { "desde": "2026-02-01", "hasta": "2026-02-28" }
}
```

#### POST `api/contabilidad/libro-mayor`
```
Request (resumen todas las cuentas):
{ "fecha_desde": "2026-02-01", "fecha_hasta": "2026-02-28" }

Response:
{
  "data": [
    { "cuenta_contable_id": 3, "codigo": "1.1.01", "nombre": "Caja", "naturaleza": "deudora",
      "total_debe": 3500.00, "total_haber": 1200.00, "saldo": 2300.00 },
    { "cuenta_contable_id": 28, "codigo": "4.1.01", "nombre": "Ventas de Productos", "naturaleza": "acreedora",
      "total_debe": 0, "total_haber": 3125.00, "saldo": 3125.00 }
  ],
  "periodo": { "desde": "2026-02-01", "hasta": "2026-02-28" }
}

Request (detalle de UNA cuenta):
{ "fecha_desde": "2026-02-01", "fecha_hasta": "2026-02-28", "cuenta_contable_id": 3 }

Response:
{
  "cuenta": { "codigo": "1.1.01", "nombre": "Caja", "total_debe": 3500, "total_haber": 1200, "saldo": 2300 },
  "movimientos": [
    { "id": 1, "numero": 1, "fecha": "2026-02-15", "asiento_descripcion": "Venta - Factura #42",
      "descripcion": "Cobro factura #42", "debe": "150.00", "haber": "0.00" },
    ...
  ],
  "periodo": { ... }
}
```

#### POST `api/contabilidad/balance-comprobacion`
```
Request: { "fecha_desde": "2026-01-01", "fecha_hasta": "2026-02-28" }

Response:
{
  "data": [
    { "codigo": "1.1.01", "nombre": "Caja", "tipo": "activo", "naturaleza": "deudora",
      "total_debe": 5000, "total_haber": 2000, "saldo": 3000, "saldo_debe": 3000, "saldo_haber": 0 },
    { "codigo": "4.1.01", "nombre": "Ventas", "tipo": "ingreso", "naturaleza": "acreedora",
      "total_debe": 100, "total_haber": 4500, "saldo": 4400, "saldo_debe": 0, "saldo_haber": 4400 }
  ],
  "totales": {
    "total_debe": 10000, "total_haber": 10000,
    "saldo_debe": 5000, "saldo_haber": 5000
  },
  "periodo": { ... }
}
```

#### POST `api/contabilidad/balance-general`
```
Request: { "fecha_hasta": "2026-02-28" }

Response:
{
  "activos": [
    { "codigo": "1.1.01", "nombre": "Caja", "saldo": 3000 },
    { "codigo": "1.1.03", "nombre": "Cuentas por Cobrar", "saldo": 500 }
  ],
  "pasivos": [
    { "codigo": "2.1.02", "nombre": "IVA en Ventas", "saldo": 600 }
  ],
  "patrimonio": [
    { "codigo": "3.1.01", "nombre": "Capital Social", "saldo": 10000 }
  ],
  "totales": {
    "activos": 11500, "pasivos": 600, "patrimonio": 10000, "pasivos_patrimonio": 10600
  },
  "fecha_corte": "2026-02-28"
}
```

#### POST `api/contabilidad/estado-resultados`
```
Request: { "fecha_desde": "2026-02-01", "fecha_hasta": "2026-02-28" }

Response:
{
  "ingresos": [
    { "codigo": "4.1.01", "nombre": "Ventas de Productos", "saldo": 4500 },
    { "codigo": "4.1.02", "nombre": "Servicios Tecnicos", "saldo": 800 }
  ],
  "gastos": [
    { "codigo": "5.1.01", "nombre": "Costo de Ventas", "saldo": 2000 },
    { "codigo": "5.1.07", "nombre": "Gastos Generales", "saldo": 300 }
  ],
  "totales": { "ingresos": 5300, "gastos": 2300, "utilidad_neta": 3000 },
  "periodo": { ... }
}
```

---

## 3. Pantallas a construir

### 3.1 Vista principal: `/app/contabilidad`

Pagina con **3 tabs** (usar Material-UI `Tabs`):

```
[ Plan de Cuentas ]  [ Asientos Contables ]  [ Reportes ]
```

### 3.2 Tab: Plan de Cuentas

**Layout:**
- Boton "Nueva Cuenta" arriba a la derecha
- Arbol jerarquico expandible/colapsable (usar `TreeView` de MUI o arbol custom)
- Cada nodo muestra: `codigo` - `nombre` (`tipo`)
- Las cuentas de detalle (`es_detalle: true`) mostrar con icono diferente
- Cada cuenta tiene botones: Editar | Eliminar (solo si es_detalle y no tiene movimientos)

**Arbol visual ejemplo:**
```
▼ 1 - ACTIVOS
  ▼ 1.1 - ACTIVO CORRIENTE
      📄 1.1.01 - Caja                    [Editar] [Eliminar]
      📄 1.1.02 - Bancos                  [Editar] [Eliminar]
      📄 1.1.03 - Cuentas por Cobrar      [Editar] [Eliminar]
  ▼ 1.2 - ACTIVO NO CORRIENTE
      📄 1.2.01 - Equipos y Maquinaria    [Editar] [Eliminar]
▼ 2 - PASIVOS
  ...
```

**Modal crear/editar cuenta:**
- Campos: codigo, nombre, tipo (select), naturaleza (select), cuenta padre (select con lista plana), nivel, es_detalle (checkbox)
- Para "cuenta padre": usar `GET /api/cuenta-contables/lista` para dropdown, o permitir seleccionar del arbol

### 3.3 Tab: Asientos Contables

**Layout:**
- **Filtros arriba:** Fecha desde, Fecha hasta, Tipo (select), Estado (select), Boton Filtrar
- **Boton "Nuevo Asiento"** arriba a la derecha
- **Tabla con columnas:**

| # | Fecha | Descripcion | Tipo | Estado | Debe | Haber | Acciones |
|---|-------|-------------|------|--------|------|-------|----------|

- **Columna Tipo:** Mostrar con chip/badge de color:
  - `manual` → gris
  - `venta` → verde
  - `credito` → azul
  - `gasto` → rojo
  - `retiro` → naranja
  - `anulacion` → rojo oscuro
  - `abono_credito` → celeste

- **Columna Estado:** Chip con color:
  - `borrador` → amarillo
  - `contabilizado` → verde
  - `anulado` → rojo

- **Acciones por fila:**
  - 👁 Ver detalle (siempre)
  - ✏ Editar (solo si estado = borrador)
  - ✅ Contabilizar (solo si estado = borrador)
  - ❌ Anular (solo si estado != anulado)

- **Paginacion** abajo (usar `TablePagination` de MUI, misma logica que Kardex)

**Opciones del select Tipo:**
```
[Todos, Manual, Venta, Gasto, Retiro, Credito, Abono Credito, Anulacion, Ajuste, Cierre]
```

**Opciones del select Estado:**
```
[Todos, Borrador, Contabilizado, Anulado]
```

### 3.4 Modal: Crear/Editar Asiento

**Campos:**
- **Fecha** (date picker)
- **Descripcion** (text input)
- **Tabla de lineas** (editable):

| Cuenta (select) | Descripcion | Debe | Haber | [X] |
|------------------|-------------|------|-------|-----|
| 1.1.01 - Caja   | Cobro venta | 500  | 0     | ❌  |
| 4.1.01 - Ventas  | Venta prod  | 0    | 500   | ❌  |
| [+ Agregar linea]                                     |

- **Select de cuenta:** Usar las cuentas de `GET /api/cuenta-contables/lista`. Mostrar como `codigo - nombre` en el dropdown.
- **Boton [+ Agregar linea]** agrega una fila vacia
- **[X]** elimina la fila (minimo 2 filas)
- **Totales al pie:**
  ```
  Total Debe: $500.00    Total Haber: $500.00    ✅ Cuadrado
  ```
  Si no cuadra, mostrar en rojo: `❌ Diferencia: $100.00`
- **Boton Guardar** solo habilitado si cuadra y hay minimo 2 lineas

### 3.5 Modal/Vista: Detalle de Asiento

Mostrar en formato contable:

```
╔══════════════════════════════════════════════════════════╗
║  ASIENTO CONTABLE #1                                     ║
║  Fecha: 15/02/2026                                       ║
║  Descripcion: Venta - Factura #42                        ║
║  Tipo: Venta          Estado: ✅ Contabilizado           ║
╠══════════════════════════════════════════════════════════╣
║  Cuenta          | Descripcion       | Debe    | Haber   ║
║  1.1.01 Caja     | Cobro factura #42 | $150.00 |         ║
║  4.1.01 Ventas   | Venta factura #42 |         | $133.93 ║
║  2.1.02 IVA Vtas | IVA factura #42   |         |  $16.07 ║
╠══════════════════════════════════════════════════════════╣
║                    TOTALES            | $150.00 | $150.00 ║
╚══════════════════════════════════════════════════════════╝
```

Si `referencia_tipo` no es null, mostrar un link: "Documento origen: Factura #42"

### 3.6 Tab: Reportes Contables

**Layout:**
- **Selector de reporte** (select o tabs internos):
  - Libro Diario
  - Libro Mayor
  - Balance de Comprobacion
  - Balance General
  - Estado de Resultados

- **Filtros** (depende del reporte):
  - Libro Diario: `fecha_desde`, `fecha_hasta`
  - Libro Mayor: `fecha_desde`, `fecha_hasta`, `cuenta_contable_id` (opcional, select)
  - Balance Comprobacion: `fecha_desde`, `fecha_hasta`
  - Balance General: `fecha_hasta`
  - Estado Resultados: `fecha_desde`, `fecha_hasta`

- **Boton "Generar Reporte"**

#### Libro Diario — Vista tabla
Mostrar cada asiento con sus lineas expandibles (accordion o tabla anidada):

| # | Fecha | Descripcion | Cuenta | Debe | Haber |
|---|-------|-------------|--------|------|-------|
| 1 | 15/02 | Venta Factura #42 | | | |
|   |       | Cobro factura #42 | 1.1.01 Caja | $150.00 | |
|   |       | Venta factura #42 | 4.1.01 Ventas | | $133.93 |
|   |       | IVA factura #42 | 2.1.02 IVA | | $16.07 |
| 2 | 15/02 | Gasto - Arriendo | | | |
|   |       | Arriendo feb | 5.1.04 Arriendo | $500.00 | |
|   |       | Pago desde caja | 1.1.01 Caja | | $500.00 |
| **TOTALES** | | | | **$650.00** | **$650.00** |

#### Libro Mayor — Vista tabla
Sin cuenta seleccionada (resumen):

| Codigo | Cuenta | Debe | Haber | Saldo |
|--------|--------|------|-------|-------|
| 1.1.01 | Caja | $3,500 | $1,200 | $2,300 |
| 4.1.01 | Ventas | $0 | $3,125 | $3,125 |

Click en una fila → vuelve a llamar con `cuenta_contable_id` y muestra movimientos detallados.

#### Balance de Comprobacion — Vista tabla

| Codigo | Cuenta | Sumas Debe | Sumas Haber | Saldo Debe | Saldo Haber |
|--------|--------|------------|-------------|------------|-------------|
| 1.1.01 | Caja | $5,000 | $2,000 | $3,000 | |
| 4.1.01 | Ventas | $100 | $4,500 | | $4,400 |
| **TOTALES** | | **$10,000** | **$10,000** | **$5,000** | **$5,000** |

#### Balance General — Vista dividida

```
┌─────────────────────────────┬─────────────────────────────┐
│         ACTIVOS             │    PASIVOS + PATRIMONIO      │
├─────────────────────────────┼─────────────────────────────┤
│ 1.1.01 Caja        $3,000  │ PASIVOS                      │
│ 1.1.03 CxC           $500  │ 2.1.02 IVA Ventas     $600  │
│ 1.1.04 Inventario  $8,000  │                              │
│                             │ PATRIMONIO                   │
│                             │ 3.1.01 Capital      $10,000  │
├─────────────────────────────┼─────────────────────────────┤
│ TOTAL ACTIVOS     $11,500  │ TOTAL P+P           $10,600  │
└─────────────────────────────┴─────────────────────────────┘
```

#### Estado de Resultados — Vista lista

```
INGRESOS
  4.1.01 Ventas de Productos .............. $4,500.00
  4.1.02 Servicios Tecnicos ................  $800.00
                            Total Ingresos: $5,300.00

GASTOS
  5.1.01 Costo de Ventas .................. $2,000.00
  5.1.07 Gastos Generales ..................  $300.00
                              Total Gastos: $2,300.00

═══════════════════════════════════════════════════════
  UTILIDAD NETA:                            $3,000.00
```

---

## 4. Integracion con modulos existentes (botones "Generar Asiento")

Agregar un boton en las siguientes pantallas existentes:

### 4.1 En Historial de Facturas (`ListadoFacturas`)
- Agregar boton/icono "Generar Asiento Contable" en cada fila de factura
- Al hacer click: `POST api/asientos-contables/generar/desde-factura/{facturaId}`
- Si ya existe asiento: mostrar mensaje de error del API
- Si se genera: mostrar `alertify.success(response.data.mensaje)`

### 4.2 En Gastos (`src/views/gastos/`)
- Agregar boton "Generar Asiento" en cada fila de gasto
- Al hacer click: `POST api/asientos-contables/generar/desde-gasto/{gastoId}`

### 4.3 En Retiros (`src/views/` o componente de retiros)
- Agregar boton "Generar Asiento" en cada fila de retiro
- Al hacer click: `POST api/asientos-contables/generar/desde-retiro/{retiroId}`

**Nota:** Estos botones solo deben mostrarse si el usuario tiene el permiso `contabilidad.ver`. Usar `tienePermiso('contabilidad.ver')` del `LoginContext`.

---

## 5. Permisos

Los permisos de contabilidad se deben agregar al sistema de permisos. Para que funcionen en el frontend:

```javascript
// En LoginContext, ya existe tienePermiso(). Usarlo asi:
const { tienePermiso } = useContext(LoginContext);

// Condicionar visibilidad:
if (tienePermiso('contabilidad.ver'))         // Mostrar menu contabilidad
if (tienePermiso('contabilidad.cuentas-crear'))  // Mostrar boton nueva cuenta
if (tienePermiso('contabilidad.asientos-crear')) // Mostrar boton nuevo asiento
if (tienePermiso('contabilidad.reportes'))       // Mostrar tab reportes
```

**Codigos de permisos de contabilidad:**
| Codigo | Uso |
|--------|-----|
| `contabilidad.ver` | Mostrar menu y acceso al modulo |
| `contabilidad.cuentas-crear` | Boton crear cuenta |
| `contabilidad.cuentas-editar` | Boton editar cuenta |
| `contabilidad.cuentas-eliminar` | Boton eliminar cuenta |
| `contabilidad.asientos-crear` | Boton nuevo asiento |
| `contabilidad.asientos-editar` | Boton editar asiento |
| `contabilidad.asientos-contabilizar` | Boton contabilizar |
| `contabilidad.asientos-anular` | Boton anular |
| `contabilidad.reportes` | Tab de reportes |
| `contabilidad.exportar` | Boton exportar (futuro) |

---

## 6. Navegacion

La ruta ya se carga dinamicamente desde el backend (`pantallapos`). Si la pantalla de contabilidad ya fue agregada ahi, el menu aparecera automaticamente. Si no, agregar manualmente en `routes.js`:

```javascript
// En routes.js, dentro del array de rutas de DashboardLayout:
{ path: 'contabilidad', element: <ContabilidadView /> }
```

Y el import:
```javascript
import ContabilidadView from './views/contabilidad';
```

---

## 7. Formato de moneda

Usar la funcion `formatCurrency()` de `src/Environment/utileria.js` para formatear todos los montos en tablas y reportes. Patron existente:
```javascript
import { formatCurrency } from '../../Environment/utileria';
// Uso: formatCurrency(150.00) → "$150.00"
```

---

## 8. Alertas y notificaciones

Seguir el patron existente del proyecto:
```javascript
import alertify from 'alertifyjs';
import Swal from 'sweetalert2';

// Exito:
alertify.success('Asiento contable creado correctamente');

// Error:
alertify.error('Error al crear el asiento');

// Confirmacion (para anular/eliminar):
Swal.fire({
  title: 'Anular asiento?',
  text: 'Esta accion no se puede deshacer',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si, anular',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    anularAsiento(asientoId);
  }
});
```

---

## Resumen de lo que se debe implementar

1. **ContabilidadContext.js** — Estado y 20 funciones de API
2. **Vista principal** con 3 tabs (Plan de Cuentas, Asientos, Reportes)
3. **Plan de Cuentas** — Arbol expandible + CRUD
4. **Asientos** — Tabla filtrable + paginada + modal crear/editar con lineas dinamicas
5. **Reportes** — 5 reportes contables (libro diario, mayor, balance comprobacion, balance general, estado resultados)
6. **Botones "Generar Asiento"** en facturas, gastos y retiros
7. **Permisos** — Condicionar todo con `tienePermiso()`
8. Agregar `<ContabilidadProvider>` en `index.js` y ruta en `routes.js`
