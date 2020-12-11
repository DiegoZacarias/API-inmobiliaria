<?php

namespace Tests\Feature\Front;

use App\Categoria;
use App\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_muestran_los_detalles_de_una_categoria()
    {
            $categoria = factory(Categoria::class)->create();

            $this->withoutExceptionHandling();
            $response = $this->json('GET', route('front.categorias.mostrar', $categoria->id));
            $response->assertStatus(200)
                    ->assertJson([
                        'id' => $categoria->id,
                        'nombre' => $categoria->nombre
                    ]);

    }

    /** @test */
    public function se_muestran_todas_las_categorias()
    {
            $categorias = factory(Categoria::class,2)->create();

            $this->withoutExceptionHandling();
            $response = $this->json('GET', route('front.categorias.listar'));
            $response->assertStatus(200)
                    ->assertJson([
                        'data' => [
                             [     
                                  'id' => $categorias[0]->id, 
                                  'nombre' => $categorias[0]->nombre,
                                  'descripcion' => $categorias[0]->descripcion 
                            ],    
                            [     
                                  'id' => $categorias[1]->id, 
                                  'nombre' => $categorias[1]->nombre,
                                  'descripcion' => $categorias[1]->descripcion,
                            ]
                        ]
                    ]);
    }

    /** @test */
    public function se_muestran_todos_los_productos_de_una_categoria()
    {
            $categoria = factory(Categoria::class)->create();

            $productoCollection = factory(Producto::class,2)->create(['visible'=> true, 'categoria_id' => $categoria->id]);

            $this->withoutExceptionHandling();
            $response = $this->json('GET', route('front.categorias.productos', $categoria->id));

            $response->assertStatus(200)
                    ->assertJson([
                        'data' => [
                            [     
                                  'id' => $productoCollection[0]->id, 
                                  'nombre' => $productoCollection[0]->nombre,
                                  'descripcion' => $productoCollection[0]->descripcion,
                                  'direccion' => $productoCollection[0]->direccion,
                                  'banos' => $productoCollection[0]->banos,
                                  'habitaciones' => $productoCollection[0]->habitaciones 
                            ],    
                            [     
                                  'id' => $productoCollection[1]->id, 
                                  'nombre' => $productoCollection[1]->nombre,
                                  'descripcion' => $productoCollection[1]->descripcion,
                                  'direccion' => $productoCollection[1]->direccion,
                                  'banos' => $productoCollection[1]->banos,
                                  'habitaciones' => $productoCollection[1]->habitaciones
                            ]
                        ]
                    ]);
    }
}
