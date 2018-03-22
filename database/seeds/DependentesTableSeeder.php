<?php

use Illuminate\Database\Seeder;

class DependentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dependente::class, 30)->create();
    }
}
