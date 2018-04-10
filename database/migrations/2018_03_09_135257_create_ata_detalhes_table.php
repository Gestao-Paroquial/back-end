<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtaDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ata_detalhes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ata_id')->unsigned();
            $table->integer('tipo_lancamento_id')->unsigned();
            $table->string('descricao');
            $table->decimal('valor');
            $table->boolean('excluido')->default(false);
            $table->timestamps();

            $table->foreign('ata_id')
                            ->references('id')
                            ->on('atas')
                            ->onDelete('cascade');

            $table->foreign('tipo_lancamento_id')
                            ->references('id')
                            ->on('tipo_lancamentos')
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
        Schema::dropIfExists('ata_detalhes');
    }
}
