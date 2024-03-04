<?php

namespace App\Http\Controllers;

use App\Http\Resources\TareaResource;
use App\Http\Requests\TareaRequest;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tareas= Tarea::all();
        return TareaResource::collection($Tareas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TareaRequest $request)
    {
        $Tarea= new Tarea();
        $Tarea->titulo=$request->titulo;
        $Tarea->descripcion=$request->descripcion;


        $Tarea->save();

        $tareas= $request->tareas;
        $idTarea=$Tarea->id;
        $Tarea->etiquetas()->attach($tareas, ['Tareas_id' => $idTarea]);
        return new TareaResource($Tarea);
    }

    /**
     * Display the specified resource.
     */
    public function show($idTarea)
    {
        $Tarea= Tarea::find($idTarea);
        return new TareaResource($Tarea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareaRequest $request, $idTarea)
    {
        $Tarea= Tarea::find($idTarea);
        $Tarea->titulo=$request->titulo;
        $Tarea->descripcion=$request->descripcion;

        $Tarea->etiquetas()->attach($request->tareas);
        $Tarea->save();
        return new TareaResource($Tarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idTarea)
    {
        $Tarea= Tarea::find($idTarea);
        $Tarea->delete();
        return new TareaResource($Tarea);
    }
}
