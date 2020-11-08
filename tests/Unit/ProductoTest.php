<?php

namespace Tests\Unit;

use App\Categoria;
use App\Negocio;
use App\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ProductoTest extends TestCase
{
		use RefreshDatabase;
    
    /** @test */
    public function producto_belongs_to_catogoria()
    {
    		$negocio = factory(Negocio::class)->create();
    		$categoria = factory(Categoria::class)->create();
    		$producto = factory(Producto::class)->create(['categoria_id'=> $categoria->id,'negocio_id' => $negocio->id]);

    		$this->assertInstanceOf(Categoria::class,$producto->categoria);
    }

    /** @test */
    public function producto_belongs_to_negocio()
    {
    		$categoria = factory(Categoria::class)->create();
    		$negocio = factory(Negocio::class)->create();
    		$producto = factory(Producto::class)->create(['negocio_id' => $negocio->id, 'categoria_id'=> $categoria->id]);

    		$this->assertInstanceOf(Negocio::class, $producto->negocio);
    }

    /** @test */
    public function producto_hasMany_imagenes_productos()
    {
    		$producto = factory(Producto::class)->create();

    		$this->assertInstanceOf(Collection::class, $producto->imagenesSecundarias);
    }
}
