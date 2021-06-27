<?php

namespace Database\Seeders;

use App\Models\Reclamo;
use Illuminate\Database\Seeder;

class ReclamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reclamo = new Reclamo();
        $reclamo->mensaje = 'este producto es de mala calidad';
        $reclamo->tipos_reclamos_id = 2;
        $reclamo->clientes_id = '1';
        $reclamo->save();

        $reclamo = new Reclamo();
        $reclamo->mensaje = 'este servicio no satisface mis necesidades';
        $reclamo->tipos_reclamos_id = 1;
        $reclamo->clientes_id = 2;
        $reclamo->save();
    }
}
