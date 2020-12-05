<?php

namespace Tests\Unit;

use App\Negocio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;

class NegocioTest extends TestCase
{
   use RefreshDatabase;

   /** @test */
   public function negocios_hasMany_productos()
   {
   		$negocio = factory(Negocio::class)->create();

   		$this->assertInstanceOf(Collection::class, $negocio->productos);
   }
}
