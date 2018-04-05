<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_id')->unsigned();
            $table->integer('tipo_pagamento_id')->unsigned();
            $table->datetime('data_Pagamento');
            $table->decimal('valor');
            $table->timestamps();

            $table->foreign('agenda_id')
                            ->references('id')
                            ->on('agendas')
                            ->onDelete('cascade');

            $table->foreign('tipo_pagamento_id')
                            ->references('id')
                            ->on('tipo_pagamentos')
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
        Schema::dropIfExists('pagamentos');
    }
}
