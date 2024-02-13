<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => 'Nombre:' .$this->nombre,
            'descripcion' => 'Descripcion:' .$this->descripcion,
            'precio' => 'Precio:'.$this->descripcion,
            'categorias' => $this->categoria->pluck('nombre')
        ];
    }
}
