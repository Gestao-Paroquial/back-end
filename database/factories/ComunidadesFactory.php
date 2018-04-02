<?php

use Faker\Generator as Faker;

$factory->define(App\Comunidades::class, function (Faker $faker) {
	return [
		'nome' 		=> 'comunidade teste',
		'email' 	=> $faker->unique()->safeEmail,
		'cnpj' 		=> '111111111000110',
		'telefone' 	=> '1122223333',
		'celular' 	=> '11999998888',
		'endereco' 	=> 'rua são paulo',
		'nro' 		=> '100',
		'compl' 	=> 'sala 1',
		'bairro' 	=> 'centro',
		'cidade' 	=> 'São paulo',
		'uf' 		=> 'SP',
		'cep' 		=> '00000000', 

	];
});
