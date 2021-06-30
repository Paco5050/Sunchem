<?php


namespace App\Http\Controllers;


use App\Http\Response\ResponseDefault;
use \Illuminate\Http\Request;
use App\Models;

class Cliente extends Controller
{
    public function Insert(Request $request){
        $this->validate($request,[
            'nombre'=>'required',
            'direccion'=>'required',
            'correo' =>'required'
        ]);

        $correo = strtolower($request->json()->get('correo'));
        $cliente = Models\Cliente::query()
                    ->where('correo',$correo)
                    ->first();

        if($cliente){
            return ResponseDefault::getMessage(ResponseDefault::EMAIL_IN_USE)->json();
        }
        $cliente            = new Models\Cliente();
        $cliente->nombre    = $request->json()->get('nombre');
        $cliente->direccion = $request->json()->get('direccion');
        $cliente->correo    = $correo;
        $cliente->save();

        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($cliente->id);
        return $response->json();
    }
    public function UpdateDirection(Request $request){
        $this->validate($request,[
            'id' => 'required',
            'direccion' => 'required'
        ]);
        $cliente = Models\Cliente::query()
            ->where('id',$request->json()->get('id'))->first();

        $cliente->direccion = $request->json()->get('direccion');
        $cliente->save();
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($cliente->id);
        return $response->json();
    }
}

