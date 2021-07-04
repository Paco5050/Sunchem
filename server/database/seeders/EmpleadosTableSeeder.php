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
        $app->nombre = 'root';
        $app->apellido = 'root';
        $app->estado_empleado_id = '1';
        $app->usuario_id = 1;
        $app->direccion = 'avenida calle 1234b';
        $app->save();

    }
}
