<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batismos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_id')->unsigned();
            $table->integer('classe_telefone_id')->unsigned();
            $table->string('nomeBatizando');
            $table->datetime('dataNascimento');
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
        Schema::dropIfExists('batismos');
    }
}
