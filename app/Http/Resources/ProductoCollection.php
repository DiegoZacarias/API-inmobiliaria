<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductoModel;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => ProductoModel::collection($this->collection),
            'links' => [
                'self' => route('front.productos.listar'),
            ],
        ];
    }
}
