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

        $analisis = Models\Analisis::query()
            ->join('propuestas','analisis.propuestas_id', '=', 'propuestas.id')
            ->join('reclamos','reclamos.id','=','propuestas.reclamos_id')
            ->select(
                'analisis.id as analisis_id',
                'analisis.solucion as analisis',
                'analisis.created_at as analisis_fecha',
                'propuestas.id as propuesta_id',
                'propuestas.propuesta as propuesta',
                'propuestas.created_at as propuestas_fecha',
                'reclamos.id as reclamos_id',
                'reclamos.mensaje as reclamo',
                'reclamos.created_at as reclamos_fecha'
            )->where('propuestas.estado',true)->get();

            if(count($analisis) == 0){
                return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
            }
            $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
            $response->setData($analisis);
            return $response->json();
    }
}
