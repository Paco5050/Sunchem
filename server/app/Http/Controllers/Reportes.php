<?php


namespace App\Http\Controllers;

use App\Models;
use Dompdf\Dompdf;

class Reportes extends Controller
{
    public function Analisis($id)
    {
        $html   = __DIR__;
        $html   = explode('/',$html);
        $html   = array_slice($html,0,6);
        $html   = implode('/',$html);
        $html  .= '/resources/views/ReporteAnalisis.html';
        $html   = file_get_contents($html);

        $app = Models\Analisis::query()
            ->join('propuestas','propuestas.id','=','analisis.propuestas_id')
            ->join('empleados as empleado_analisis','empleado_analisis.id','=','analisis.empleados_id')
            ->join('empleados as empleado_propuestas','empleado_propuestas.id','=','propuestas.empleados_id')
            ->join('reclamos','reclamos.id','=','propuestas.reclamos_id')
            ->join('clientes','clientes.id','=','reclamos.clientes_id')
            ->select(
                'empleado_analisis.documento_identidad as DocumentoIdentidadEmpleadoAnalisis',
                'empleado_analisis.nombre as NombreEmpleadoAnalisis',
                'empleado_analisis.apellido as ApellidoEmpleadoAnalisis',
                'analisis.solucion as AnalisisSolucion',
                'empleado_propuestas.documento_identidad as DocumentoIdentidadEmpleadoPropuesta',
                'empleado_propuestas.nombre as NombreEmpleadoPropuesta',
                'empleado_propuestas.apellido as ApellidoEmpleadoPropuesta',
                'propuestas.propuesta as Propuesta',
                'analisis.created_at as FechaAnalisis',
                'reclamos.mensaje as ReclamoCliente',
                'clientes.nombre as NombreCliente',
                'analisis.id as IdAnalisis'
            )
            ->where('analisis.id','=',$id)
            ->where('propuestas.estado','=',true)
            ->first();

        $date  = date_create($app->FechaAnalisis);
        $date  = date_format($date, 'd-n-Y');
        $html = str_replace('{%fecha%}', $date,$html);
        $html = str_replace('{%fecha_descarga%}', date('d-m-Y'),$html);
        $html = str_replace('{%empleado_responsable%}',
            $app->NombreEmpleadoAnalisis .' ' . $app->ApellidoEmpleadoAnalisis
            ,$html);
        $html = str_replace('{%identificacion_responsable%}', $app->DocumentoIdentidadEmpleadoAnalisis,$html);
        $html = str_replace('{%empleado_propuesta%}', $app->NombreEmpleadoPropuesta . ' ' .$app->ApellidoEmpleadoPropuesta,$html);
        $html = str_replace('{%identificacion_responsable_propuesta%}', $app->DocumentoIdentidadEmpleadoPropuesta,$html);
        $html = str_replace('{%propuesta%}', $app->Propuesta,$html);
        $html = str_replace('{%resultado%}', $app->AnalisisSolucion,$html);
        $html = str_replace('{%reclamo%}', $app->ReclamoCliente,$html);
        $html = str_replace('{%cliente%}', $app->NombreCliente,$html);
        $html = str_replace('{%id%}', $app->IdAnalisis,$html);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A5', 'vertical');
        $dompdf->render();
        $dompdf->stream();

    }

}
