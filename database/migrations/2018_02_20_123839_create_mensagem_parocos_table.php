<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemParocosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagens_parocos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',100);
            $table->string('subtitulo',100);  
            $table->string('mensagem',2000); 
            $table->string('link',200); 
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
        Schema::dropIfExists('mensagens_parocos');
    }
}
