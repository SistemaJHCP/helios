<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Operador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('correctivo');
            $table->string('orden',60);
            $table->string('fecha',22);
            $table->string('fecha_fin',22);
            $table->string('sintoma',100);
            $table->enum('prioridad',['normal','urgente']);
            $table->enum('siniestro',['si', 'no']);
            $table->string('motivo',100);
            $table->string('descripcion',250);
            $table->string('usuario',50);
            $table->bigInteger('telefono');
            $table->string('u_tecnica',100);
            $table->string('inmueble',100);
            $table->string('planta',60);
            $table->string('oficina',20);
            $table->string('ceco',60);
            $table->string('emplazamiento',100);
            $table->string('coordinador_bbva',60);
            $table->integer('coordinador_jhcp_id');
            $table->integer('operador_creador_id');
            $table->enum('disponibilidad',['disponible','asignado', 'ejecutando', 'evaluando','esperando aprobación', 'en espera del cliente','culminado', 'cancelado', 'cerrado por lider', 'cerrado por coord'])->default('disponible');
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
        Schema::dropIfExists('caso');
    }
}
