<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDizimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dizimos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('membro_id')->unsigned();
            $table->string('mes',2);
            $table->string('ano',4);
            $table->decimal('valor');
            $table->boolean('excluido')->default(false);
            $table->timestamps();

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
        Schema::dropIfExists('dizimos');
    }
}
