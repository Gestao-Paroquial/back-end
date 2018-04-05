<?php

use Illuminate\Database\Seeder;

class CasamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Casamento::class, 10)->create();
    }
}
