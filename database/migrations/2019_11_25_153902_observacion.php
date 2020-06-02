<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Observacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('observacion',1000);
            $table->enum('status', ['aprobado', 'cancelado']);
            $table->unsignedBigInteger('caso_id');

            $table->foreign('caso_id')->references('id')->on('caso');
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
        Schema::dropIfExists('observacion');
    }
}
