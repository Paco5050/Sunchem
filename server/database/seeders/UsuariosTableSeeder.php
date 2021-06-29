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
        $user->usuario = 'admin';
        $user->clave   = 'admin';
        $user->roles_id = 1;
        $user->save();

        $mail = new Correo();
        $mail->correo = 'admin@gmail.com';
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
        // other user
        $user = new Usuario();
        $user->usuario = 'trabajador';
        $user->clave   = 'trabajador';
        $user->roles_id = 2;
        $user->save();

        $mail = new Correo();
        $mail->correo = 'trabajador@gmail.com';
        $mail->usuarios_id = $user->id;
        $mail->save();

        $question = new Pregunta();
        $question->pregunta = 'color favorito';
        $question->respuesta = 'blanco';
        $question->usuarios_id = $user->id;
        $question->save();

        $question = new Pregunta();
        $question->pregunta = 'primer carro';
        $question->respuesta = 'chevrolet';
        $question->usuarios_id = $user->id;
        $question->save();

    }
}
