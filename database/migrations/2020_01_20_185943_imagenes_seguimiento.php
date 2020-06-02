<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagenesSeguimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_seguimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('imagenes_id');
            $table->unsignedBigInteger('seguimiento_id');

            $table->foreign('imagenes_id')->references('id')->on('imagenes');
            $table->foreign('seguimiento_id')->references('id')->on('seguimiento');
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
        Schema::dropIfExists('imagenes_seguimiento');
    }
}
