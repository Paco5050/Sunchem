<?php

namespace Database\Seeders;

use App\Models\EmpleadoProfesion;
use Illuminate\Database\Seeder;

class EmpleadoProfesionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app = new EmpleadoProfesion();
        $app->empleados_id=1;
        $app->profesiones_id = 1;
        $app->save();

        $app = new EmpleadoProfesion();
        $app->empleados_id = 2;
        $app->profesiones_id = 2;
        $app->save();
    }
}
