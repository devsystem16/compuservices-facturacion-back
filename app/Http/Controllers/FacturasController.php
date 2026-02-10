<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Facturas;
use App\Models\Detalles;
use App\Models\Creditos;
use App\Models\FormaPago;
use App\Models\FormaPagoFactura;
use App\Models\Periodo;
use App\Models\Productos;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Services\Sri\SriService;

class FacturasController extends Controller
{
    protected $sriService;

    public function __construct(SriService $sriService)
    {
        $this->sriService = $sriService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Facturas::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        // $suma = 0;
        // foreach ($request->formasPago as $formasPago) {
        //     $suma +=   $formasPago["valor"];
        // }
        // if ($suma != 0)
        //     if ($request->cabecera["total"]  != $suma)
        //         return response()->json(["estado" => 400, "Message" => "El valor total de la factura $(" . $request->cabecera["total"] . ")  NO cuadra con las formas de pago $ (" . $suma . ") "], 200);


        try {
            DB::beginTransaction();
            $facturas = Facturas::create($request->cabecera);

            // Cargar todos los productos en 1 query
            $productoIds = collect($request->detalle)->pluck('producto_id')->unique();
            $productos = Productos::whereIn('id', $productoIds)->get()->keyBy('id');

            // Actualizar stock y preparar detalles para batch insert
            $detallesInsert = [];
            $now = now();
            foreach ($request->detalle as $detalle) {
                $producto = $productos[$detalle["producto_id"]];
                $producto->stock = $producto->stock - $detalle["cantidad"];
                $producto->save();

                $detallesInsert[] = [
                    'factura_id' => $facturas->id,
                    'producto_id' => $detalle["producto_id"],
                    'cantidad' => $detalle["cantidad"],
                    'subtotal' => $detalle["subtotal"],
                    'precio_tipo' => $detalle["precio_tipo"],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            Detalles::insert($detallesInsert);

            // Si se envia un array de formas de pago, Guardarlas en batch
            if (!empty($request->formasPago) && is_array($request->formasPago)) {
                $formasPagoInsert = [];
                foreach ($request->formasPago as $formasPago) {
                    if ($formasPago["valor"] > 0) {
                        $formasPagoInsert[] = [
                            'factura_id' => $facturas->id,
                            'forma_pago_id' => $formasPago["id"],
                            'valor' => $formasPago["valor"],
                            'observacion' => "",
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                    }
                }
                if (!empty($formasPagoInsert)) {
                    FormaPagoFactura::insert($formasPagoInsert);
                }
            } else {
                // SI no se envia un array o ninguna forma de pago. Guardarla por Defecto.
                $formaPagoDefault = FormaPago::where('default', 1)->first();
                if ($formaPagoDefault) {
                    FormaPagoFactura::create(
                        [
                            'factura_id' => $facturas->id,
                            'forma_pago_id' => $formaPagoDefault->id,
                            'valor' => $facturas->total,
                            'observacion' => ""
                        ]
                    );
                }
            }

            DB::commit();

            // SRI Process
            // $facturas->load('cliente', 'detalles.producto');

            //  $sriResponse = $this->sriService->procesarFactura($facturas);

            return ["estado" => 200, "factura" => $facturas, "Message" => "Factura Guardada", "sri" => null];
            // return ["estado" => 200, "factura" => $facturas, "Message" => "Factura Guardada", "sri" => $sriResponse];
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["estado" => 400, "Message" => "Ocurrió un error en el servidor.", "factura" => []], 200);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Facturas::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Facturas::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facturas::findOrFail($id)->delete();
    }

    public function historiofacturas(Request $request, $limite)
    {
        $facturas = Facturas::with([
            'cliente:id,nombres',
            'detalles.producto:id,nombre,codigo_barra',
            'formaPagoFactura.FormaPago:id,label'
        ])
            ->orderBy('created_at', 'desc')
            ->take($limite)
            ->get();

        $reporte = $facturas->map(function ($factura) {
            return [
                'factura' => [
                    'id' => $factura->id,
                    'cliente' => $factura->cliente->nombres ?? null,
                    'fecha' => $factura->fecha,
                    'subtotal' => $factura->subtotal,
                    'iva' => $factura->iva,
                    'total' => $factura->total,
                    'observacion' => $factura->observacion,
                    'estado' => $factura->estado,
                    'detalles' => $factura->detalles->map(function ($detalle) {
                        return [
                            'id' => $detalle->id,
                            'producto' => $detalle->producto->nombre ?? null,
                            'idProducto' => $detalle->producto_id,
                            'codigo_barra' => $detalle->producto->codigo_barra ?? null,
                            'cantidad' => $detalle->cantidad,
                            'subtotal' => $detalle->subtotal,
                            'precio_tipo' => $detalle->precio_tipo,
                        ];
                    }),
                    'formasPago' => $factura->formaPagoFactura->map(function ($fp) {
                        return [
                            'id' => $fp->id,
                            'factura_id' => $fp->factura_id,
                            'forma_pago_id' => $fp->forma_pago_id,
                            'valor' => $fp->valor,
                            'observacion' => $fp->observacion,
                            'descripcionFormaPago' => $fp->FormaPago->label ?? null,
                        ];
                    }),
                ]
            ];
        });

        return $reporte->values();
    }


    public function reimpresion($id)
    {
        $reporte = [];

        $facturas = Facturas::select(
            'facturas.id',
            'facturas.cliente_id',
            'facturas.fecha',
            'facturas.subtotal',
            'facturas.iva',
            'facturas.total',
            'facturas.observacion',
            'facturas.es_credito',
            'facturas.fecha',
            'facturas.estado',
            'facturas.impuesto',
        )
            ->where('facturas.id', '=', $id)
            ->orderBy('facturas.created_at', 'desc')
            ->first();

        $cliente = Clientes::select('cedula', 'nombres', 'telefono', 'direccion')
            ->where('id', $facturas->cliente_id)->first();


        $totales = ["subtotal" => $facturas->subtotal, "iva" => $facturas->iva, "total" => $facturas->total, "observaciones" => $facturas->observacion];

        $detalle = Detalles::select(
            'detalles.id',
            'productos.nombre as producto',
            'detalles.cantidad',
            'detalles.subtotal as total',
            'detalles.precio_tipo',
            'productos.id as idProducto',
            'productos.precio_publico',
            'productos.precio_tecnico',
            'productos.precio_distribuidor'
        )
            ->join('productos', 'productos.id', 'detalles.producto_id')
            ->where('factura_id', $facturas->id)->get();

        $facturas->detalles = $detalle;
        $facturas->cliente = $cliente;
        $facturas->totales = $totales;
        array_push($reporte, [
            'factura' => $facturas
        ]);



        return $reporte[0];
    }


    public function anularFactura(Request $request)
    {
        $factura = Facturas::findOrFail($request->idFactura);



        if ($factura->estado == "Anulada") {
            return ["codigo" => 203, "mensaje" => "Factura ya se encuentra anulada"];
        }

        if ($factura->es_credito == 1) {
            // $credito = Creditos::findOrFail($factura->credito_id);
            Creditos::findOrFail($factura->credito_id)->delete();
        }


        // if ($factura->estado  == "credito") {
        //     return    ["codigo" => 203, "mensaje"   => "No se permite anular un Credito"];
        // }

        // if ($factura->estado  == "credito (PAGADO)") {
        //     return    ["codigo" => 203, "mensaje"   => "No se permite anular un Credito Pagado"];
        // }

        $factura->estado = "Anulada";
        $factura->save();



        $detalles = Detalles::with('producto')->where("factura_id", $factura->id)->get();

        foreach ($detalles as $detalle) {
            $detalle->producto->increment('stock', $detalle->cantidad);
        }

        return ["codigo" => 200, "mensaje" => "Factura Anulada correctamente."];
    }

    public function historiofacturasFilter(Request $request)
    {
        $facturas = Facturas::with([
            'cliente:id,nombres,cedula',
            'detalles.producto:id,nombre,codigo_barra',
            'formaPagoFactura.FormaPago:id,label'
        ])
            ->whereHas('cliente', function ($query) use ($request) {
                $searchTerms = explode(' ', $request->filter);
                foreach ($searchTerms as $term) {
                    $query->where(function ($q) use ($term) {
                        $q->where('nombres', 'LIKE', '%' . $term . '%')
                            ->orWhere('cedula', 'LIKE', '%' . $term . '%');
                    });
                }
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('facturas.id', 'LIKE', '%' . $request->filter . '%');
            })
            ->orderBy('created_at', 'desc')
            ->take($request->limite)
            ->get();

        $reporte = $facturas->map(function ($factura) {
            return [
                'factura' => [
                    'id' => $factura->id,
                    'cliente' => $factura->cliente->nombres ?? null,
                    'fecha' => $factura->fecha,
                    'subtotal' => $factura->subtotal,
                    'iva' => $factura->iva,
                    'total' => $factura->total,
                    'observacion' => $factura->observacion,
                    'estado' => $factura->estado,
                    'detalles' => $factura->detalles->map(function ($detalle) {
                        return [
                            'id' => $detalle->id,
                            'producto' => $detalle->producto->nombre ?? null,
                            'idProducto' => $detalle->producto_id,
                            'codigo_barra' => $detalle->producto->codigo_barra ?? null,
                            'cantidad' => $detalle->cantidad,
                            'subtotal' => $detalle->subtotal,
                            'precio_tipo' => $detalle->precio_tipo,
                        ];
                    }),
                    'formasPago' => $factura->formaPagoFactura->map(function ($fp) {
                        return [
                            'id' => $fp->id,
                            'factura_id' => $fp->factura_id,
                            'forma_pago_id' => $fp->forma_pago_id,
                            'valor' => $fp->valor,
                            'observacion' => $fp->observacion,
                            'descripcionFormaPago' => $fp->FormaPago->label ?? null,
                        ];
                    }),
                ]
            ];
        });

        return $reporte->values();
    }


    public function reporteDiario()
    {
        $reporteDiario = DB::select(' call reporteDiario();');




        // $facturas = Facturas::select('facturas.id', 'facturas.observacion', 'detalles.cantidad', 'detalles.subtotal',  'productos.nombre as producto', 'detalles.precio_tipo',)
        //     ->join('detalles', 'detalles.factura_id', '=', 'facturas.id')
        //     ->join('productos', 'productos.id', '=', 'detalles.producto_id')
        //     ->get();


        $productosStock = Productos::select(
            'id',
            'nombre',
            'descripcion',
            'precio_publico',
            'precio_tecnico',
            'precio_compra',
            'precio_distribuidor',
            'codigo_barra',
            'stock'
        )
            ->orderBy('updated_at', 'desc')
            ->where('stock', '<=', 2)
            ->get();


        $clientes = DB::table('clientes as c')
            ->selectRaw('count(*) as cantidadclientes')
            ->where('deleted_at', '=', null)
            ->first();


        $date = Carbon::now();
        $fecha_hoy = Carbon::parse($date->toDateTimeString())->format('Y-m-d');


        $creditos = Creditos::where('creditos.saldo', '>', 0)
            ->select(DB::raw('count(*) as totalCreditos'))
            ->first();


        // $periodoActivo = Periodo::where('estado', 'Abierto')->first();
        $idPeriodo = -1;
        try {
            $periodoActivo = Periodo::where('estado', 'Abierto')->firstOrFail();
            $idPeriodo = $periodoActivo->id;
        } catch (Exception $e) {
            $idPeriodo = -1;
        }

        // $facturas = Facturas::where('fecha', '>=', $fecha_hoy)
        $facturas = Facturas::where('periodo_id', '=', $idPeriodo)
            ->select(DB::raw('count(*) as NumeroFacturas'))
            ->where('estado', '=', 'cerrada')
            ->first();


        $totalVentas = collect($reporteDiario)->sum('valor');


        return ["estado" => 200, "productosStockBajo" => $productosStock, "NumeroCreditos" => $creditos->totalCreditos, "NumeroFacturas" => $facturas->NumeroFacturas, "clientes" => $clientes->cantidadclientes, "totalVendido" => $totalVentas, "desglose" => $reporteDiario];
    }
}
