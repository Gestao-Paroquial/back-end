<?php

use Illuminate\Database\Seeder;

class MembrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Membro::class, 30)->create();
    }
}
