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
        Schema::create('santos_do_dia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->mediumText('history');
            $table->string('day',2);
            $table->string('month',30);  
            $table->string('image',500);                
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
        Schema::dropIfExists('santos_do_dia');
    }
}
