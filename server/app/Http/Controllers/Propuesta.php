<?php


namespace App\Http\Controllers;

use App\Http\Response\ResponseDefault;
use App\Models;
use Illuminate\Http\Request;

class Propuesta extends Controller
{
    public function Insert(Request $request){
        $this->validate($request,[
            'propuesta'=>'required',
            'reclamos_id'=>'required',
        ]);
        $propuesta = new Models\Propuesta();
        $propuesta->propuesta = $request->json()->get('propuesta');
        $propuesta->estado = 0;
        $propuesta->reclamos_id = $request->json()->get('reclamos_id');
        $propuesta->empleados_id = $request->user()->id;
        $propuesta->save();
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($propuesta->id);
        return $response->json();
    }
    public function All(){
        $propuestas = Models\Propuesta::all();
        if(!$propuestas){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($propuestas);
        return $response->json();
    }
    public function ProposelOfClaim($id){
        $Propuestas = Models\Propuesta::query()
                    ->join('empleados','empleados.id','=','propuestas.empleados_id')
                    ->select(
                        'propuestas.id as IdPropuesta',
                        'empleados.nombre as NombreEmpleado',
                        'empleados.apellido as ApellidoEmpleado',
                        'empleados.documento_identidad as DocumentoIdentidadEmpleado',
                        'propuestas.reclamos_id as IdReclamos',
                        'propuestas.propuesta as propuesta'
                    )
                    ->where('reclamos_id',$id)
                    ->get();
        if(count($Propuestas)==0){
            return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT)->json();
        }
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($Propuestas);
        return $response->json();
    }
}
