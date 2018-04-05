<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_id')->unsigned();
            $table->integer('classe_telefone_id')->unsigned();
            $table->string('nomeNoivo');
            $table->datetime('dataNascNoivo');
            $table->string('nomeNoiva');
            $table->datetime('dataNascNoiva');
            $table->timestamps();


            $table->foreign('agenda_id')
                            ->references('id')
                            ->on('agendas')
                            ->onDelete('cascade');

            $table->foreign('classe_telefone_id')
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
        Schema::dropIfExists('casamentos');
    }
}
