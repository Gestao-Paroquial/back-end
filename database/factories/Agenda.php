<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'comunidade_id'	=> $faker->numberBetween($min = 1, $max = 2),
        'tipo_eventos_id' => $faker->numberBetween($min = 1, $max = 4),
        'data_Evento' => $faker->datetime(),
        'descricao' => $daker->text($maxNbChars = 200)
    ];
});
