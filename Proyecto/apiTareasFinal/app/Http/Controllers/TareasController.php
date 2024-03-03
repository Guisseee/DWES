<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TareasResource;
use Illuminate\Database\Eloquent\Casts\Json;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $productos= Tareas::all();
        // return response()->json($tareas, 200);
        return TareasResource::collection($tareas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorias= $request->categorias;
        $params= $request->all();
        unset($params['categorias']);
        $producto= Producto:: create($params);
        $producto->categoria()->attach($categorias);
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tareas $tareas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tareas $tareas)
    {
        //
    }
}
