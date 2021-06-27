<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $app = new Role();
        $app->nombre = 'administrador';
        $app->save();
        
        $app = new Role();
        $app->nombre = 'básico';
        $app->save();
    }
}
