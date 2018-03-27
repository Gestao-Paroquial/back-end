<?php

use Faker\Generator as Faker;

$factory->define(App\MembrosComunidade::class, function (Faker $faker) {
    return [
        'comunidade_id'	=> $faker->numberBetween($min = 1, $max = 2),
		'membro_id'	=> $faker->numberBetween($min = 1, $max = 20)
    ];
});
