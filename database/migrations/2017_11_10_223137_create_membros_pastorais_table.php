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
            $table->string('email',100);
            $table->string('Telefone',13);
            $table->string('Celular',13);
            $table->string('Endereco',150);
            $table->string('nro',10);
            $table->string('compl',50);
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('uf',2);
            $table->string('cep',8);
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
