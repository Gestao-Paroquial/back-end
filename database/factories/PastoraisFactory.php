<?php

use Faker\Generator as Faker;

$factory->define(App\Pastorai::class, function (Faker $faker) {
    return [
        'comunidade_id' => $faker->numberBetween($min = 1, $max = 2),
        'classe_telefone_id' => 2,
        'coordenador_id' => $faker->numberBetween($min = 1, $max = 20),
        'nome' 		=> 'Pastorais',
		'descricao' 	=> 'Descrição das pastorais',
    ];
});
