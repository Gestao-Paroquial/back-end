<?php

use Faker\Generator as Faker;

$factory->define(App\Membro::class, function (Faker $faker) {
    return [
    	'tipo_membro_id' 	=>	$faker->numberBetween($min = 1, $max = 3),
    	'classe_telefone_id' => 3,
    	'tipo_estado_civi_id' 	=> $faker->numberBetween($min = 1, $max = 6),
        'nome'    		=> 	$faker->name,
		'email'    		=>	$faker->unique()->safeEmail,
		'data_Nascimento' 	=>	$faker->date(),
		'nome_Pai' 		=> $faker->name('male'),
		'nome_Mae' 		=> $faker->name('femile'),
		'batizado' 		=> $faker->numberBetween($min = 0, $max = 1),
		'crismado'	 	=> $faker->numberBetween($min = 0, $max = 1),
		'1_eucaristia' 	=> $faker->numberBetween($min = 0, $max = 1),
		'endereco' 		=> 'rua são paulo',
		'nro' 			=> '100',
		'compl' 		=> 'sala 1',
		'bairro' 		=> 'centro',
		'cidade' 		=> 'São paulo',
		'uf' 			=> 'SP',
		'cep' 			=> '00000000', 
		'status'		=> 1
    ];
});
