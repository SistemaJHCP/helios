<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seguimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('avance');
            $table->bigInteger('fotografo');
            $table->unsignedBigInteger('caso_id');
            $table->timestamps();

            $table->foreign('caso_id')->references('id')->on('caso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimiento');
    }
}
