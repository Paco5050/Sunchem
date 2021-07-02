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
    public function All()
    {
        try{
            $reclamo = Models\Reclamo::query()
                ->join('clientes','clientes.id','=','reclamos.clientes_id')
                ->join('tipos_reclamos','tipos_reclamos.id','=','reclamos.tipos_reclamos_id')
                ->select(
                    'reclamos.id as IdReclamo',
                    'reclamos.created_at as FechaReclamo',
                    'tipos_reclamos.nombre as TipoReclamo',
                    'clientes.nombre as NombreCliente',
                    'reclamos.mensaje as DescripcionReclamo'
                )
                ->where('reclamos.estado','=',false)
                ->get();

            if (count($reclamo) == 0) {
                return ResponseDefault::getMessage(ResponseDefault::NOT_REGEDIT);
            }
            $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
            $response->setData($reclamo);
            return $response->json();

        }catch (\Exception $err){
            $response = ResponseDefault::getMessage(ResponseDefault::ERROR);
            $response->setData($err);
            return $response->json();
        }
    }
    public function TypesOfClaims()
    {
        $TiposReclamos = Models\TiposReclamo::all();
        $response = ResponseDefault::getMessage(ResponseDefault::SUCCESS);
        $response->setData($TiposReclamos);
        return $response->json();
    }
}
