<?php

use Faker\Generator as Faker;

$factory->define(App\Doacoe::class, function (Faker $faker) {
    return [
    	'comunidade_id' => $faker->numberBetween($min = 1, $max = 2),
        'tipo_doacoe_id' => $faker->numberBetween($min = 1, $max = 2),
        'data' => $faker->date(),
        'descricao' => 'Descrição da doação efetuada',
       	'valor' => $faker->randomFloat($nbMaxDecimals = 6, $min = 100, $max = 1000)
    ];
});
