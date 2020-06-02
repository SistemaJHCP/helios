<?php

use Illuminate\Database\Seeder;
use App\Operador;

class operadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Operador::class, 12)->create();
    }
}
