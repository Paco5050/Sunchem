<?php


namespace App\Http\Controllers;

use App\Http\Response\ResponseDefault;
use Illuminate\Http\Request;
use App\Models;
class Analisis extends Controller
{
    public function Insert(Request $request){

        $this->validate($request,[
            'solucion'=>'required',
            'propuestas_id'=>'required',
        ]);
        try {
            $analisis = new Models\Analisis();
            $analisis->solucion = $request->json()->get('solucion');
            $analisis->propuestas_id = strtolower($request->json()->get('propuestas_id'));
            $analisis->empleados_id = $request->user()->id;
            $analisis->save();

            $propuesta = Models\Propuesta::query()
                ->where('id',$request->json()->get('propuestas_id'))
                ->first();
            $propuesta->estado = 1;
            $propuesta->save();

            $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
            $response->setData($analisis->id);
            return $response->json();
        }catch (\Exception $err){
            return ResponseDefault::getMessage(ResponseDefault::ERROR)->json();
        }
    }
    public function All(){
        $analisis = Models\Analisis::all();
        if(!$analisis){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($analisis);
        return $response->json();
    }
}
