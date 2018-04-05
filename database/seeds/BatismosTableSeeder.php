<?php

use Illuminate\Database\Seeder;

class BatismosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Batismo::class, 10)->create();
    }
}
