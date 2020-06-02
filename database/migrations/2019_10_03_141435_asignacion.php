<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asignacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('caso_id');
            $table->unsignedBigInteger('lider_usuario_id');
            $table->bigInteger('coordinador_asignante_id');

            $table->foreign('caso_id')->references('id')->on('caso');
            $table->foreign('lider_usuario_id')->references('id')->on('users');
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
        Schema::dropIfExists('asignacion');
    }
}
