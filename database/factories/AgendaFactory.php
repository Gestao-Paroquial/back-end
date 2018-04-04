<?php

use Faker\Generator as Faker;

$factory->define(App\Agenda::class, function (Faker $faker) {
    return [
        'comunidade_id'	=> $faker->numberBetween($min = 1, $max = 2),
        'tipo_evento_id' => $faker->numberBetween($min = 1, $max = 4),
        'data_inicio_evento' => $faker->datetime(),
        'data_fim_evento' => $faker->datetime(),
        'titulo' => $faker->jobTitle(),
        'descricao' => $faker->text($maxNbChars = 150)
    ];
});
