<?php

use Faker\Generator as Faker;

$factory->define(App\Visitantes::class, function (Faker $faker) {
    return [
    	'comunidades_id' => $faker->numberBetween($min = 1, $max = 2),
        'nome' 		=> $faker->name,
		'email' 	=> $faker->unique()->safeEmail,
		'telefone' 	=> '1122223333',
    ];
});
