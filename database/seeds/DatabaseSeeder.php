<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ComunidadesTableSeeder::class);
        $this->call(VisitantesTableSeeder::class);
        $this->call(PastoraisTableSeeder::class);
        $this->call(MembrosPastoraisTableSeeder::class);

    }
}
