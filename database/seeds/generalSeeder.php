<?php

use Illuminate\Database\Seeder;
use App\General;

class generalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general')->insert([
            'clave_general' => 'jhcp2019',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
