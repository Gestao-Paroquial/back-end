<?php

use Illuminate\Database\Seeder;

class ComunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comunidades::class, 2)->create();
    }
}
