<?php

namespace Database\Seeders;

use App\Models\Propuesta;
use Illuminate\Database\Seeder;

class PropuestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propuesta = new Propuesta();
        $propuesta->propuesta = 'cambiar de proveedor';
        $propuesta->estado = 0;
        $propuesta->reclamos_id = 1;
        $propuesta->empleados_id = 1;
        $propuesta->save();

        $propuesta = new Propuesta();
        $propuesta->propuesta = 'buscar otra marca';
        $propuesta->estado = 1;
        $propuesta->reclamos_id = 1;
        $propuesta->empleados_id = 1;
        $propuesta->save();

        $propuesta = new Propuesta();
        $propuesta->propuesta = 'dejar de ofrecer el servicio';
        $propuesta->estado = 0;
        $propuesta->reclamos_id = 2;
        $propuesta->empleados_id = 2;
        $propuesta->save();

        $propuesta = new Propuesta();
        $propuesta->propuesta = 'capacitar al personal';
        $propuesta->estado = 1;
        $propuesta->reclamos_id = 2;
        $propuesta->empleados_id = 2;
        $propuesta->save();
    }
}
