<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContaBancaria;
use Faker\Generator as Faker;

$factory->define(ContaBancaria::class, function (Faker $faker) {
    return [
        'agencia_id' => factory(App\Agencia::class),
        'user_id' => factory(App\User::class),
        'numero' => $faker->unique()->numberBetween(1000, 99999),
        'digito' => $faker->unique()->numerify($string = '#'),
        'valor' => $faker->randomFloat(2, 1, 6)
    ];
});
