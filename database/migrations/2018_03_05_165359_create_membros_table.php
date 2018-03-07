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
            $table->integer('comunidades_id')->unsigned();
            $table->integer('tipo_membros_id')->unsigned();
            $table->integer('classeTelefones_id')->unsigned();            
            $table->string('nome',100);
            $table->string('email',100);
            $table->datetime('dataNasc')->nullable();
            $table->string('nomePai',100)->nullable();
            $table->string('nomeMae',100)->nullable();
            $table->boolean('estadoCivil')->nullable();
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
            $table->timestamps();


            
            $table->foreign('comunidades_id')
                            ->references('id')
                            ->on('comunidades')
                            ->onDelete('cascade');

            $table->foreign('tipo_membros_id')
                            ->references('id')
                            ->on('tipo_membros')
                            ->onDelete('cascade');

            $table->foreign('classeTelefones_id')
                            ->references('id')
                            ->on('classe_telefones')
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
