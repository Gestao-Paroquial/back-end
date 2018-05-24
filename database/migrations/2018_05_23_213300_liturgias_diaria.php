<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LiturgiasDiaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liturgia_diarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia');
            $table->string('mes');
            $table->string('ano');
            $table->mediumText('primeira_leitura');
            $table->mediumText('segunda_leitura');
            $table->mediumText('salmo');
            $table->mediumText('evangelho');  
            $table->string('cor_liturgica');
            $table->string('tempo_liturgico');                         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liturgia_diarias');
    }
}
