<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movimentacao;
use Faker\Generator as Faker;

$factory->define(Movimentacao::class, function (Faker $faker) {
    return [
        'conta_bancaria_id' => factory(App\ContaBancaria::class),
        'tipo_operacao' => $faker->randomElement(['D', 'S']),
        'valor' => $faker->randomFloat(2, 3, 6)
    ];
});
