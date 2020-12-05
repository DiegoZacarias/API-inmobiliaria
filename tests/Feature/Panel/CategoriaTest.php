<?php

namespace Tests\Feature;

use App\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_pueden_agregar_categorias()
    {
          $fields = [
            'nombre' => 'Categoria',
            'descripcion' => 'descripcion',
            'imagen' => UploadedFile::fake()->create('test.png', $kilobytes = 0)
          ];  

          $this->withoutExceptionHandling();
          $response = $this->json('POST', route('categorias.store'),$fields);
          $response->assertStatus(201);

          $this->assertDatabaseHas('categorias', ['nombre' => 'Categoria']);

    }

    /** @test */
    public function se_pueden_eliminar_categorias()
    {
        $categoria = factory(Categoria::class)->create();

        $this->withoutExceptionHandling();
        $response = $this->json('DELETE', route('categorias.destroy',$categoria->id));
        $response->assertStatus(204);

        $this->assertDatabaseMissing('categorias',['nombre' => $categoria->nombre]);
    }

    /** @test */
    public function se_pueden_editar_categorias()
    {
        $categoria = factory(Categoria::class)->create();

        $fields = [
            'nombre' => 'Categoria editada',
            'descripcion' => 'desc',
            'imagen' => UploadedFile::fake()->create('test.png', $kilobytes = 0)
        ];

        $response = $this->json('PUT', route('categorias.update',$categoria->id), $fields);
        $response->assertStatus(200);

        $this->assertDatabaseMissing('categorias',['nombre' => $categoria->nombre]);
        $this->assertDatabaseHas('categorias',['nombre' => 'Categoria editada']);
    }

    /** @test */
    public function se_pueden_listar_categorias()
    {
            $categorias = factory(Categoria::class,2)->create();

            $response = $this->json('GET', route('categorias.index'));
            $response->assertStatus(200)
                    ->assertJson([
                        [
                            'nombre' => $categorias[0]->nombre,
                            'descripcion' => $categorias[0]->descripcion
                        ],
                        [
                            'nombre' => $categorias[1]->nombre,
                            'descripcion' => $categorias[1]->descripcion
                        ]
                    ]);
    }
}
