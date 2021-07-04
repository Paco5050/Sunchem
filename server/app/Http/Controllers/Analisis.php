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

            $reclamo = Models\Reclamo::query()->where('id',$propuesta->reclamos_id)->first();
            $reclamo->estado = true;
            $reclamo->save();

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
            ->join('clientes','clientes.id','=','reclamos.clientes_id')
            ->join('empleados','empleados.id','=','analisis.empleados_id')
            ->select(
                'analisis.id as IdAnalisis',
                'analisis.solucion as SolucionAnalisis',
                'analisis.created_at as FechaAnalisis',
                'propuestas.id as PropuestaId',
                'propuestas.propuesta as MensajePropuesta',
                'reclamos.id as IdReclamo',
                'reclamos.mensaje as MensajeReclamo',
                'clientes.nombre as NombreCliente',
                'empleados.nombre as NombreEmpleado',
                'empleados.apellido as ApellidoEmpleado'
            )->where('propuestas.estado',true)->get();

            if(count($analisis) == 0){
                return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
            }
            $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
            $response->setData($analisis);
            return $response->json();
    }
}
