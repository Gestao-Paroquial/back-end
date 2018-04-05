<?php

use Illuminate\Database\Seeder;

class AtaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ata::class, 10)->create();
    }
}
