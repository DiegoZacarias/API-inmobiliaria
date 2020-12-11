<?php

namespace App\Http\Controllers\API\Front;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaCollection;
use App\Http\Resources\CategoriaModel;
use App\Http\Resources\ProductoCollection;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct(Categoria $categoria)
    {
    		$this->categoria = $categoria;
    }

    public function listarCategorias()
    {
    		$categoriaCollection = $this->categoria->all();

    		return response()->json(CategoriaCollection::make($categoriaCollection));
    }

    public function mostrarCategoriaIndividual(Categoria $categoria)
    {
    		return response()->json(CategoriaModel::make($categoria));
    }

    public function getProductosFromThisCategoria(Categoria $categoria)
    {
    		$productoCollection = $categoria->productos->where('visible', true);
    		return response()->json(ProductoCollection::make($productoCollection));
    }
}
