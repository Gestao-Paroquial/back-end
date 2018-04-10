<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_membro_id')->unsigned();
            $table->integer('classe_telefone_id')->unsigned(); 
            $table->integer('tipo_estado_civi_id')->unsigned();           
            $table->string('nome',100);
            $table->string('email',100);
            $table->date('data_Nascimento')->nullable();
            $table->string('nome_Pai',100)->nullable();
            $table->string('nome_Mae',100)->nullable();
            $table->boolean('batizado')->nullable();
            $table->boolean('crismado')->nullable();
            $table->boolean('1_eucaristia')->nullable();
            $table->string('endereco',150)->nullable();
            $table->string('nro',10)->nullable();
            $table->string('compl',50)->nullable();
            $table->string('bairro',50)->nullable();
            $table->string('cidade',50)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('cep',9)->nullable();
            $table->boolean('status');
            $table->boolean('excluido')->default(false);
            $table->timestamps();


            $table->foreign('tipo_membro_id')
                            ->references('id')
                            ->on('tipo_membros')
                            ->onDelete('cascade');

            $table->foreign('classe_telefone_id')
                            ->references('id')
                            ->on('classe_telefones')
                            ->onDelete('cascade');
            $table->foreign('tipo_estado_civi_id')
                            ->references('id')
                            ->on('tipo_estado_civis')
                            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membros');
    }
}
