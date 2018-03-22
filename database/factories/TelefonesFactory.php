<?php

use Faker\Generator as Faker;

$factory->define(App\Telefone::class, function (Faker $faker) {
    return [
        'classe_telefone_id' => $faker->numberBetween($min = 1, $max = 5),
        'id_entidade' => $faker->numberBetween($min = 1, $max = 100),
        'telefone' => '(00) 00000-0000'
    ];
});
