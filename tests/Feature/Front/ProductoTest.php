<?php

namespace Tests\Feature\Front;

use App\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function se_listan_solo_los_productos_visibles()
    {
           $productos = factory(Producto::class,2)->create(['visible' => true]);
            $productosNoVisibles = factory(Producto::class,3)->create(['visible' => false]);

            $this->withoutExceptionHandling();
            $response = $this->json('GET',route('front.productos.listar'));
            $response->assertStatus(200)
                    ->assertJson([
                        'data' => [
                            [     
                                  'id' => $productos[0]->id, 
                                  'nombre' => $productos[0]->nombre,
                                  'descripcion' => $productos[0]->descripcion,
                                  'direccion' => $productos[0]->direccion,
                                  'banos' => $productos[0]->banos,
                                  'habitaciones' => $productos[0]->habitaciones 
                            ],    
                            [     
                                  'id' => $productos[1]->id, 
                                  'nombre' => $productos[1]->nombre,
                                  'descripcion' => $productos[1]->descripcion,
                                  'direccion' => $productos[1]->direccion,
                                  'banos' => $productos[1]->banos,
                                  'habitaciones' => $productos[1]->habitaciones
                            ]
                        ]
                    ])
                    ->assertJsonCount(2, $key = null);  
    }

    /** @test */
    public function se_puede_mostrar_solo_un_producto()
    {
            $producto = factory(Producto::class)->create(['visible' => true]);
            $this->withoutExceptionHandling();
            $response = $this->json('GET', route('front.productos.mostrar', $producto->id));

            $response->assertStatus(200)
                    ->assertJson([
                        'id' => $producto->id
                    ]);
    }
}
