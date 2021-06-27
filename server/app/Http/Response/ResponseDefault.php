<?php


namespace App\Http\Response;

class ResponseDefault
{
    const SUCCESS = 'Proceso exitoso';
    const USER_FOUND = 'Bienvenido';
    const EXIT_SYSTEM = 'ha salido';
    //error
    const ERROR = 'Ha ocurrido un problema';
    const USER_NOT_FOUND = 'usuario no identificado';

    public static function getMessage($code){
        switch ($code){
            // success
            case ResponseDefault::SUCCESS:
                return new Response(1,ResponseDefault::SUCCESS,200);
            case ResponseDefault::USER_FOUND:
                return new Response(1,ResponseDefault::USER_FOUND,200);
            case ResponseDefault::EXIT_SYSTEM:
                return new Response(1, ResponseDefault::EXIT_SYSTEM,200);
            // error
            case ResponseDefault::ERROR:
                return new Response(-1,ResponseDefault::ERROR,400);
            case ResponseDefault::USER_NOT_FOUND:
                return new Response(-1,ResponseDefault::USER_NOT_FOUND,401);
        }
    }

}
