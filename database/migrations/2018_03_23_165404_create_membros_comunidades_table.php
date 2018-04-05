<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros_comunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidade_id')->unsigned();
            $table->integer('membro_id')->unsigned();
            $table->timestamps();

            $table->foreign('comunidade_id')
                            ->references('id')
                            ->on('comunidades')
                            ->onDelete('cascade');

            $table->foreign('membro_id')
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
        Schema::dropIfExists('membros_comunidades');
    }
}
