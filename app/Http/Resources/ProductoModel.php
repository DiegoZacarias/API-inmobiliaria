<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoModel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'categoria_id' => $this->categoria_id,
            'categoria' => $this->categoria->nombre,
            'imagen' => $this->imagen,
            'negocio_id' => $this->negocio_id,
            'negocio' => $this->negocio->nombre,
            'direccion' => $this->direccion,
            'banos' => $this->banos,
            'habitaciones' => $this->habitaciones,
            'estacionamiento' => $this->estacionamiento
        ];
    }
}
