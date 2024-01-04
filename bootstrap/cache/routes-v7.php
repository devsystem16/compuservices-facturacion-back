<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qAWZ0On77UhH5AFl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/clientes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/clientes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/ordenes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/ordenes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/productos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'productos.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/productos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/forma-pagos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/forma-pagos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/tecnicos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/tecnicos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/facturas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/facturas/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/creditos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/creditos/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/proformas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/proformas/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reporte/ventas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HIJAKRhA1yiSYzl9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reporte/historicofacturas-filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vjMk51p0qrIkwSWM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/facturas/anulacion/nota-credito' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sXFBO4tUctC0dze6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/creditos/lista/listado' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Xhxh0DdfR3r3IXTS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/ordenes/abonos/nuevoabono' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7zVGGfE0hbx7HRNe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/ordenes/total/actualizar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ea4QKzJafcbyVBbd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/usuarios/acceso/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ivy0UTm28oJ5pPSX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reportes/ventas-diarias' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ol6AKUttutE4P9P5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reportes/ingresos-empleado' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::U9BbMNvwLjIyER2P',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reportes/ventas-diarias/forma-pago' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Wg68JGree98QNo8n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/periodo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/periodo/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/periodo/verificar-periodo/apertura' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2aN6ahuNmEaSCRkO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/periodo/verificar-periodo/retiros/obtenerRetiros' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xodhoZdWJt8jo2qp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/retiros' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/retiros/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i5wT1evXUymKyZ9q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pepe' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CU55DBbrSP3w13BP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CpvIpRjpre69lvSN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/public/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VsnKkDPrZeX8iPnH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/public/app/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Hj3Y1frzElSa16YZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/ap(?|i/(?|c(?|lientes/(?|([^/]++)(?|(*:44)|/edit(*:56)|(*:63))|listado/([^/]++)(*:87))|reditos/(?|([^/]++)(?|(*:117)|/edit(*:130)|(*:138))|abonar(*:153)|eliminar/([^/]++)(*:178)))|ordenes/(?|([^/]++)(?|(*:210)|/edit(*:223)|(*:231))|listado/([^/]++)(*:256))|p(?|ro(?|ductos/(?|listado/([^/]++)(*:300)|buscarProducto(?|(?:/([^/]++))?(*:339)|/codigo(?:/([^/]++))?(*:368))|([^/]++)(?|(*:388)|/edit(*:401)|(*:409)))|formas/(?|([^/]++)(?|(*:440)|/edit(*:453)|(*:461))|eliminar/([^/]++)(*:487)))|antallapos/acceso/obtener\\-acceso/([^/]++)(*:539)|eriodo/(?|([^/]++)(?|(*:568)|/edit(*:581)|(*:589))|cerrar\\-periodo/cierre/([^/]++)(*:629)))|f(?|orma\\-pagos/([^/]++)(?|(*:666)|/edit(*:679)|(*:687))|acturas/(?|([^/]++)(?|(*:718)|/edit(*:731)|(*:739))|impresion/reimpresion/([^/]++)(*:778)))|tecnicos/([^/]++)(?|(*:808)|/edit(*:821)|(*:829))|re(?|porte/historicofacturas/([^/]++)(*:875)|tiros/(?|([^/]++)(?|(*:903)|/edit(*:916)|(*:924))|eliminar/retiro/([^/]++)(*:957))))|p(?:/([^/]++))?(*:983)))/?$}sDu',
    ),
    3 => 
    array (
      44 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.show',
          ),
          1 => 
          array (
            0 => 'cliente',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      56 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.edit',
          ),
          1 => 
          array (
            0 => 'cliente',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      63 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.update',
          ),
          1 => 
          array (
            0 => 'cliente',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'clientes.destroy',
          ),
          1 => 
          array (
            0 => 'cliente',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      87 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KtsNFOo04qaTzPtk',
          ),
          1 => 
          array (
            0 => 'limite',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.show',
          ),
          1 => 
          array (
            0 => 'credito',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      130 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.edit',
          ),
          1 => 
          array (
            0 => 'credito',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      138 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.update',
          ),
          1 => 
          array (
            0 => 'credito',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'creditos.destroy',
          ),
          1 => 
          array (
            0 => 'credito',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      153 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QqEPdiYQzaKKM27K',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WqYGyHWc7vb053cU',
          ),
          1 => 
          array (
            0 => 'idCredito',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.show',
          ),
          1 => 
          array (
            0 => 'ordene',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      223 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.edit',
          ),
          1 => 
          array (
            0 => 'ordene',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      231 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.update',
          ),
          1 => 
          array (
            0 => 'ordene',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ordenes.destroy',
          ),
          1 => 
          array (
            0 => 'ordene',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      256 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lSreEZSkYBRo8LzX',
          ),
          1 => 
          array (
            0 => 'limite',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      300 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P0iZcoS1ZT9AtxRT',
          ),
          1 => 
          array (
            0 => 'limite',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9WmClMpm1dPTPH7W',
            'texto' => NULL,
          ),
          1 => 
          array (
            0 => 'texto',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      368 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::C2OzzkDcFUSLZFNr',
            'codigoBarras' => NULL,
          ),
          1 => 
          array (
            0 => 'codigoBarras',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      388 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productos.show',
          ),
          1 => 
          array (
            0 => 'producto',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      401 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productos.edit',
          ),
          1 => 
          array (
            0 => 'producto',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      409 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'productos.update',
          ),
          1 => 
          array (
            0 => 'producto',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'productos.destroy',
          ),
          1 => 
          array (
            0 => 'producto',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      440 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.show',
          ),
          1 => 
          array (
            0 => 'proforma',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      453 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.edit',
          ),
          1 => 
          array (
            0 => 'proforma',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      461 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.update',
          ),
          1 => 
          array (
            0 => 'proforma',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'proformas.destroy',
          ),
          1 => 
          array (
            0 => 'proforma',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      487 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hYzgqgkm48bW91lX',
          ),
          1 => 
          array (
            0 => 'idProforma',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wuJ2OvSO73eDPXXY',
          ),
          1 => 
          array (
            0 => 'tipoUsuario',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      568 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.show',
          ),
          1 => 
          array (
            0 => 'periodo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      581 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.edit',
          ),
          1 => 
          array (
            0 => 'periodo',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      589 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.update',
          ),
          1 => 
          array (
            0 => 'periodo',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'periodo.destroy',
          ),
          1 => 
          array (
            0 => 'periodo',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      629 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qfBBs16WZ2FnXzmH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      666 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.show',
          ),
          1 => 
          array (
            0 => 'forma_pago',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.edit',
          ),
          1 => 
          array (
            0 => 'forma_pago',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      687 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.update',
          ),
          1 => 
          array (
            0 => 'forma_pago',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'forma-pagos.destroy',
          ),
          1 => 
          array (
            0 => 'forma_pago',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      718 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.show',
          ),
          1 => 
          array (
            0 => 'factura',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.edit',
          ),
          1 => 
          array (
            0 => 'factura',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      739 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.update',
          ),
          1 => 
          array (
            0 => 'factura',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'facturas.destroy',
          ),
          1 => 
          array (
            0 => 'factura',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      778 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HzmD4F4JhJLVL8cz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      808 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.show',
          ),
          1 => 
          array (
            0 => 'tecnico',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      821 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.edit',
          ),
          1 => 
          array (
            0 => 'tecnico',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      829 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.update',
          ),
          1 => 
          array (
            0 => 'tecnico',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'tecnicos.destroy',
          ),
          1 => 
          array (
            0 => 'tecnico',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      875 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UKOJFcfCLlLDN0HI',
          ),
          1 => 
          array (
            0 => 'limite',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      903 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.show',
          ),
          1 => 
          array (
            0 => 'retiro',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      916 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.edit',
          ),
          1 => 
          array (
            0 => 'retiro',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      924 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.update',
          ),
          1 => 
          array (
            0 => 'retiro',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'retiros.destroy',
          ),
          1 => 
          array (
            0 => 'retiro',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Pcd73af2ZRE0aA8i',
          ),
          1 => 
          array (
            0 => 'idRetiro',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      983 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yiL4Q8jzgAxE7BwP',
            'path' => NULL,
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::qAWZ0On77UhH5AFl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
          2 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005820000000000000000";}";s:4:"hash";s:44:"MNgCiH8pIbqw7jMr6B+iB9b20Xm4YwuQYEmvvTwvb1o=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qAWZ0On77UhH5AFl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.index',
        'uses' => 'App\\Http\\Controllers\\ClienteController@index',
        'controller' => 'App\\Http\\Controllers\\ClienteController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.create',
        'uses' => 'App\\Http\\Controllers\\ClienteController@create',
        'controller' => 'App\\Http\\Controllers\\ClienteController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/clientes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.store',
        'uses' => 'App\\Http\\Controllers\\ClienteController@store',
        'controller' => 'App\\Http\\Controllers\\ClienteController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes/{cliente}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.show',
        'uses' => 'App\\Http\\Controllers\\ClienteController@show',
        'controller' => 'App\\Http\\Controllers\\ClienteController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes/{cliente}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.edit',
        'uses' => 'App\\Http\\Controllers\\ClienteController@edit',
        'controller' => 'App\\Http\\Controllers\\ClienteController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/clientes/{cliente}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.update',
        'uses' => 'App\\Http\\Controllers\\ClienteController@update',
        'controller' => 'App\\Http\\Controllers\\ClienteController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/clientes/{cliente}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'clientes.destroy',
        'uses' => 'App\\Http\\Controllers\\ClienteController@destroy',
        'controller' => 'App\\Http\\Controllers\\ClienteController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KtsNFOo04qaTzPtk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/clientes/listado/{limite}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ClienteController@listado',
        'controller' => 'App\\Http\\Controllers\\ClienteController@listado',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KtsNFOo04qaTzPtk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ordenes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.index',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@index',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ordenes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.create',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@create',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/ordenes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.store',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@store',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ordenes/{ordene}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.show',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@show',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ordenes/{ordene}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.edit',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@edit',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/ordenes/{ordene}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.update',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@update',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ordenes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/ordenes/{ordene}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'ordenes.destroy',
        'uses' => 'App\\Http\\Controllers\\OrdenesController@destroy',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lSreEZSkYBRo8LzX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/ordenes/listado/{limite}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdenesController@listado',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@listado',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::lSreEZSkYBRo8LzX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P0iZcoS1ZT9AtxRT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos/listado/{limite}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductosController@listado',
        'controller' => 'App\\Http\\Controllers\\ProductosController@listado',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::P0iZcoS1ZT9AtxRT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9WmClMpm1dPTPH7W' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos/buscarProducto/{texto?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductosController@buscarProducto',
        'controller' => 'App\\Http\\Controllers\\ProductosController@buscarProducto',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9WmClMpm1dPTPH7W',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::C2OzzkDcFUSLZFNr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos/buscarProducto/codigo/{codigoBarras?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ProductosController@buscarProductoCodigoBarras',
        'controller' => 'App\\Http\\Controllers\\ProductosController@buscarProductoCodigoBarras',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::C2OzzkDcFUSLZFNr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.index',
        'uses' => 'App\\Http\\Controllers\\ProductosController@index',
        'controller' => 'App\\Http\\Controllers\\ProductosController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.create',
        'uses' => 'App\\Http\\Controllers\\ProductosController@create',
        'controller' => 'App\\Http\\Controllers\\ProductosController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/productos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.store',
        'uses' => 'App\\Http\\Controllers\\ProductosController@store',
        'controller' => 'App\\Http\\Controllers\\ProductosController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos/{producto}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.show',
        'uses' => 'App\\Http\\Controllers\\ProductosController@show',
        'controller' => 'App\\Http\\Controllers\\ProductosController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/productos/{producto}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.edit',
        'uses' => 'App\\Http\\Controllers\\ProductosController@edit',
        'controller' => 'App\\Http\\Controllers\\ProductosController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/productos/{producto}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.update',
        'uses' => 'App\\Http\\Controllers\\ProductosController@update',
        'controller' => 'App\\Http\\Controllers\\ProductosController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'productos.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/productos/{producto}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'productos.destroy',
        'uses' => 'App\\Http\\Controllers\\ProductosController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProductosController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/forma-pagos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.index',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@index',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/forma-pagos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.create',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@create',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/forma-pagos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.store',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@store',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/forma-pagos/{forma_pago}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.show',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@show',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/forma-pagos/{forma_pago}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.edit',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@edit',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/forma-pagos/{forma_pago}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.update',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@update',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forma-pagos.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/forma-pagos/{forma_pago}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'forma-pagos.destroy',
        'uses' => 'App\\Http\\Controllers\\FormaPagoController@destroy',
        'controller' => 'App\\Http\\Controllers\\FormaPagoController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tecnicos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.index',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@index',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tecnicos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.create',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@create',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/tecnicos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.store',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@store',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tecnicos/{tecnico}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.show',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@show',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tecnicos/{tecnico}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.edit',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@edit',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/tecnicos/{tecnico}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.update',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@update',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tecnicos.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/tecnicos/{tecnico}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'tecnicos.destroy',
        'uses' => 'App\\Http\\Controllers\\TecnicoController@destroy',
        'controller' => 'App\\Http\\Controllers\\TecnicoController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/facturas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.index',
        'uses' => 'App\\Http\\Controllers\\FacturasController@index',
        'controller' => 'App\\Http\\Controllers\\FacturasController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/facturas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.create',
        'uses' => 'App\\Http\\Controllers\\FacturasController@create',
        'controller' => 'App\\Http\\Controllers\\FacturasController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/facturas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.store',
        'uses' => 'App\\Http\\Controllers\\FacturasController@store',
        'controller' => 'App\\Http\\Controllers\\FacturasController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/facturas/{factura}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.show',
        'uses' => 'App\\Http\\Controllers\\FacturasController@show',
        'controller' => 'App\\Http\\Controllers\\FacturasController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/facturas/{factura}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.edit',
        'uses' => 'App\\Http\\Controllers\\FacturasController@edit',
        'controller' => 'App\\Http\\Controllers\\FacturasController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/facturas/{factura}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.update',
        'uses' => 'App\\Http\\Controllers\\FacturasController@update',
        'controller' => 'App\\Http\\Controllers\\FacturasController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facturas.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/facturas/{factura}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'facturas.destroy',
        'uses' => 'App\\Http\\Controllers\\FacturasController@destroy',
        'controller' => 'App\\Http\\Controllers\\FacturasController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/creditos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.index',
        'uses' => 'App\\Http\\Controllers\\CreditosController@index',
        'controller' => 'App\\Http\\Controllers\\CreditosController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/creditos/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.create',
        'uses' => 'App\\Http\\Controllers\\CreditosController@create',
        'controller' => 'App\\Http\\Controllers\\CreditosController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/creditos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.store',
        'uses' => 'App\\Http\\Controllers\\CreditosController@store',
        'controller' => 'App\\Http\\Controllers\\CreditosController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/creditos/{credito}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.show',
        'uses' => 'App\\Http\\Controllers\\CreditosController@show',
        'controller' => 'App\\Http\\Controllers\\CreditosController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/creditos/{credito}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.edit',
        'uses' => 'App\\Http\\Controllers\\CreditosController@edit',
        'controller' => 'App\\Http\\Controllers\\CreditosController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/creditos/{credito}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.update',
        'uses' => 'App\\Http\\Controllers\\CreditosController@update',
        'controller' => 'App\\Http\\Controllers\\CreditosController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'creditos.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/creditos/{credito}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'creditos.destroy',
        'uses' => 'App\\Http\\Controllers\\CreditosController@destroy',
        'controller' => 'App\\Http\\Controllers\\CreditosController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/proformas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.index',
        'uses' => 'App\\Http\\Controllers\\ProformaController@index',
        'controller' => 'App\\Http\\Controllers\\ProformaController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/proformas/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.create',
        'uses' => 'App\\Http\\Controllers\\ProformaController@create',
        'controller' => 'App\\Http\\Controllers\\ProformaController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/proformas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.store',
        'uses' => 'App\\Http\\Controllers\\ProformaController@store',
        'controller' => 'App\\Http\\Controllers\\ProformaController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/proformas/{proforma}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.show',
        'uses' => 'App\\Http\\Controllers\\ProformaController@show',
        'controller' => 'App\\Http\\Controllers\\ProformaController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/proformas/{proforma}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.edit',
        'uses' => 'App\\Http\\Controllers\\ProformaController@edit',
        'controller' => 'App\\Http\\Controllers\\ProformaController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/proformas/{proforma}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.update',
        'uses' => 'App\\Http\\Controllers\\ProformaController@update',
        'controller' => 'App\\Http\\Controllers\\ProformaController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'proformas.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/proformas/{proforma}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'proformas.destroy',
        'uses' => 'App\\Http\\Controllers\\ProformaController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProformaController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hYzgqgkm48bW91lX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/proformas/eliminar/{idProforma}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ProformaController@eliminarProforma',
        'controller' => 'App\\Http\\Controllers\\ProformaController@eliminarProforma',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hYzgqgkm48bW91lX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HIJAKRhA1yiSYzl9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reporte/ventas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\FacturasController@reporteDiario',
        'controller' => 'App\\Http\\Controllers\\FacturasController@reporteDiario',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::HIJAKRhA1yiSYzl9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UKOJFcfCLlLDN0HI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reporte/historicofacturas/{limite}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\FacturasController@historiofacturas',
        'controller' => 'App\\Http\\Controllers\\FacturasController@historiofacturas',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UKOJFcfCLlLDN0HI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vjMk51p0qrIkwSWM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/reporte/historicofacturas-filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\FacturasController@historiofacturasFilter',
        'controller' => 'App\\Http\\Controllers\\FacturasController@historiofacturasFilter',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::vjMk51p0qrIkwSWM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sXFBO4tUctC0dze6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/facturas/anulacion/nota-credito',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\FacturasController@anularFactura',
        'controller' => 'App\\Http\\Controllers\\FacturasController@anularFactura',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::sXFBO4tUctC0dze6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QqEPdiYQzaKKM27K' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/creditos/abonar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditosController@abonar',
        'controller' => 'App\\Http\\Controllers\\CreditosController@abonar',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QqEPdiYQzaKKM27K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Xhxh0DdfR3r3IXTS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/creditos/lista/listado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditosController@ListadoCreditos',
        'controller' => 'App\\Http\\Controllers\\CreditosController@ListadoCreditos',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Xhxh0DdfR3r3IXTS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WqYGyHWc7vb053cU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/creditos/eliminar/{idCredito}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\CreditosController@eliminarCredito',
        'controller' => 'App\\Http\\Controllers\\CreditosController@eliminarCredito',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WqYGyHWc7vb053cU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HzmD4F4JhJLVL8cz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/facturas/impresion/reimpresion/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\FacturasController@reimpresion',
        'controller' => 'App\\Http\\Controllers\\FacturasController@reimpresion',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::HzmD4F4JhJLVL8cz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7zVGGfE0hbx7HRNe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/ordenes/abonos/nuevoabono',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdenesController@abonar',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@abonar',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7zVGGfE0hbx7HRNe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ea4QKzJafcbyVBbd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/ordenes/total/actualizar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\OrdenesController@actualizarTotal',
        'controller' => 'App\\Http\\Controllers\\OrdenesController@actualizarTotal',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ea4QKzJafcbyVBbd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ivy0UTm28oJ5pPSX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/usuarios/acceso/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\UsuariosController@login',
        'controller' => 'App\\Http\\Controllers\\UsuariosController@login',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ivy0UTm28oJ5pPSX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wuJ2OvSO73eDPXXY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/pantallapos/acceso/obtener-acceso/{tipoUsuario}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\PantallaposController@obtenerAccesos',
        'controller' => 'App\\Http\\Controllers\\PantallaposController@obtenerAccesos',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wuJ2OvSO73eDPXXY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ol6AKUttutE4P9P5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/reportes/ventas-diarias',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ReporteController@ventasDiarias',
        'controller' => 'App\\Http\\Controllers\\ReporteController@ventasDiarias',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ol6AKUttutE4P9P5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::U9BbMNvwLjIyER2P' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/reportes/ingresos-empleado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ReporteController@ingresosXempleado',
        'controller' => 'App\\Http\\Controllers\\ReporteController@ingresosXempleado',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::U9BbMNvwLjIyER2P',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Wg68JGree98QNo8n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reportes/ventas-diarias/forma-pago',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\ReporteController@totalPorFormasPago',
        'controller' => 'App\\Http\\Controllers\\ReporteController@totalPorFormasPago',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Wg68JGree98QNo8n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/periodo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.index',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@index',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/periodo/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.create',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@create',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/periodo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.store',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@store',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/periodo/{periodo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.show',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@show',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/periodo/{periodo}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.edit',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@edit',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/periodo/{periodo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.update',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@update',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'periodo.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/periodo/{periodo}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'periodo.destroy',
        'uses' => 'App\\Http\\Controllers\\PeriodoController@destroy',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2aN6ahuNmEaSCRkO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/periodo/verificar-periodo/apertura',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\PeriodoController@existePeriodoAbierto',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@existePeriodoAbierto',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2aN6ahuNmEaSCRkO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qfBBs16WZ2FnXzmH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/periodo/cerrar-periodo/cierre/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\PeriodoController@cerrarPeriodo',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@cerrarPeriodo',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qfBBs16WZ2FnXzmH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xodhoZdWJt8jo2qp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/periodo/verificar-periodo/retiros/obtenerRetiros',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\PeriodoController@obtenerRetiros',
        'controller' => 'App\\Http\\Controllers\\PeriodoController@obtenerRetiros',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::xodhoZdWJt8jo2qp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/retiros',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.index',
        'uses' => 'App\\Http\\Controllers\\RetirosController@index',
        'controller' => 'App\\Http\\Controllers\\RetirosController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/retiros/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.create',
        'uses' => 'App\\Http\\Controllers\\RetirosController@create',
        'controller' => 'App\\Http\\Controllers\\RetirosController@create',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/retiros',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.store',
        'uses' => 'App\\Http\\Controllers\\RetirosController@store',
        'controller' => 'App\\Http\\Controllers\\RetirosController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/retiros/{retiro}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.show',
        'uses' => 'App\\Http\\Controllers\\RetirosController@show',
        'controller' => 'App\\Http\\Controllers\\RetirosController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/retiros/{retiro}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.edit',
        'uses' => 'App\\Http\\Controllers\\RetirosController@edit',
        'controller' => 'App\\Http\\Controllers\\RetirosController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/retiros/{retiro}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.update',
        'uses' => 'App\\Http\\Controllers\\RetirosController@update',
        'controller' => 'App\\Http\\Controllers\\RetirosController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'retiros.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/retiros/{retiro}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'as' => 'retiros.destroy',
        'uses' => 'App\\Http\\Controllers\\RetirosController@destroy',
        'controller' => 'App\\Http\\Controllers\\RetirosController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Pcd73af2ZRE0aA8i' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/retiros/eliminar/retiro/{idRetiro}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'cors',
        ),
        'uses' => 'App\\Http\\Controllers\\RetirosController@eliminarRetiro',
        'controller' => 'App\\Http\\Controllers\\RetirosController@eliminarRetiro',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Pcd73af2ZRE0aA8i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i5wT1evXUymKyZ9q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:264:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000098c0000000000000000";}";s:4:"hash";s:44:"L8q+0iVdvMNFR3ZWEzCi31aLDJAim/EScqiTR3fd73c=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::i5wT1evXUymKyZ9q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CU55DBbrSP3w13BP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pepe',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:254:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:36:"function () {
    return "hola";
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000009950000000000000000";}";s:4:"hash";s:44:"fgs1nB2qG+H+JAQUOJ9EkIKuneT1rPH9RXDvtMFXu9o=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CU55DBbrSP3w13BP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CpvIpRjpre69lvSN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:264:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000009970000000000000000";}";s:4:"hash";s:44:"BIfA0nVUXbS0dOvhEqRd7Hqy2htrm7XaMKzV6sP6qto=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CpvIpRjpre69lvSN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VsnKkDPrZeX8iPnH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'public/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:264:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000009990000000000000000";}";s:4:"hash";s:44:"VxDzz9BlNAGvvz4J/GZF3u8rKI/5ZNj1I0S467cxQW4=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VsnKkDPrZeX8iPnH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Hj3Y1frzElSa16YZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'public/app/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:264:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000099d0000000000000000";}";s:4:"hash";s:44:"7wZATOMsTear1yZnRGbDKpGtumCm3BF8C5xJYCRRgsw=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Hj3Y1frzElSa16YZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yiL4Q8jzgAxE7BwP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'app/{path?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::yiL4Q8jzgAxE7BwP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'welcome',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
