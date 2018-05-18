<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidade_id')->unsigned()->nullable();
            $table->integer('tipo_doacoe_id')->unsigned()->nullable();
            $table->datetime('data');
            $table->string('descricao');
            $table->decimal('valor');
            $table->integer('code')->nullable();
            $table->boolean('excluido')->default(false);
            $table->timestamps();


            $table->foreign('comunidade_id')
                            ->references('id')
                            ->on('comunidades')
                            ->onDelete('cascade');

            $table->foreign('tipo_doacoe_id')
                            ->references('id')
                            ->on('tipo_doacoes')
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
        Schema::dropIfExists('doacoes');
    }
}
