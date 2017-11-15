<?php

use Illuminate\Database\Seeder;

class PastoraisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pastorais::class, 20)->create();
    }
}
