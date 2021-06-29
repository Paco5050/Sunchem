<?php


namespace App\Http\Controllers;


use App\Http\Response\ResponseDefault;
use Illuminate\Http\Request;
use App\Models;

class Reclamo extends Controller
{
    public function Insert(Request $request){
        $this->validate($request,[
            'tipos_reclamos_id' => 'required',
            'clientes_id' => 'required',
            'mensaje' => 'required',
        ]);
        try {
            $reclamo = new Models\Reclamo();
            $reclamo->tipos_reclamos_id = $request->json()->get('tipos_reclamos_id');
            $reclamo->clientes_id       = $request->json()->get('clientes_id');
            $reclamo->mensaje           = $request->json()->get('mensaje');
            $reclamo->save();
            $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS_CLAIM);
            $response->setData($reclamo->id);
            return $response->json();
        }catch (\Exception $err){
            return ResponseDefault::getMessage(ResponseDefault::ERROR)->json();
        }
    }
    public function All(){
        $reclamo = Models\Reclamo::all();
        if(!$reclamo){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT);
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($reclamo);
        return $response;
    }
}
