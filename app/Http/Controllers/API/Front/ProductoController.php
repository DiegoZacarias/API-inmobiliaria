<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoCollection;
use App\Http\Resources\ProductoModel;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
		public function __construct(Producto $producto)
		{
				$this->producto = $producto;
		}

    public function listarProductosVisibles()
    {
    		$productos = $this->producto->where('visible', true)->get();
    		return ProductoCollection::make($productos);
    }
}
