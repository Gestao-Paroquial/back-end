<?php

use Faker\Generator as Faker;

$factory->define(App\MembrosPastorais::class, function (Faker $faker) {
	return [
		'pastorais_id'	=> $faker->numberBetween($min = 1, $max = 20),
		'nome'    		=> 	$faker->name,
		'email'    		=>	$faker->unique()->safeEmail,
		'telefone' 		=> '1122223333',
		'celular' 		=> '11999998888',
		'endereco' 		=> 'rua são paulo',
		'nro' 			=> '100',
		'compl' 		=> 'sala 1',
		'bairro' 		=> 'centro',
		'cidade' 		=> 'São paulo',
		'uf' 			=> 'SP',
		'cep' 			=> '00000000', 
		
];
});
