<?php

use Faker\Generator as Faker;

$factory->define(App\MensagensParoco::class, function (Faker $faker) {
    return [
        'titulo' 		=> $faker->sentence($nbWords = 3, $variableNbWords = true),
        'subtitulo'     => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'mensagem' 	    => $faker->text,
        'link'      	=> $faker->url,
    ];
});
