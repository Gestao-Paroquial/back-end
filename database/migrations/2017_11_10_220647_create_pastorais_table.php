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
            $table->integer('comunidades_id')->unsigned();
            $table->string('nome',100);
            $table->string('descricao',255);            
            $table->timestamps();

            $table->foreign('comunidades_id')
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
        Schema::dropIfExists('pastorais');
    }
}
