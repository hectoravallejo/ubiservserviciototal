<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products; // Modelo en plural
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Listar todos los productos o filtrar por nombre y descripción
public function index(Request $request)
{
    $query = Products::query();

    // Si se proporciona un término de búsqueda, filtra los resultados
    if ($request->has('search')) {
        $searchTerm = $request->search;
        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
        });
    }

    // Descomenta la siguiente línea si quieres ver la consulta SQL en tu entorno de desarrollo
    // dd($query->toSql(), $request->search);

    $products = $query->with('store')->get();
    return response()->json($products);
}

    

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|exists:stores,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product = Products::create($validator->validated());
        return response()->json($product, 201);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $product = Products::with('store')->find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($product);
    }

    // Actualizar un producto específico
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'store_id' => 'sometimes|required|exists:stores,id',
            'name' => 'sometimes|required|max:255',
            'description' => 'sometimes|required',
            'price' => 'sometimes|required|numeric',
            'photo' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product->update($validator->validated());
        return response()->json($product, 200);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Producto eliminado con éxito'], 200);
    }
}

