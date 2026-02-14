<?php

namespace App\Http\Controllers;

use App\Models\CategoriaGasto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaGastoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaGasto::where('activo', true)
            ->orderBy('nombre', 'asc')
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $categorias], 200);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $categoria = CategoriaGasto::create($request->all());
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Categoría creada correctamente.", "data" => $categoria], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al crear la categoría.", "data" => []], 200);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $categoria = CategoriaGasto::findOrFail($id);
            $categoria->update($request->all());
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Categoría actualizada correctamente.", "data" => $categoria], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al actualizar la categoría.", "data" => []], 200);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            CategoriaGasto::findOrFail($id)->delete();
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Categoría eliminada correctamente.", "data" => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al eliminar la categoría.", "data" => []], 200);
        }
    }
}
