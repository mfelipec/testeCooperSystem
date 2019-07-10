<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Pedidos::class, function (Faker $faker) {
    return [
        'produto_id' => function(){
                return factory(\App\Models\Produtos::class)->create()->id;
            },
        'quantidade' => 1,
        'valor_unitario' => $faker->randomFloat(2),
        'solicitante' => $faker->name,
        'cep' => $faker->postcode,
        'uf' => str_random(2),
        'municipio' => $faker->century,
        'bairro' => $faker->city,
        'rua' => $faker->streetAddress,
        'despachante' => $faker->name
    ];
});
