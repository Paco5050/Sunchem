<?php


namespace App\Http\Controllers;

use App\Http\Response\ResponseDefault;
use \Illuminate\Http\Request;
use App\Models\Usuario;

class Auth extends Controller
{
    function login(Request $request)
    {

        $this->validate($request, [
            'usuario' => 'required',
            'clave' => 'required'
        ]);

        $userName = $request->json()->get('usuario');
        $password = md5($request->json()->get('clave'));

        $app = Usuario::where('usuario', $userName)
            ->where('clave', $password)
            ->first();
        if (!$app)
            return ResponseDefault::getMessage(ResponseDefault::USER_NOT_FOUND)->json();

        $app->api_token = md5(time() . $userName . $password);
        $app->save();
        $response = ResponseDefault::getMessage(ResponseDefault::USER_FOUND);
        $response->setData([
            'id' => $app->id,
            'usuario' => $userName,
            'roles_id' => $app->roles_id,
            'api_token' => $app->api_token
        ]);
        return $response->json();
    }

    function logout(Request $request)
    {
        Usuario::where('api_token', $request->json()->get('api_token'))->update(['api_token' => null]);
        return ResponseDefault::getMessage(ResponseDefault::EXIT_SYSTEM)->json();
    }

}
