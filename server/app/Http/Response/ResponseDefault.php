<?php

namespace App\Http\Response;

class ResponseDefault
{
    const NOT_REGEDIT = 'sin registros';
    const SUCCESS = 'Proceso exitoso';
    const USER_FOUND = 'Bienvenido';
    const EXIT_SYSTEM = 'ha salido';
    const SUCCESS_CLAIM = 'Su reclamo ha sido efectuado';
    const USER_IN_USE = 'usuario en uso';
    const EMAIL_IN_USE = 'correo en uso';
    const EMPLOYEE_HIRED = 'el empleado está contratado';
    //error
    const ERROR = 'Ha ocurrido un problema';
    const USER_NOT_FOUND = 'usuario no identificado';
    public static function getMessage($code){
        switch ($code){
            // success
            case ResponseDefault::EMPLOYEE_HIRED:
                return new Response(2,ResponseDefault::EMPLOYEE_HIRED,200);
            case ResponseDefault::EMAIL_IN_USE:
                return new Response(2,ResponseDefault::EMAIL_IN_USE,200);
            case ResponseDefault::USER_IN_USE:
                return new Response(2,ResponseDefault::USER_IN_USE,200);
            case ResponseDefault::NOT_REGEDIT:
                return new Response(0,ResponseDefault::NOT_REGEDIT,200);
            case ResponseDefault::SUCCESS:
                return new Response(1,ResponseDefault::SUCCESS,200);
            case ResponseDefault::USER_FOUND:
                return new Response(1,ResponseDefault::USER_FOUND,200);
            case ResponseDefault::EXIT_SYSTEM:
                return new Response(1, ResponseDefault::EXIT_SYSTEM,200);
            case ResponseDefault::SUCCESS_CLAIM:
                return new Response(1,ResponseDefault::SUCCESS_CLAIM,200);
            // error
            case ResponseDefault::ERROR:
                return new Response(-1,ResponseDefault::ERROR,400);
            case ResponseDefault::USER_NOT_FOUND:
                return new Response(-1,ResponseDefault::USER_NOT_FOUND,401);
        }
    }

}
