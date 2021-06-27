<?php

namespace Database\Seeders;

use App\Models\Profesion;
use Illuminate\Database\Seeder;

class ProfesionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app = new Profesion();
        $app->nombre = 'contador';
        $app->save();

        $app = new Profesion();
        $app->nombre = 'administrador de empresa';
        $app->save();
    }
}
