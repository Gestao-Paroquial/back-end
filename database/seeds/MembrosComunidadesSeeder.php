<?php

use Illuminate\Database\Seeder;

class MembrosComunidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MembrosComunidade::class, 20)->create();
    }
}
