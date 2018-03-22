<?php

use Illuminate\Database\Seeder;

class AtaDetalhesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AtaDetalhe::class, 60)->create();
    }
}
