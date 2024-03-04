<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Resources\TareaResource;
use App\Http\Requests\TareaRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $tareas= Tarea::all();
        return TareaResource::collection($tareas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TareaRequest $request)
    {
        $tarea= new Tarea();
        $tarea->titulo=$request->titulo;
        $tarea->descripcion=$request->descripcion;

        $tarea->save();
        $etiquetas= $request->etiquetas;
        $idTarea=$tarea->id;
        $tarea->etiquetas()->attach($etiquetas, ['tareas_id' => $idTarea]);
        return new TareaResource($tarea);
    }

    /**
     * Display the specified resource.
     */
    public function show($idTarea)
    {
        $tarea= Tarea::find($idTarea);
        return new TareaResource($tarea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareaRequest $request, $idTarea)
    {
        $tarea= Tarea::find($idTarea);
        $tarea->titulo=$request->titulo;
        $tarea->descripcion=$request->descripcion;
        $tarea->etiquetas()->detach();
        $tarea->etiquetas()->attach($request->etiquetas, ['tareas_id' => $idTarea]);
        $tarea->save();

        return new TareaResource($tarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idTarea)
    {
        $tarea= Tarea::find($idTarea);
        $tarea->etiquetas()->detach();
        $tarea->delete();
        return new TareaResource($tarea);
    }
}
