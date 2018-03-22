<?php

use Illuminate\Database\Seeder;

class DoacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Doacoe::class, 40)->create();
    }
    
}
