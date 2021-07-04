<?php


namespace App\Http\Controllers;
use App\Http\Response\ResponseDefault;
use App\Models;

class Empleado extends Controller
{
    public function All(){
        try {
            $empleados = Models\Empleado::query()
                ->join(
                    'empleados_profesiones',
                    'empleados_profesiones.empleados_id',
                    '=',
                    'empleados.id'
                )
                ->join(
                    'profesiones',
                    'profesiones.id',
                    '=',
                    'empleados_profesiones.profesiones_id'
                )
                ->join(
                    'correos',
                    'correos.usuarios_id',
                    '=',
                    'empleados.usuario_id'
                )
                ->join(
                    'estado_empleado',
                    'estado_empleado.id',
                    '=',
                    'empleados.estado_empleado_id'
                )
                ->join(
                    'usuarios',
                    'usuarios.id',
                    '=',
                    'empleados.usuario_id'
                )
                ->join(
                    'roles',
                    'roles.id',
                    '=',
                    'usuarios.roles_id'
                )
                ->select(
                    'usuarios.id as IdUsuario',
                    'empleados.id as IdEmpleado',
                    'empleados.documento_identidad as IdentidadEmpleado',
                    'empleados.nombre as NombreEmpleado',
                    'empleados.apellido as ApellidoEmpleado',
                    'correos.correo as CorreoEmpleado',
                    'empleados.direccion as DireccionEmpleado',
                    'estado_empleado.nombre as EstadoEmpleado',
                    'profesiones.nombre as ProfesionEmpleado',
                    'roles.nombre as RolEmpleado',
                    'roles.id as IdRolEmpleado',
                    'empleados_profesiones.profesiones_id as IdProfesion'
                )
                ->where('empleados.estado_empleado_id','=','1')
                ->where('empleados.nombre','!=','root')
                ->get();
            if(count($empleados) == 0){
                return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
            }
            $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
            $response->setData($empleados);
            return $response->json();
        }catch (\Error $err){
            return ResponseDefault::getMessage(ResponseDefault::ERROR)->json();
        }
    }
}
