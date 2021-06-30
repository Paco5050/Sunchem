<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app = new Empleado();
        $app->documento_identidad = '123456789';
        $app->nombre = 'juan';
        $app->apellido = 'perez';
        $app->estado_empleado_id = '1';
        $app->usuario_id = 1;
        $app->direccion = 'avenida calle 1234b';
        $app->save();

        $app = new Empleado();
        $app->documento_identidad = '987654321';
        $app->nombre = 'carlos';
        $app->apellido = 'larrazabal';
        $app->estado_empleado_id = '1';
        $app->usuario_id = 2;
        $app->direccion = 'avenida calle 33A-1-16';
        $app->save();
    }
}
