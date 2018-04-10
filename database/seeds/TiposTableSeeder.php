<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classe_telefones')->insert([
        	['descricao' => 'Comunidade'],
        	['descricao' => 'pastorais'],
        	['descricao' => 'membros'],
        	['descricao' => 'casamentos'],
        	['descricao' => 'batismos']

        ]);

        DB::table('tipo_dependentes')->insert([
        	['descricao' => 'Conjuge'],
        	['descricao' => 'Filho'],
        	['descricao' => 'Filha'],
        	['descricao' => 'Pai'],
        	['descricao' => 'Mãe'],
        	['descricao' => 'Avô'],
        	['descricao' => 'Avó'],
        	['descricao' => 'Outro']

        ]);

        DB::table('tipo_estado_civis')->insert([
            ['descricao' => 'Solteiro'],
            ['descricao' => 'Casado'],
            ['descricao' => 'Solteiro'],
            ['descricao' => 'Divorciado'],
            ['descricao' => 'Viuvo'],
            ['descricao' => 'Amasiado']

        ]);

        DB::table('tipo_doacoes')->insert([
        	['descricao' => 'Oferta'],
        	['descricao' => 'Arrecadação em festa']

        ]);

        DB::table('tipo_eventos')->insert([
        	['descricao' => 'Festa'],
        	['descricao' => 'Batismo'],
        	['descricao' => 'Casamento'],
        	['descricao' => 'Quermesse']

        ]);

        DB::table('tipo_lancamentos')->insert([
        	['descricao' => 'Crédito'],
        	['descricao' => 'Débito']

        ]);

        DB::table('tipo_membros')->insert([
        	['descricao' => 'Visitante'],
        	['descricao' => 'Membro'],
        	['descricao' => 'Membro e dizimista']

        ]);

        DB::table('tipo_pagamentos')->insert([
        	['descricao' => 'Dinheiro'],
        	['descricao' => 'Cartão débito'],
        	['descricao' => 'Cartão crédito'],
        	['descricao' => 'Cheque']

        ]);

        DB::table('roles')->insert([
            ['name' => 'Admin', 'label' => 'Adminsitrador geral do sistema'],
            ['name' => 'Administrador', 'label' => 'Faz toda administração do sistema liberando acesso a outros usuários'],
            ['name' => 'Gerente', 'label' => 'Faz o gerenciamento do sistema mas não tem permissão de criar ou dar acesso a outros usuários'],
            ['name' => 'Supervisor', 'label' => 'Tem acesso a algumas partes do sistema para incluir, alterar, consultar, eventos, pagamentos e outros serviços'],
            ['name' => 'Usuário comum', 'label' => 'Pode apenas consultar visualizar algumas informações do sistema']

        ]);

        DB::table('permissions')->insert([
            ['name' => 'agenda_create', 'label' => 'Criar um evento na agenda'],
            ['name' => 'agenda_read', 'label' => 'Consultar um evento na agenda'],
            ['name' => 'agenda_update', 'label' => 'Alterar um evento na agenda'],
            ['name' => 'agenda_delete', 'label' => 'Excluir um evento na agenda'],
            ['name' => 'ata_create', 'label' => 'Criar uma Ata'],
            ['name' => 'ata_read', 'label' => 'Consultar um Ata'],
            ['name' => 'ata_update', 'label' => 'Alterar um Ata'],
            ['name' => 'ata_delete', 'label' => 'Excluir um ata'],
            ['name' => 'ata_detalhes_create', 'label' => 'Criar detalhes para uma Ata'],
            ['name' => 'ata_detalhes_read', 'label' => 'Consultar detalhes de um Ata'],
            ['name' => 'ata_detalhes_update', 'label' => 'Alterar detalhes de um Ata'],
            ['name' => 'ata_detalhes_delete', 'label' => 'Excluir detalhes de um ata']

        ]);

        DB::table('permission_role')->insert([
            ['permission_id' => 1, 'role_id' => 2],
            ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 2],
            ['permission_id' => 4, 'role_id' => 2],
            ['permission_id' => 5, 'role_id' => 2],
            ['permission_id' => 6, 'role_id' => 2],
            ['permission_id' => 7, 'role_id' => 2],
            ['permission_id' => 8, 'role_id' => 2],
            ['permission_id' => 9, 'role_id' => 2],
            ['permission_id' => 10, 'role_id' => 2],
            ['permission_id' => 11, 'role_id' => 2],
            ['permission_id' => 12, 'role_id' => 2],

            ['permission_id' => 1, 'role_id' => 3],
            ['permission_id' => 2, 'role_id' => 3],
            ['permission_id' => 3, 'role_id' => 3],
            ['permission_id' => 4, 'role_id' => 3],
            ['permission_id' => 5, 'role_id' => 3],
            ['permission_id' => 6, 'role_id' => 3],
            ['permission_id' => 7, 'role_id' => 3],
            ['permission_id' => 8, 'role_id' => 3],
            ['permission_id' => 9, 'role_id' => 3],
            ['permission_id' => 10, 'role_id' => 3],
            ['permission_id' => 11, 'role_id' => 3],
            ['permission_id' => 12, 'role_id' => 3],

            ['permission_id' => 1, 'role_id' => 3],
            ['permission_id' => 2, 'role_id' => 3],
            ['permission_id' => 3, 'role_id' => 3],
            ['permission_id' => 5, 'role_id' => 3],
            ['permission_id' => 6, 'role_id' => 3],
            ['permission_id' => 7, 'role_id' => 3],
            ['permission_id' => 9, 'role_id' => 3],
            ['permission_id' => 10, 'role_id' => 3],
            ['permission_id' => 11, 'role_id' => 3],


            ['permission_id' => 2, 'role_id' => 3],
            ['permission_id' => 6, 'role_id' => 3],
            ['permission_id' => 10, 'role_id' => 3]


        ]);

        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1],
            ['role_id' => 2, 'user_id' => 2],
            ['role_id' => 3, 'user_id' => 3],
            ['role_id' => 4, 'user_id' => 4],
            ['role_id' => 5, 'user_id' => 5]

        ]);

    }
}
