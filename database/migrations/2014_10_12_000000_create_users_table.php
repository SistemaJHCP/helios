<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('configuracion', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->boolean('crear_usuarios')->default(0);
            $table->boolean('modificar_usuario')->default(0);
            $table->boolean('rehabilitar_usuario')->default(0);
            $table->boolean('deshabilitar_usuarios')->default(0);
            $table->boolean('acceso_preciario')->default(0);
            $table->boolean('cargar_preciario')->default(0);
            $table->boolean('modificar_preciario')->default(0);
            $table->boolean('eliminar_preciario')->default(0);
            $table->boolean('habilitar_politicas')->default(0);
            $table->boolean('crear_politicas')->default(0);
            $table->boolean('modificar_politicas')->default(0);


        });

        Schema::create('permisos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nombre_permisos',60);

            $table->boolean('operador')->nullable()->default(0);
            $table->boolean('ope_create')->nullable()->default(0);
            $table->boolean('ope_read')->nullable()->default(0);
            $table->boolean('ope_update')->nullable()->default(0);
            $table->boolean('ope_delete')->nullable()->default(0);
            $table->boolean('ope_permiso')->nullable()->default(0);
            $table->boolean('ope_cerrar')->nullable()->default(0);

            $table->boolean('coordinador')->nullable()->default(0);
            $table->boolean('coord_listado')->nullable()->default(0);
            $table->boolean('coord_selection')->nullable()->default(0);
            $table->boolean('coord_consult')->nullable()->default(0);
            $table->boolean('coord_update')->nullable()->default(0);
            $table->boolean('coord_send')->nullable()->default(0);
            $table->boolean('coord_print')->nullable()->default(0);


            $table->boolean('cuadrilla')->nullable()->default(0);
            $table->boolean('cua_print')->nullable()->default(0);
            $table->boolean('cua_create')->nullable()->default(0);
            $table->boolean('cua_read')->nullable()->default(0);
            $table->boolean('cua_update')->nullable()->default(0);
            $table->boolean('cua_delete')->nullable()->default(0);
            $table->boolean('cua_finish')->nullable()->default(0);

            $table->boolean('configuracion')->nullable()->default(0);
            $table->boolean('conf_create')->nullable()->default(0);
            $table->boolean('conf_modify')->nullable()->default(0);
            $table->boolean('conf_show')->nullable()->default(0);
            $table->boolean('conf_rehability')->nullable()->default(0);
            $table->boolean('conf_deshability')->nullable()->default(0);
            $table->boolean('conf_access_pre')->nullable()->default(0);
            $table->boolean('conf_charge_pre')->nullable()->default(0);
            $table->boolean('conf_modify_pre')->nullable()->default(0);
            $table->boolean('conf_del_pre')->nullable()->default(0);
            $table->boolean('conf_hab_pol')->nullable()->default(0);
            $table->boolean('conf_con_pol')->nullable()->default(0);
            $table->boolean('conf_mod_pol')->nullable()->default(0);
            $table->boolean('conf_masterk')->nullable()->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');

        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('lastname',100);
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string('nombre_imagen', 100);
            $table->rememberToken();
            $table->timestamps();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');

            $table->unsignedBigInteger('permisos_id');
            $table->foreign('permisos_id')->references('id')->on('permisos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('permisos');
        Schema::dropIfExists('configuracion');
    }
}
