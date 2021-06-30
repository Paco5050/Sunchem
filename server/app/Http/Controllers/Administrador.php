<?php


namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Http\Response\ResponseDefault;
use App\Models;
use Prophecy\Exception\Exception;

class Administrador extends Controller
{
    public function HireEmployee(Request $request)
    {

        $this->validate($request, [
            'usuario' => 'required',
            'clave' => 'required',
            'correo' => 'required',
            'pregunta' => 'required',
            'respuesta' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'profesion_id' => 'required',
            'documento_identidad' => 'required'
        ]);

        $usuario = $this->CheckUser($request);
        if ($usuario)
            return $usuario;

        $correo = $this->CheckEmail($request);
        if ($correo)
            return $correo;

        $empleado = $this->CheckEmployee($request);
        if ($empleado)
            return $empleado;

        try {
            $usuario = new Models\Usuario();
            $usuario->usuario = strtolower($request->json()->get('usuario'));
            $usuario->clave = $request->json()->get('clave');
            $usuario->roles_id = 2;
            $usuario->save();

            $correo = new Models\Correo();
            $correo->correo = strtolower($request->json()->get('correo'));
            $correo->usuarios_id = $usuario->id;
            $correo->save();

            $pregunta = new Models\Pregunta();
            $pregunta->pregunta = strtolower($request->json()->get('pregunta'));
            $pregunta->respuesta = strtolower($request->json()->get('respuesta'));
            $pregunta->usuarios_id = $usuario->id;
            $pregunta->save();

            $empleado = new Models\Empleado();
            $empleado->documento_identidad = $request->json()->get('documento_identidad');
            $empleado->nombre = strtolower($request->json()->get('nombre'));
            $empleado->apellido = strtolower($request->json()->get('apellido'));
            $empleado->estado_empleado_id = '1';
            $empleado->usuario_id = $usuario->id;
            $empleado->direccion = strtolower($request->json()->get('direccion'));
            $empleado->save();

            $empleadoProfesion = new Models\EmpleadoProfesion();
            $empleadoProfesion->empleados_id = $empleado->id;
            $empleadoProfesion->profesiones_id = $request->json()->get('profesion_id');
            $empleadoProfesion->save();

            return ResponseDefault::getMessage(ResponseDefault::SUCCESS)->json();

        } catch (\Exception $err) {
            return ResponseDefault::getMessage(ResponseDefault::ERROR)->json();
        }

    }

    public function CheckEmail(Request $request)
    {
        $this->validate($request,[
            'correo' => 'required'
        ]);
        $correo = Models\Correo::query()
                    ->where('correo', strtolower($request->json()->get('correo')))
                    ->first();
        if ($correo) {
            return ResponseDefault::getMessage(ResponseDefault::EMAIL_IN_USE)->json();
        }
        return false;
    }

    public function CheckUser(Request $request)
    {
        $this->validate($request,[
            'usuario' => 'required'
        ]);
        $usuario = Models\Usuario::query()
                    ->where('usuario', strtolower($request->json()->get('usuario')))
                    ->first();
        if ($usuario) {
            return ResponseDefault::getMessage(ResponseDefault::USER_IN_USE)->json();
        }
        return false;
    }

    public function CheckEmployee(Request $request)
    {
        $empleado = Models\Empleado::query()
                    ->where('documento_identidad', $request->json()->get('documento_identidad'))
                    ->first();
        if ($empleado) {
            $response = ResponseDefault::getMessage(ResponseDefault::EMPLOYEE_HIRED);
            $response->setData($empleado);
            return $response->json();
        }
        return false;
    }

    public function UpdateEmployee(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'documento_identidad' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'estado_empleado_id' => 'required',
            'correo' => 'required',
        ]);
        try {
            $empleado = Models\Empleado::query()
                        ->where('id', $request->json()->get('id'))->first();

            $empleado->documento_identidad = $request->json()->get('documento_identidad');
            $empleado->nombre = strtolower($request->json()->get('nombre'));
            $empleado->apellido = strtolower($request->json()->get('apellido'));
            $empleado->estado_empleado_id = $request->json()->get('estado_empleado_id');
            $empleado->direccion = strtolower($request->json()->get('direccion'));
            $empleado->save();

            $correo = Models\Correo::query()
                        ->where('usuarios_id', $empleado->usuario_id)
                        ->first();
            $correo->correo = strtolower($request->json()->get('correo'));
            $correo->save();

            return ResponseDefault::getMessage(ResponseDefault::SUCCESS)->json();
        } catch (\Exception $err) {
            $response  = ResponseDefault::getMessage(ResponseDefault::ERROR);
            $response->setData($err);
            return $response->json();
        }
    }

    public function LayOffStaff($id)
    {
        try {

            $empleado = Models\Empleado::query()
                ->where('id', $id)
                ->where('estado_empleado_id', 1)
                ->first();
            if (!$empleado) {
                return ResponseDefault::getMessage(ResponseDefault::ERROR)->json();
            }

            $empleado->estado_empleado_id = 2;
            $empleado->save();
            return ResponseDefault::getMessage(ResponseDefault::SUCCESS)->json();
        }catch (\Exception $err){
            var_dump($err);
        }
    }
}
