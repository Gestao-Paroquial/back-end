<?php

use Faker\Generator as Faker;

$factory->define(App\Dizimo::class, function (Faker $faker) {
    return [
        'membro_id' => $faker->numberBetween($min = 1, $max = 20),
       	'mes' => $faker->month(),
       	'ano' => '2017',
       	'valor' => $faker->randomFloat($nbMaxDecimals = 6, $min = 100, $max = 1000)
       	
    ];
});
