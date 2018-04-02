<?php

use Faker\Generator as Faker;

$factory->define(App\Pastorais::class, function (Faker $faker) {
    return [
        'comunidades_id' => $faker->numberBetween($min = 1, $max = 2),
        'nome' 		=> $faker->jobTitle,
		'descricao' 	=> $faker->text,
    ];
});
