<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastoraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastorais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidade_id')->unsigned();
            $table->integer('classe_telefone_id')->unsigned();
            $table->integer('coordenador_id')->unsigned();
            $table->string('nome',100);
            $table->string('descricao',255);  
            $table->boolean('excluido')->default(false);          
            $table->timestamps();

            $table->foreign('comunidade_id')
                            ->references('id')
                            ->on('comunidades')
                            ->onDelete('cascade');

            $table->foreign('classe_telefone_id')
                            ->references('id')
                            ->on('classe_telefones')
                            ->onDelete('cascade');

            $table->foreign('coordenador_id')
                            ->references('id')
                            ->on('membros')
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
        Schema::dropIfExists('pastorais');
    }
}
