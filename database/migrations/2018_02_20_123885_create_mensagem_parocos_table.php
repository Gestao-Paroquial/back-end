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
            $table->mediumText('mensagem'); 
            $table->string('link',200)->nullable(); 
            $table->boolean('excluido')->default(false);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')
                            ->references('id')
                            ->on('users')
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
        Schema::dropIfExists('mensagens_parocos');
    }
}
