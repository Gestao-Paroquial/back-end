<?php

use Illuminate\Database\Seeder;

class MembrosPastoraisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MembrosPastorais::class, 80)->create();
    }
}
