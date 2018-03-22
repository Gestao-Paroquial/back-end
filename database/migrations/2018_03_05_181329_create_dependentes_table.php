<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membro_id')->unsigned();
            $table->integer('tipo_dependente_id')->unsigned();
            $table->string('nome',100);
            $table->datetime('data_Nascimento');

            $table->timestamps();

            $table->foreign('membro_id')
                            ->references('id')
                            ->on('membros')
                            ->onDelete('cascade');

            $table->foreign('tipo_dependente_id')
                            ->references('id')
                            ->on('tipo_dependentes')
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
        Schema::dropIfExists('dependentes');
    }
}
