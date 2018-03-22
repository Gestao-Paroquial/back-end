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
        $this->call(UsersTableSeeder::class);
        $this->call(ComunidadesTableSeeder::class);
        $this->call(PastoraisTableSeeder::class);
        $this->call(AgendaTableSeeder::class);
        $this->call(MembrosTableSeeder::class);
        $this->call(AtaTableSeeder::class);
        $this->call(AtaDetalhesTableSeeder::class);
        $this->call(BatismosTableSeeder::class);
        $this->call(CasamentosTableSeeder::class);
        $this->call(DependentesTableSeeder::class);
        $this->call(DizimistasTableSeeder::class);
        $this->call(DoacoesTableSeeder::class);
        $this->call(TelefonesTableSeeder::class);
        $this->call(PagamentosTableSeeder::class);
        //ultimo a ser rodado por q é chave composta e pode dar erro da duplicidade
        $this->call(MembrosPastoraisSeeder::class);

    }
}
