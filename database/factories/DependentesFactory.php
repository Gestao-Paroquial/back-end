<?php

use Faker\Generator as Faker;

$factory->define(App\Dependente::class, function (Faker $faker) {
    return [
        'membro_id' => $faker->numberBetween($min = 1, $max = 20),
       	'tipo_dependente_id' => $faker->numberBetween($min = 2, $max = 8),
       	'nome' => $faker->name(),
       	'data_Nascimento' => $faker->date()
       	
    ];
});
