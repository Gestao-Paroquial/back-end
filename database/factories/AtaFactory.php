<?php

use Faker\Generator as Faker;

$factory->define(App\Ata::class, function (Faker $faker) {
    return [
        'comunidade_id'	=> $faker->numberBetween($min = 1, $max = 2),
        'dataAta' => $faker->datetime(),
        'descricao' => $faker->text($maxNbChars = 150),
    ];
});
