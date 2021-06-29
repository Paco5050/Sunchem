<?php


namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\Http\Response\ResponseDefault;
use App\Models;

class Profesion extends Controller
{
    public function Insert(Request $request){
        $profesion = new Models\Profesion();
        $profesion->nombre = mb_strtolower($request->json()->get('profesion'));
        $profesion->save();
        return ResponseDefault::getMessage(ResponseDefault::SUCCESS)->json();
    }
    public function All(){
        $profesiones = Models\Profesion::all();
        if(!$profesiones){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT);
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($profesiones);
        return $response;
    }
    public function Update(Response $response){
        $this->validate($response,[
            'id'=>'required',
            'nombre'=>'required'
        ]);
        $profesiones = Models\Profesion::query()
                        ->where('id',$response->json()->get('id'))
                        ->first();
        $profesiones->nombre = strtolower($response->json()->get('nombre'));
        $profesiones->save();
        return ResponseDefault::getMessage(ResponseDefault::SUCCESS)->json();
    }
}
