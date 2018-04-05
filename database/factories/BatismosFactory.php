<?php

use Faker\Generator as Faker;

$factory->define(App\Batismo::class, function (Faker $faker) {
    return [
       	'agenda_id'	=> $faker->numberBetween($min = 1, $max = 5),
       	'classe_telefone_id' => 5,
       	'nomeBatizando' => $faker->name(),
        'dataNascimento' => $faker->date(),
    ];
});
