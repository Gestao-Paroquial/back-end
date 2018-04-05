<?php

use Illuminate\Database\Seeder;

class PagamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pagamento::class, 10)->create();
    }
}
