<?php

use Illuminate\Database\Seeder;

class TelefonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Telefone::class, 200)->create();
    }
}
