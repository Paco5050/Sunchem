<?php

namespace Database\Seeders;

use App\Models\TiposReclamo;
use Illuminate\Database\Seeder;

class TiposReclamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app = new TiposReclamo();
        $app->nombre = 'servicio';
        $app->save();

        $app = new TiposReclamo();
        $app->nombre = 'producto';
        $app->save();
    }
}
