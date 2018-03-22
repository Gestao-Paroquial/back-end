<?php

use Illuminate\Database\Seeder;

class MembrosPastoraisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MembrosPastorai::class, 20)->create();
    }
}
