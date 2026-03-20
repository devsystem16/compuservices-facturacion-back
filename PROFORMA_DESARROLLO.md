# PROFORMA DE SERVICIOS DE DESARROLLO DE SOFTWARE
---

**Empresa:** CompuServices
**Fecha:** 12 de marzo de 2026
**Moneda:** Dólares Americanos (USD)

---

## DETALLE DE FUNCIONALIDADES DESARROLLADAS
### Período: Febrero – Marzo 2026

---

### 1. Optimización de Rendimiento del Sistema
**Descripción:**
- Corrección de consultas lentas (N+1) en módulos de facturas, créditos y reportes
- Creación de índices en base de datos para columnas de búsqueda frecuente
- Implementación de carga optimizada, inserciones por lote y agregaciones SQL

| Detalle                            | Horas est. | Valor/hora | Subtotal  |
|------------------------------------|-----------|------------|-----------|
| Diagnóstico y análisis de consultas | 4 h       | $20        | $80.00    |
| Corrección N+1 y optimización       | 8 h       | $20        | $160.00   |
| Índices de base de datos            | 3 h       | $20        | $60.00    |
| **SUBTOTAL**                        |           |            | **$300.00** |

---

### 2. Módulo de Kardex / Control de Inventario
**Descripción:**
- Control de entradas, salidas, ajustes y transferencias entre bodegas
- Integración automática con facturación (descuenta stock al facturar)
- Reversión de stock al anular facturas
- Gestión de bodegas (crear, editar, eliminar)
- Exportación de movimientos a Excel

| Detalle                                    | Horas est. | Valor/hora | Subtotal    |
|--------------------------------------------|-----------|------------|-------------|
| Diseño de base de datos (bodegas, kardex)  | 4 h       | $20        | $80.00      |
| Servicio de movimientos de inventario       | 10 h      | $20        | $200.00     |
| Integración con facturación y créditos      | 6 h       | $20        | $120.00     |
| CRUD de bodegas                             | 4 h       | $20        | $80.00      |
| Exportación a Excel                         | 3 h       | $20        | $60.00      |
| **SUBTOTAL**                                |           |            | **$540.00** |

---

### 3. Módulo de Permisos por Rol de Usuario
**Descripción:**
- 76 permisos distribuidos en 15 módulos del sistema
- Asignación de permisos por tipo de usuario (4 roles)
- Control de acceso granular a funciones del sistema
- Permiso específico para modificación de fecha límite de créditos

| Detalle                                     | Horas est. | Valor/hora | Subtotal    |
|---------------------------------------------|-----------|------------|-------------|
| Diseño del sistema de permisos              | 4 h       | $20        | $80.00      |
| Implementación de 76 permisos / 15 módulos  | 8 h       | $20        | $160.00     |
| Asignación y gestión por tipo de usuario    | 4 h       | $20        | $80.00      |
| **SUBTOTAL**                                |           |            | **$320.00** |

---

### 4. Portal de Seguimiento para Clientes
**Descripción:**
- Consulta pública del estado de órdenes de reparación (sin necesidad de login)
- Estados de reparación visibles al cliente en tiempo real
- Historial automático de cambios de estado por orden
- Integración en creación, actualización y abonos de órdenes
- Protección anti-abuso (límite de consultas por minuto)

| Detalle                                         | Horas est. | Valor/hora | Subtotal    |
|-------------------------------------------------|-----------|------------|-------------|
| Diseño e implementación de consulta pública     | 5 h       | $20        | $100.00     |
| Historial de cambios de estado                  | 4 h       | $20        | $80.00      |
| Integración en módulo de órdenes                | 4 h       | $20        | $80.00      |
| Seguridad y protección del endpoint público     | 2 h       | $20        | $40.00      |
| **SUBTOTAL**                                    |           |            | **$300.00** |

---

### 5. Módulo de Gestión de Usuarios
**Descripción:**
- Creación, edición y eliminación de usuarios del sistema
- Asignación de roles y tipos de usuario
- Control de acceso al panel administrativo

| Detalle                             | Horas est. | Valor/hora | Subtotal    |
|-------------------------------------|-----------|------------|-------------|
| CRUD de usuarios y asignación roles | 6 h       | $20        | $120.00     |
| Interfaz de administración          | 4 h       | $20        | $80.00      |
| **SUBTOTAL**                        |           |            | **$200.00** |

---

### 6. Mejoras de Interfaz de Usuario (UI/UX)
**Descripción:**
- Rediseño del Dashboard principal
- Rediseño del módulo de Punto de Venta
- Login mejorado con imagen personalizable
- Reportes avanzados con nuevos filtros

| Detalle                             | Horas est. | Valor/hora | Subtotal    |
|-------------------------------------|-----------|------------|-------------|
| Rediseño de Dashboard               | 5 h       | $20        | $100.00     |
| Rediseño de Punto de Venta          | 5 h       | $20        | $100.00     |
| Login con imagen personalizable     | 3 h       | $20        | $60.00      |
| Reportes avanzados                  | 4 h       | $20        | $80.00      |
| **SUBTOTAL**                        |           |            | **$340.00** |

---

### 7. Mejoras en Módulos Existentes
**Descripción:**
- Edición de proveedores
- Campo de observaciones en facturas y proformas
- Corrección en manejo de series de documentos
- Correcciones en formas de pago en reportes
- Fecha límite configurable en créditos

| Detalle                                        | Horas est. | Valor/hora | Subtotal    |
|------------------------------------------------|-----------|------------|-------------|
| Edición de proveedores                         | 2 h       | $20        | $40.00      |
| Observaciones en facturas y proformas          | 2 h       | $20        | $40.00      |
| Corrección de series y formas de pago          | 3 h       | $20        | $60.00      |
| Fecha límite configurable en créditos          | 3 h       | $20        | $60.00      |
| **SUBTOTAL**                                   |           |            | **$200.00** |

---

### 8. Infraestructura y Despliegue en Producción
**Descripción:**
- Configuración de despliegue automático (CI/CD)
- Configuración de servidor de producción (Hostinger)
- Versionado del sistema (v3.1.1)

| Detalle                                   | Horas est. | Valor/hora | Subtotal    |
|-------------------------------------------|-----------|------------|-------------|
| Configuración de despliegue automático    | 3 h       | $20        | $60.00      |
| Configuración servidor producción         | 3 h       | $20        | $60.00      |
| **SUBTOTAL**                              |           |            | **$120.00** |

---

## RESUMEN GENERAL

| #  | Módulo / Funcionalidad                     | Subtotal    |
|----|---------------------------------------------|-------------|
| 1  | Optimización de Rendimiento del Sistema     | $300.00     |
| 2  | Módulo de Kardex / Control de Inventario    | $540.00     |
| 3  | Módulo de Permisos por Rol de Usuario       | $320.00     |
| 4  | Portal de Seguimiento para Clientes         | $300.00     |
| 5  | Módulo de Gestión de Usuarios               | $200.00     |
| 6  | Mejoras de Interfaz de Usuario (UI/UX)      | $340.00     |
| 7  | Mejoras en Módulos Existentes               | $200.00     |
| 8  | Infraestructura y Despliegue en Producción  | $120.00     |
|    | **TOTAL**                                   | **$2,320.00** |

---

**Forma de pago sugerida:** 50% al inicio, 50% contra entrega
**Validez de la proforma:** 15 días a partir de la fecha de emisión

---

*Todos los precios están expresados en dólares americanos (USD) e incluyen desarrollo, pruebas y despliegue en producción.*
