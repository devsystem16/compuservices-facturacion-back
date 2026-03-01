<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;
use Exception;

class BodegasController extends Controller
{
    public function index()
    {
        return Bodega::where('estado', true)->orderBy('nombre')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
        ]);

        $bodega = Bodega::create($request->only(['nombre', 'direccion']));

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Bodega creada correctamente.',
            'bodega' => $bodega,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'nullable|boolean',
        ]);

        $bodega = Bodega::findOrFail($id);
        $bodega->update($request->only(['nombre', 'direccion', 'estado']));

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Bodega actualizada correctamente.',
            'bodega' => $bodega,
        ]);
    }

    public function destroy($id)
    {
        $bodega = Bodega::findOrFail($id);
        $bodega->delete();

        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Bodega eliminada correctamente.',
        ]);
    }
}
