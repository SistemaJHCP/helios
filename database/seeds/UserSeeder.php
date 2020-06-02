<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            'nombre_permisos'   => 'Administrador',
            'operador'      	=> '1',
            'ope_create'      	=> '1',
            'ope_read'      	=> '1',
            'ope_update'      	=> '1',
            'ope_delete'      	=> '1',
            'ope_permiso'      	=> '1',
            'ope_cerrar'      	=> '1',
            'coordinador'      	=> '1',
            'coord_listado'     => '1',
            'coord_selection'   => '1',
            'coord_consult'     => '1',
            'coord_update'      => '1',
            'coord_send'      	=> '1',
            'coord_print'      	=> '1',
            'cuadrilla'      	=> '1',
            'cua_print'      	=> '1',
            'cua_create'      	=> '1',
            'cua_read'      	=> '1',
            'cua_update'      	=> '1',
            'cua_delete'      	=> '1',
            'cua_finish'      	=> '1',
            'configuracion'     => '1',
            'conf_create'      	=> '1',
            'conf_modify'      	=> '1',
            'conf_show'      	=> '1',
            'conf_rehability'   => '1',
            'conf_deshability'  => '1',
            'conf_access_pre'   => '1',
            'conf_charge_pre'   => '1',
            'conf_modify_pre'   => '1',
            'conf_del_pre'      => '1',
            'conf_hab_pol'      => '1',
            'conf_con_pol'      => '1',
            'conf_mod_pol'      => '1',
            'conf_masterk'      => '1',
            'estado'      	    => 'activo'
        ]);

        DB::table('permisos')->insert([
            'nombre_permisos'   => 'Operador',
            'operador'      	=> '1',
            'ope_create'      	=> '1',
            'ope_read'      	=> '1',
            'ope_update'      	=> '1',
            'ope_delete'      	=> '1',
            'ope_permiso'      	=> '1',
            'ope_cerrar'      	=> '1',
            'coordinador'      	=> '0',
            'coord_listado'     => '0',
            'coord_selection'   => '0',
            'coord_consult'     => '0',
            'coord_update'      => '0',
            'coord_send'      	=> '0',
            'coord_print'      	=> '0',
            'cuadrilla'      	=> '0',
            'cua_print'      	=> '0',
            'cua_create'      	=> '0',
            'cua_read'      	=> '0',
            'cua_update'      	=> '0',
            'cua_delete'      	=> '0',
            'cua_finish'      	=> '0',
            'configuracion'     => '0',
            'conf_create'      	=> '0',
            'conf_modify'      	=> '0',
            'conf_show'      	=> '0',
            'conf_rehability'   => '0',
            'conf_deshability'  => '0',
            'conf_access_pre'   => '0',
            'conf_charge_pre'   => '0',
            'conf_modify_pre'   => '0',
            'conf_del_pre'      => '0',
            'conf_hab_pol'      => '0',
            'conf_con_pol'      => '0',
            'conf_mod_pol'      => '0',
            'conf_masterk'      => '0',
            'estado'      	    => 'activo'
        ]);

        DB::table('permisos')->insert([
            'nombre_permisos'   => 'Coordinador',
            'operador'      	=> '0',
            'ope_create'      	=> '0',
            'ope_read'      	=> '0',
            'ope_update'      	=> '0',
            'ope_delete'      	=> '0',
            'ope_permiso'      	=> '0',
            'ope_cerrar'      	=> '0',
            'coordinador'      	=> '1',
            'coord_listado'     => '1',
            'coord_selection'   => '1',
            'coord_consult'     => '1',
            'coord_update'      => '1',
            'coord_send'      	=> '1',
            'coord_print'      	=> '1',
            'cuadrilla'      	=> '0',
            'cua_print'      	=> '0',
            'cua_create'      	=> '0',
            'cua_read'      	=> '0',
            'cua_update'      	=> '0',
            'cua_delete'      	=> '0',
            'cua_finish'      	=> '0',
            'configuracion'     => '0',
            'conf_create'      	=> '0',
            'conf_modify'      	=> '0',
            'conf_show'      	=> '0',
            'conf_rehability'   => '0',
            'conf_deshability'  => '0',
            'conf_access_pre'   => '0',
            'conf_charge_pre'   => '0',
            'conf_modify_pre'   => '0',
            'conf_del_pre'      => '0',
            'conf_hab_pol'      => '0',
            'conf_con_pol'      => '0',
            'conf_mod_pol'      => '0',
            'conf_masterk'      => '0',
            'estado'      	    => 'activo'
        ]);

        DB::table('permisos')->insert([
            'nombre_permisos'   => 'Lider de cuadrilla',
            'operador'      	=> '0',
            'ope_create'      	=> '0',
            'ope_read'      	=> '0',
            'ope_update'      	=> '0',
            'ope_delete'      	=> '0',
            'ope_permiso'      	=> '0',
            'ope_cerrar'      	=> '0',
            'coordinador'      	=> '0',
            'coord_listado'     => '0',
            'coord_selection'   => '0',
            'coord_consult'     => '0',
            'coord_update'      => '0',
            'coord_send'      	=> '0',
            'coord_print'      	=> '0',
            'cuadrilla'      	=> '1',
            'cua_print'      	=> '1',
            'cua_create'      	=> '1',
            'cua_read'      	=> '1',
            'cua_update'      	=> '1',
            'cua_delete'      	=> '1',
            'cua_finish'      	=> '1',
            'configuracion'     => '0',
            'conf_create'      	=> '0',
            'conf_modify'      	=> '0',
            'conf_show'      	=> '0',
            'conf_rehability'   => '0',
            'conf_deshability'  => '0',
            'conf_access_pre'   => '0',
            'conf_charge_pre'   => '0',
            'conf_modify_pre'   => '0',
            'conf_del_pre'      => '0',
            'conf_hab_pol'      => '0',
            'conf_con_pol'      => '0',
            'conf_mod_pol'      => '0',
            'conf_masterk'      => '0',
            'estado'      	    => 'activo'
        ]);

        DB::table('users')->insert([
            'name'      	=> 'admin',
            'lastname'  	=> 'principal',
            'email'     	=> 'admin@admin',
            'email_verified_at' => now(),
            'password' => bcrypt("admin"), // password
            'remember_token' => Str::random(10),
            'estado' => 'activo',
            'permisos_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
            'nombre_imagen' => 'imagenes/sistemas/user.png',
        ]);

        DB::table('users')->insert([
            'name'      	=> 'operador',
            'lastname'  	=> 'operador',
            'email'     	=> 'operador@operador',
            'email_verified_at' => now(),
            'password' => bcrypt("123456"), // password
            'remember_token' => Str::random(10),
            'estado' => 'activo',
            'permisos_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
            'nombre_imagen' => 'imagenes/sistemas/user.png',
        ]);

        DB::table('users')->insert([
            'name'      	=> 'coord',
            'lastname'  	=> 'coordinador',
            'email'     	=> 'coord@coord',
            'email_verified_at' => now(),
            'password' => bcrypt("123456"), // password
            'remember_token' => Str::random(10),
            'estado' => 'activo',
            'permisos_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
            'nombre_imagen' => 'imagenes/sistemas/user.png',
        ]);

        DB::table('users')->insert([
            'name'      	=> 'lider',
            'lastname'  	=> 'cuadrilla',
            'email'     	=> 'lider@lider',
            'email_verified_at' => now(),
            'password' => bcrypt("123456"), // password
            'remember_token' => Str::random(10),
            'estado' => 'activo',
            'permisos_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
            'nombre_imagen' => 'imagenes/sistemas/user.png',
        ]);

        factory(User::class, 9)->create();
    }
}
