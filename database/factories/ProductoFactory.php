<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use App\Negocio;
use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
	$categoria = factory(Categoria::class)->create();
	$negocio = factory(Negocio::class)->create();
    return [
    		'nombre' => $faker->name,
    		'direccion' => $faker->address,
    		'banos' => $faker->numberBetween($min = 1, $max = 5),
    		'habitaciones' => $faker->numberBetween($min = 1, $max = 5),
    		'estacionamiento' => $faker->numberBetween($min = 1, $max = 5),
        'categoria_id' => $categoria->id,
        'negocio_id' => $negocio->id
    ];
});
