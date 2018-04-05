<?php

use Faker\Generator as Faker;

$factory->define(App\Pagamento::class, function (Faker $faker) {
    return [
        'agenda_id' => $faker->numberBetween($min = 1, $max = 20),
        'tipo_pagamento_id' => $faker->numberBetween($min = 1, $max = 4),
        'data_Pagamento' => $faker->date(),
        'valor' => $faker->randomFloat($nbMaxDecimals = 6, $min = 100, $max = 1000)
    ];
});
