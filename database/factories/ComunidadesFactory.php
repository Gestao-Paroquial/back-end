<?php

use Faker\Generator as Faker;

$factory->define(App\Comunidade::class, function (Faker $faker) {
	return [
		'classe_telefone_id' => 1,
		'nome' 		=> 'comunidade teste',
		'email' 	=> $faker->unique()->safeEmail,
		'cnpj' 		=> '111111111000110',
		'endereco' 	=> 'rua são paulo',
		'nro' 		=> '100',
		'compl' 	=> 'sala 1',
		'bairro' 	=> 'centro',
		'cidade' 	=> 'São paulo',
		'uf' 		=> 'SP',
		'cep' 		=> '00000000', 

	];
});
