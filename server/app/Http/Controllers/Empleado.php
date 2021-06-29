<?php


namespace App\Http\Controllers;
use App\Http\Response\ResponseDefault;
use App\Models;

class Empleado extends Controller
{
    public function All(){
        $empleados = Models\Empleado::all();
        if(!$empleados){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($empleados);
        return $response->json();
    }
}
