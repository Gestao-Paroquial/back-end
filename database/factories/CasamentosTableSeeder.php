<?php

use Faker\Generator as Faker;

$factory->define(App\Casamento::class, function (Faker $faker) {
    return [
        'agenda_id'	=> $faker->numberBetween($min = 6, $max = 10),
       	'classe_telefone_id' => 5,
       	'nomeNoivo' => $faker->name('male'),
       	'dataNascNoivo' => $faker->date(),
       	'nomeNoiva' => $faker->name('female'),
       	'dataNascNoiva' => $faker->date(),
    ];

});
