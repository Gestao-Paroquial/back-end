<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosPastoraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros_pastorais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidades_id')->unsigned();
            $table->integer('pastorais_id')->unsigned();
            $table->string('nome',100);
            $table->string('email',100)->nullable();
            $table->string('telefone',13);
            $table->string('celular',13);
            $table->string('endereco',150)->nullable();
            $table->string('nro',10)->nullable();
            $table->string('compl',50)->nullable();
            $table->string('bairro',50)->nullable();
            $table->string('cidade',50)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('cep',8)->nullable();
            $table->timestamps();

            $table->foreign('comunidades_id')
                            ->references('id')
                            ->on('comunidades')
                            ->onDelete('cascade');
                            
            $table->foreign('pastorais_id')
                            ->references('id')
                            ->on('pastorais')
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
        Schema::dropIfExists('membros_pastorais');
    }
}
