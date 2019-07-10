<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Produtos::class, function (Faker $faker) {
    return [
        'nome'       => $faker->name,
        'quantidade' => $faker->numberBetween(0, 123),
        'valor'      => $faker->randomFloat(2)
    ];
});
