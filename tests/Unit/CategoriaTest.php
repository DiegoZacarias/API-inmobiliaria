<?php

namespace Tests\Unit;

use App\Categoria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
   	use RefreshDatabase;

   	/** @test */
   	public function categoria_hasMany_productos()
   	{
   			$categoria = factory(Categoria::class)->create();

   			$this->assertInstanceOf(Collection::class,$categoria->productos);
   	}
}
