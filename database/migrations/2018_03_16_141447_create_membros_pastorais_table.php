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
            $table->integer('pastorai_id')->unsigned();
            $table->integer('membro_id')->unsigned();
            $table->boolean('excluido')->default(false);
            $table->timestamps();

            $table->foreign('pastorai_id')
                            ->references('id')
                            ->on('pastorais')
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
        Schema::dropIfExists('membros_pastorais');
    }
}
