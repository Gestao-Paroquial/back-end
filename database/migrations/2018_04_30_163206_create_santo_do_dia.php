<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantoDoDia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santo_do_dia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100)->nullable();
            $table->mediumText('historia')->nullable();
            $table->string('titulo_historia')->nullable();
            $table->date('dia')->nullable();  
            $table->binary('imagem');                
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
        Schema::dropIfExists('santo_do_dia');
    }
}
