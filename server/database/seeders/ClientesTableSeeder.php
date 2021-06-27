<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Cliente();
        $client->nombre = 'fernando';
        $client->direccion = 'av22 salvador';
        $client->correo='alvaresz@gmail.com';
        $client->save();

        $client = new Cliente();
        $client->nombre = 'jean';
        $client->direccion = 'ac44-1-1 salvador';
        $client->correo='jean@gmail.com';
        $client->save();
    }
}
