<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ruta_imagenes',200);
            $table->timestamps();
        });

        Schema::create('avances_imagenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('avances_id');
            $table->unsignedBigInteger('imagenes_id');

            $table->foreign('avances_id')->references('id')->on('avances');
            $table->foreign('imagenes_id')->references('id')->on('imagenes');


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
        Schema::dropIfExists('avances_imagenes');
        Schema::dropIfExists('imagenes');
    }
}
