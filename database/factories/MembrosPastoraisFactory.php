<?php

use Faker\Generator as Faker;

$factory->define(App\MembrosPastorai::class, function (Faker $faker) {
	return [
		'pastorai_id'	=> $faker->numberBetween($min = 1, $max = 20),
		'membro_id'	=> $faker->numberBetween($min = 1, $max = 20)
];
});
