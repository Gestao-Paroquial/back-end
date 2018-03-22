<?php

use Faker\Generator as Faker;

$factory->define(App\AtaDetalhe::class, function (Faker $faker) {
    return [
        'ata_id'	=> $faker->numberBetween($min = 1, $max = 10),
        'tipo_lancamento_id'	=> $faker->numberBetween($min = 1, $max = 2),
        'descricao'	=>	'descrição do crédito ou do débito',
        'valor' => $faker->randomFloat($nbMaxDecimals = 6, $min = 100, $max = 1000)
    ];
});
