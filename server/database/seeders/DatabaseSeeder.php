<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(TiposReclamosTableSeeder::class);
        $this->call(ProfesionesTableSeeder::class);
        $this->call(EstadoEmpleadoTableSeeder::class);

        // ----
        $this->call(UsuariosTableSeeder::class);
        $this->call(EmpleadosTableSeeder::class);

        $this->call(ClientesTableSeeder::class);
        $this->call(ReclamosTableSeeder::class);
        $this->call(PropuestasTableSeeder::class);
        $this->call(AnalisisTableSeeder::class);

        $this->call(EmpleadoProfesionTableSeeder::class);
    }
}
