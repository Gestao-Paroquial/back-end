<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('email',100);
            $table->string('cnpj',15)->nullable();
            $table->string('telefone',13);
            $table->string('celular',13)->nullable();
            $table->string('endereco',150);
            $table->string('nro',10);
            $table->string('compl',50)->nullable();
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('uf',2)->nullable();
            $table->string('cep',8);
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
        Schema::dropIfExists('comunidades');
    }
}
