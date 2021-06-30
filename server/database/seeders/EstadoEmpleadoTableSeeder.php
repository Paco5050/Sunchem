<?php

namespace Database\Seeders;

use App\Models\EstadoEmpleado;
use Illuminate\Database\Seeder;

class EstadoEmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $app = new EstadoEmpleado();
        $app->nombre = 'contratado';
        $app->save();

        $app = new EstadoEmpleado();
        $app->nombre = 'despedido';
        $app->save();

    }
}
