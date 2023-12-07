<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    // Mostrar todos los servicios o filtrar por nombre
    public function index(Request $request)
    {
        $servicesQuery = Services::query(); // Iniciar la consulta

        if ($request->has('search')) {
            $servicesQuery->where('name', 'LIKE', '%' . $request->search . '%');
        }

        $services = $servicesQuery->get(); // Obtener los resultados

        if ($services->isEmpty()) {
            return response()->json(['message' => 'No se encontraron servicios con ese término de búsqueda'], 404);
        }

        return response()->json($services);
    }

    // Crear un nuevo servicio
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'address' => 'required',
            'coverage' => 'required',
            'whatsapp' => 'required',
            'photo' => 'sometimes|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $service = Services::create($validator->validated());
        return response()->json($service, 201);
    }

    // Mostrar un servicio específico
    public function show($id)
    {
        $service = Services::find($id);
        if (!$service) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }
        return response()->json($service);
    }

    // Actualizar un servicio específico
    public function update(Request $request, $id)
    {
        $service = Services::find($id);
        if (!$service) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|max:255',
            'description' => 'sometimes|required',
            'address' => 'sometimes|required',
            'coverage' => 'sometimes|required',
            'whatsapp' => 'sometimes|required',
            'photo' => 'sometimes|url',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $service->update($validator->validated());
        return response()->json($service, 200);
    }

    // Eliminar un servicio
    public function destroy($id)
    {
        $service = Services::find($id);
        if (!$service) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }
        $service->delete();
        return response()->json(['message' => 'Servicio eliminado con éxito'], 200);
    }
}
