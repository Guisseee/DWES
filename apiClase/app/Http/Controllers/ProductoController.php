<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $productos= Producto::all();
        // return response()->json($productos, 200);
        return ProductoResource::collection($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
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
    public function show($id):JsonResource
    {
        $producto = Producto::find($id);
        // return response()->json($producto, 200);
        return new ProductoResource($producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, $id):JsonResource
    {
        $producto= Producto::find($id);
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        // return response()->json($producto, 200);
        $producto->categoria()->attach($request->categorias);
        $producto->save();
        return new ProductoResource($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(null, 204);
    }
}

