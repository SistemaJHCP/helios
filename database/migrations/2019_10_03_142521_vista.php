<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Vista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW permiso_operador AS  select `users`.`id` as `id`, `users`.`name` as `name`, `users`.`lastname` as `lastname`, `permisos`.`nombre_permisos` as `nombre_permisos` from `users` inner join `permisos` on `permisos`.`id` = `users`.`permisos_id` where `users`.`estado` = 'activo' and `permisos`.`operador` = 1");
        DB::statement("CREATE OR REPLACE VIEW permiso_coordinador AS select `users`.`id` as `id`, `users`.`name` as `name`, `users`.`lastname` as `lastname`, `permisos`.`nombre_permisos` as `nombre_permisos`,`permisos`.`coord_listado` as `acceso_coord` from `users` inner join `permisos` on `permisos`.`id` = `users`.`permisos_id` where `users`.`estado` = 'activo' and `permisos`.`coordinador` = 1");
        DB::statement("CREATE OR REPLACE VIEW permiso_lider AS select `users`.`id` as `id`, `users`.`name` as `name`, `users`.`lastname` as `lastname`, `permisos`.`nombre_permisos` as `nombre_permisos` from `users` inner join `permisos` on `permisos`.`id` = `users`.`permisos_id` where `users`.`estado` = 'activo' and `permisos`.`cuadrilla` = 1");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_lider');
        Schema::dropIfExists('permiso_coordinador');
        Schema::dropIfExists('permiso_operador');
    }
}
