<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidade_id')->unsigned();
            $table->integer('tipo_evento_id')->unsigned();
            $table->datetime('data_inicio_evento');
            $table->datetime('data_fim_evento')->nullable();
            $table->string('titulo');
            $table->string('descricao');            
            $table->timestamps();

            $table->foreign('tipo_evento_id')
                            ->references('id')
                            ->on('tipo_eventos')
                            ->onDelete('cascade');

            $table->foreign('comunidade_id')
                            ->references('id')
                            ->on('comunidades')
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
        Schema::dropIfExists('agendas');
    }
}
