<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agencia;
use Faker\Generator as Faker;

$factory->define(Agencia::class, function (Faker $faker) {
    return [
        'banco_id' => factory(App\Banco::class),
        'numero' => $faker->unique()->numerify($string = '####')  ,
        'digito' => $faker->unique()->numerify($string = '#')
    ];
});
