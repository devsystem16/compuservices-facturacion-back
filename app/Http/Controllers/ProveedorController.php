<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::where('activo', true)
            ->orderBy('nombre', 'asc')
            ->get();

        return response()->json(["codigo" => 200, "Message" => "", "data" => $proveedores], 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'codigo' => 'required|string|max:20',
                'nombre' => 'required|string|max:255',
            ]);

            DB::beginTransaction();
            $proveedor = Proveedor::create($request->all());
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Proveedor creado correctamente.", "data" => $proveedor], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al crear el proveedor.", "data" => []], 200);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update($request->all());
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Proveedor actualizado correctamente.", "data" => $proveedor], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al actualizar el proveedor.", "data" => []], 200);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Proveedor::findOrFail($id)->delete();
            DB::commit();

            return response()->json(["codigo" => 200, "Message" => "Proveedor eliminado correctamente.", "data" => []], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["codigo" => 400, "Message" => "Error al eliminar el proveedor.", "data" => []], 200);
        }
    }
}
