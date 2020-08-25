<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Banco;
use Faker\Generator as Faker;

$factory->define(Banco::class, function (Faker $faker) {
    return [
        'numero' => $faker->numberBetween(1000, 9999),
        'cnpj' => $faker->unique()->numerify('#############'),
        'nome' => $faker->name,
    ];
});
