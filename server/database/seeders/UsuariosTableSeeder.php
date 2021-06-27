<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app = new Usuario();
        $app->usuario = 'admin';
        $app->clave   = 'admin';
        $app->roles_id = 1;

        $app->save();
    }
}
