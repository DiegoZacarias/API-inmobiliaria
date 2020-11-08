<?php

namespace Tests\Feature;

use App\Categoria;
use App\Negocio;
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
}
