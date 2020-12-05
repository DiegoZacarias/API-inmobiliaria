<?php

namespace Tests\Feature\Panel;

use App\Negocio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NegocioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_pueden_agregar_negocios()
    {
            $fields = [
                'nombre' => 'Negocio',
                'descripcion' => 'descripcion'
            ];

            $this->withoutExceptionHandling();
            $response = $this->json('POST', route('negocios.store'), $fields);
            $response->assertStatus(201);

            $this->assertDatabaseHas('negocios',['nombre' => 'Negocio']);
    }

    /** @test */
    public function se_pueden_editar_negocios()
    {
            $negocio = factory(Negocio::class)->create();

            $fields = [
                'nombre' => 'negocioEditado',
                'descripcion' => null
            ];

            $this->withoutExceptionHandling();
            $response = $this->json('PUT', route('negocios.update', $negocio->id),$fields);
            $response->assertStatus(200);

            $this->assertDatabaseMissing('negocios',['nombre' => $negocio->nombre]);
            $this->assertDatabaseHas('negocios',['nombre' => 'negocioEditado']);
    }

    /** @test */
    public function se_puede_eliminar_un_negocio()
    {
            $negocio = factory(Negocio::class)->create();

            $response = $this->json('DELETE', route('negocios.destroy', $negocio->id));
            $response->assertStatus(201);

            $this->assertDatabaseMissing('negocios',['nombre'=> $negocio->nombre]);
    }

    /** @test */
    public function se_pueden_listar_los_negocios()
    {
            $negocio = factory(Negocio::class,2)->create();

            $response = $this->json('GET',route('negocios.index'));
            $response->assertStatus(200)
                    ->assertJson([
                        [
                            'nombre' => $negocio[0]->nombre,
                            'descripcion' => $negocio[0]->descripcion
                        ],
                        [
                            'nombre' => $negocio[1]->nombre,
                            'descripcion' => $negocio[1]->descripcion
                        ]
                    ]);
    }
}
