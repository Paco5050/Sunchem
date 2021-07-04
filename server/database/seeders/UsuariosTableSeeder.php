<?php

namespace Database\Seeders;

use App\Models\Correo;
use App\Models\Pregunta;
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
        $user = new Usuario();
        $user->usuario = 'root';
        $user->clave   = 'root';
        $user->roles_id = 3;
        $user->save();

        $mail = new Correo();
        $mail->correo = 'root@root.com';
        $mail->usuarios_id = $user->id;
        $mail->save();

        $question = new Pregunta();
        $question->pregunta = 'color favorito';
        $question->respuesta = 'negro';
        $question->usuarios_id = $user->id;
        $question->save();

        $question = new Pregunta();
        $question->pregunta = 'primer carro';
        $question->respuesta = 'ford';
        $question->usuarios_id = $user->id;
        $question->save();

    }
}
