<?php

use Illuminate\Database\Seeder;

class MensagensParocoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MensagensParoco::class, 20)->create();
    }
}
