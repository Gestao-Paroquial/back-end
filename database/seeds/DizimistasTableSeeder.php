<?php

use Illuminate\Database\Seeder;

class DizimistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dizimo::class, 120)->create();
    }
}
