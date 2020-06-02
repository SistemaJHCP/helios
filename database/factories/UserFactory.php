<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Operador;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'nombre_imagen' => 'imagenes/sistemas/user.png',
        'estado' => 'activo',
        'permisos_id' => '1',
    ];
});



$factory->define(Operador::class, function (Faker $faker) {
    $randonce = rand(10000000000, 99999999999);
    $randocho = rand(10000000, 99999999);
    return [
        'correctivo' => $randocho,
        'orden' => $faker->name,
        'fecha' => now(),
        'fecha_fin' => now(),
        'sintoma' => $faker->name,
        'prioridad' => 'normal',
        'siniestro' => 'no',
        'motivo' => $faker->name,
        'descripcion' => $faker->address,
        'usuario' => $faker->lastname,
        'telefono' => $randonce,
        'u_tecnica' => $faker->name,
        'inmueble' => $faker->name,
        'planta' => 'alta',
        'oficina' => '0000',
        'ceco' => $faker->name,
        'emplazamiento' => $faker->name,
        'coordinador_bbva' => $faker->name,
        'coordinador_jhcp_id' => '1',
        'operador_creador_id' => '1',
    ];
});


//'' => ,

