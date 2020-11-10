<?php

namespace Tests\Feature;

use App\Categoria;
use App\Negocio;
use App\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function se_pueden_agregar_productos()
    {   
        $categoria = factory(Categoria::class)->create();
        $negocio = factory(Negocio::class)->create();

        $fields = [
            'nombre' => 'Producto 1',
            'descripcion' => 'descripcion',
            'direccion' => 'Avda Inmueble 9999',
            'banos' => 2,
            'habitaciones' => 3,
            'estacionamiento' => 1,
            'imagen' => UploadedFile::fake()->create('test.png', $kilobytes = 0), 
            'categoria_id' => $categoria->id,
            'negocio_id' => $negocio->id
        ];        
        $this->withoutExceptionHandling();
        $response = $this->json('POST', route('productos.store'),$fields);
        $response->assertStatus(201);

        $this->assertDatabaseHas('productos',['nombre' => 'Producto 1']);
    }

    /** @test */
    public function se_pueden_eliminar_productos()
    {
            $producto = factory(Producto::class)->create();

            $this->withoutExceptionHandling();
            $response = $this->json('DELETE', route('productos.destroy',$producto->id));
            // dd($response);
            $response->assertStatus(204);

            $this->assertDatabaseMissing('productos',['id' => $producto->id]);
    }

    /** @test */
    public function se_pueden_editar_los_productos()
    {
            $producto = factory(Producto::class)->create(); 

            $fields = [
                'nombre' => 'producto editado'
            ];

            $response = $this->json('PUT', route('productos.update',$producto->id),$fields);
            $response->assertStatus(200);

            $this->assertDatabaseMissing('productos', ['nombre' => $producto->nombre]);
            $this->assertDatabaseHas('productos', ['nombre' => 'producto editado']);
    }

    /** @test */
    public function se_pueden_listar_los_productos()
    {
            $productos = factory(Producto::class,2)->create();

            $response = $this->json('GET',route('productos.index'));
            $response->assertStatus(200)
                    ->assertJson([
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
                    ]);
    }
}
