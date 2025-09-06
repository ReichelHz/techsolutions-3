<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use Symfony\Component\HttpFoundation\Response;

class ProyectoController extends Controller
{
  
    public function index()
    {
        $proyectos = Proyecto::orderBy('fecha_inicio', 'desc')->get();

        return response()->json($proyectos, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'estado' => 'required|string|max:50',
        ]);

        $proyecto = Proyecto::create($request->all());

        return response()->json($proyecto, Response::HTTP_CREATED);
    }

    // Mostrar un proyecto por ID
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($proyecto, Response::HTTP_OK);
    }

    
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'estado' => 'required|string|max:50',
        ]);

        $proyecto->update($request->all());

        return response()->json($proyecto, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $proyecto->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
