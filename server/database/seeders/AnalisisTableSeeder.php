<?php

namespace Database\Seeders;

use App\Models\Analisis;
use Illuminate\Database\Seeder;

class AnalisisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analisis = new Analisis();
        $analisis->solucion = 'se llegó a la conclusión de que la mejor solución era buscar otra marca';
        $analisis->propuestas_id = 2;
        $analisis->empleados_id = 1;
        $analisis->save();

        $analisis = new Analisis();
        $analisis->solucion = 'se llegó a la conclusión de que la mejor solución era capacitar al personal';
        $analisis->propuestas_id = 4;
        $analisis->empleados_id = 2;
        $analisis->save();
    }
}
