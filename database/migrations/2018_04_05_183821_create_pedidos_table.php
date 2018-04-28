<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('mensagem')->nullable();
            $table->date('data')->nullable();
            $table->integer('aprovado')->nullable();
            $table->boolean('casamento')->nullable();
            $table->boolean('batismo')->nullable();
            $table->date('data_do_checkout')->nullable();
            $table->integer('code')->nullable();
            $table->string('link')->nullable();
            $table->string('cpf')->nullable();         
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
        Schema::dropIfExists('pedidos');
    }
}
