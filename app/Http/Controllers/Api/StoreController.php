<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Stores; // El modelo en plural
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    // Listar todas las tiendas
    public function index()
    {
        $stores = Stores::all(); // Usa el modelo en plural
        return response()->json($stores);
    }

    // Crear una nueva tienda
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required',
            'delivery' => 'required|boolean',
            'description' => 'required',
            'photo' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $store = Stores::create($validator->validated()); // Usa el modelo en plural
        return response()->json($store, 201);
    }

    // Mostrar una tienda específica
    public function show($id)
    {
        $store = Stores::find($id); // Usa el modelo en plural
        if (!$store) {
            return response()->json(['message' => 'Tienda no encontrada'], 404);
        }
        return response()->json($store);
    }

    // Actualizar una tienda específica
    public function update(Request $request, $id)
    {
        $store = Stores::find($id); // Usa el modelo en plural
        if (!$store) {
            return response()->json(['message' => 'Tienda no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|max:255',
            'address' => 'sometimes|required',
            'delivery' => 'sometimes|required|boolean',
            'description' => 'sometimes|required',
            'photo' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $store->update($validator->validated());
        return response()->json($store, 200);
    }

    // Eliminar una tienda
    public function destroy($id)
    {
        $store = Stores::find($id); // Usa el modelo en plural
        if (!$store) {
            return response()->json(['message' => 'Tienda no encontrada'], 404);
        }
        $store->delete();
        return response()->json(['message' => 'Tienda eliminada con éxito'], 200);
    }
}

