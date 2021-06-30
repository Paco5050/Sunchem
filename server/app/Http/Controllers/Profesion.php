<?php


namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\Http\Response\ResponseDefault;
use App\Models;

class Profesion extends Controller
{
    public function Insert(Request $request){
        $this->validate($request,[
            'profesion'=>'required'
        ]);
        $profesion = new Models\Profesion();
        $profesion->nombre = mb_strtolower($request->json()->get('profesion'));
        $profesion->save();
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($profesion->id);
        return $response->json();
    }
    public function All(){
        $profesiones = Models\Profesion::all();
        if(!$profesiones){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($profesiones);
        return $response->json();
    }
    public function Update(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'profesion'=>'required'
        ]);
        try {
            $profesiones = Models\Profesion::query()
                ->where('id',$request->json()->get('id'))
                ->first();
            $profesiones->nombre = strtolower($request->json()->get('profesion'));
            $profesiones->save();
            return ResponseDefault::getMessage(ResponseDefault::SUCCESS)->json();

        }catch (\Exception $err){
            $response = ResponseDefault::getMessage(ResponseDefault::ERROR);
            $response->setData($err);
            return $response->json();
        }
    }
}
