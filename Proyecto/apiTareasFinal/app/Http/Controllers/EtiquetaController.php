<?php

namespace App\Http\Controllers;

use App\Http\Resources\EtiquetaResource;
use App\Http\Requests\EtiquetaRequest;
use App\Models\Etiqueta;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etiquetas= Etiqueta::all();
        return EtiquetaResource::collection($etiquetas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtiquetaRequest $request)
    {
        $etiqueta= new Etiqueta();
        $etiqueta->nombre=$request->nombre;

        $etiqueta->save();

        $tareas= $request->tareas;
        $idEtiqueta=$etiqueta->id;
        $etiqueta->tareas()->attach($tareas, ['etiquetas_id' => $idEtiqueta]);
        return new EtiquetaResource($etiqueta);
    }

    /**
     * Display the specified resource.
     */
    public function show($idEtiqueta)
    {
        $etiqueta= Etiqueta::find($idEtiqueta);
        return new EtiquetaResource($etiqueta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtiquetaRequest $request, $idEtiqueta)
    {
        $etiqueta= Etiqueta::find($idEtiqueta);
        $etiqueta->nombre=$request->nombre;

        $etiqueta->tareas()->attach($request->tareas);
        $etiqueta->save();
        return new EtiquetaResource($etiqueta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idEtiqueta)
    {
        $etiqueta= Etiqueta::find($idEtiqueta);
        $etiqueta->delete();
        return new EtiquetaResource($etiqueta);
    }
}