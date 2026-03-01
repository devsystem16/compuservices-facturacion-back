# API Portal de Seguimiento de Reparaciones

## Resumen de Endpoints

| # | Metodo | Endpoint | Auth | Descripcion |
|---|--------|----------|------|-------------|
| 1 | POST | `/api/public/consulta-orden` | No (publico) | Cliente consulta estado de su orden |
| 2 | POST | `/api/ordenes/cambiar-estado` | Si (interno) | Cambiar estado de reparacion desde panel admin |

### Endpoints existentes modificados (generan historial automatico):

| Endpoint | Evento generado |
|----------|----------------|
| `POST /api/ordenes` (crear) | `ingreso_registrado` |
| `PUT /api/ordenes/{id}` (actualizar) | `diagnostico_iniciado` o `trabajo_actualizado` + `total_definido` |
| `POST /api/ordenes/abonos/nuevoabono` | `abono_registrado` |
| `POST /api/ordenes/total/actualizar` | `total_definido` |

---

## 1. Consultar estado de orden (PUBLICO)

**POST** `/api/public/consulta-orden`

Endpoint publico con rate limiting (10 req/min por IP). No requiere autenticacion. El cliente debe conocer AMBOS datos (cedula + N° de orden).

**Request Body:**
```json
{
  "cedula": "1207644996001",
  "orden_id": 11247
}
```

| Campo | Tipo | Requerido | Validacion |
|-------|------|-----------|------------|
| `cedula` | string | Si | min:10, max:13 |
| `orden_id` | integer | Si | min:1 |

**Response 200 (encontrada):**
```json
{
  "codigo": 200,
  "orden": {
    "id": 11247,
    "fecha_ingreso": "2026-02-15 19:17:07",
    "estado": "en_proceso",
    "estado_label": "En Proceso",
    "equipo": {
      "tipo": "LAPTOP",
      "marca": "DELL",
      "modelo": "Inspiron 15",
      "serie": "SN-ABC123"
    },
    "falla": "No enciende, se apaga sola",
    "trabajo_realizado": "Se diagnostico problema en placa madre. Se realizo reballing del chip de video.",
    "observacion": "Cliente solicita respaldo de datos",
    "ultimo_tecnico": "Juan",
    "ultima_actualizacion": "2026-02-16 14:30:00",
    "financiero": {
      "total": 45.00,
      "abono": 20.00,
      "saldo": 25.00
    },
    "historial": [
      {
        "fecha": "2026-02-15 19:17:07",
        "evento": "Equipo recibido",
        "detalle": "Ingreso registrado en el sistema"
      },
      {
        "fecha": "2026-02-16 10:00:00",
        "evento": "Diagnostico iniciado",
        "detalle": "Se inicio revision electronica"
      },
      {
        "fecha": "2026-02-16 14:30:00",
        "evento": "Trabajo en progreso",
        "detalle": "Se realizo reballing del chip de video"
      }
    ]
  }
}
```

**Response 404 (no encontrada):**
```json
{
  "codigo": 404,
  "mensaje": "No se encontro ninguna orden con los datos proporcionados."
}
```

**Response 422 (datos incompletos):**
```json
{
  "message": "The given data was invalid.",
  "errors": {
    "cedula": ["The cedula field is required."],
    "orden_id": ["The orden id field is required."]
  }
}
```

**Response 429 (rate limit):**
```json
{
  "codigo": 429,
  "mensaje": "Demasiadas consultas. Intente nuevamente en unos minutos."
}
```

---

## 2. Cambiar estado de reparacion (INTERNO)

**POST** `/api/ordenes/cambiar-estado`

Endpoint interno para que el admin/tecnico cambie el estado de reparacion de una orden.

**Request Body:**
```json
{
  "orden_id": 11247,
  "estado_reparacion": "completado",
  "usuario_id": 1
}
```

| Campo | Tipo | Requerido | Valores |
|-------|------|-----------|---------|
| `orden_id` | integer | Si | ID existente en ordenes |
| `estado_reparacion` | string | Si | `pendiente`, `en_proceso`, `completado`, `entregado` |
| `usuario_id` | integer | No | ID del usuario que realiza el cambio |

**Response 200:**
```json
{
  "codigo": 200,
  "mensaje": "Estado actualizado a: Completado",
  "orden": { ... }
}
```

**Efectos automaticos:**
- Si cambia a `completado`: se registra `fecha_completado` + historial `completado`
- Si cambia a `entregado`: se registra `fecha_entregado` + historial `entregado`
- Si cambia de `pendiente` a `en_proceso`: historial `diagnostico_iniciado`

---

## Estados de reparacion

| Estado | Label | Color sugerido | Significado |
|--------|-------|---------------|-------------|
| `pendiente` | Pendiente | Naranja (#E65100 / #FFF3E0) | Equipo recibido, sin diagnostico |
| `en_proceso` | En Proceso | Azul (#1565C0 / #E3F2FD) | Tecnico trabajando en el equipo |
| `completado` | Completado | Verde (#2E7D32 / #E8F5E9) | Reparacion terminada, listo para entrega |
| `entregado` | Entregado | Morado (#7B1FA2 / #F3E5F5) | Equipo entregado al cliente |

---

## Eventos del historial

| Evento | Label publico | Se genera cuando... |
|--------|--------------|---------------------|
| `ingreso_registrado` | Equipo recibido | Se crea la orden (`POST /api/ordenes`) |
| `diagnostico_iniciado` | Diagnostico iniciado | Primera vez que se escribe en campo `trabajo` |
| `trabajo_actualizado` | Trabajo en progreso | Se actualiza campo `trabajo` (ya tenia contenido) |
| `total_definido` | Costo de reparacion definido | Se define o cambia el `total` |
| `abono_registrado` | Pago parcial registrado | Se registra un abono |
| `completado` | Reparacion completada | Estado cambia a `completado` |
| `entregado` | Equipo entregado al cliente | Estado cambia a `entregado` |

---

## Campos nuevos en tabla `ordenes`

| Campo | Tipo | Default | Descripcion |
|-------|------|---------|-------------|
| `estado_reparacion` | varchar(20) | `pendiente` | Estado explicito del flujo de reparacion |
| `visible_cliente` | boolean | `true` | Si la orden es visible en el portal publico |
| `fecha_completado` | datetime | null | Fecha en que se marco como completado |
| `fecha_entregado` | datetime | null | Fecha en que se entrego al cliente |

## Tabla nueva: `orden_historial`

| Campo | Tipo | Descripcion |
|-------|------|-------------|
| `id` | bigint PK | |
| `orden_id` | int unsigned FK | Referencia a ordenes.id |
| `usuario_id` | int unsigned FK nullable | Quien genero el evento |
| `evento` | varchar(100) | Tipo de evento |
| `detalle` | text nullable | Descripcion del evento |
| `created_at` | timestamp | Fecha/hora del evento |

---

## Seguridad

| Regla | Implementacion |
|-------|---------------|
| Sin autenticacion | Ruta publica, no requiere token |
| Doble verificacion | Se requiere cedula + N° orden correctos |
| Rate limiting | `throttle:10,1` — 10 consultas/minuto por IP |
| No listados | No existe endpoint para listar ordenes |
| Datos limitados | Nombre tecnico: solo primer nombre. No expone datos internos |
| Orden eliminada | Si `estado = 0` (eliminada logica), responde 404 |
| visible_cliente | Si es `false`, responde 404 como si no existiera |
| Respuesta generica | Siempre el mismo mensaje 404 (no revela si la orden existe o la cedula es incorrecta) |
