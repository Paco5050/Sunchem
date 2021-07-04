<?php

include '../const/index.php';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => MAIN_ROUTE . 'Analisis',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => '
    {
        "api_token": "'.$_GET['api_token'].'"

    }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$response = json_decode($response,true);
if(isset($response['data'])){
    $response = $response['data'];
  }else{
    $response = false;
  }
?>

<div class="col-lg-12">
    <div>
        <table id="tablax" class="table table-responsive table-striped table-bordered table-condensed mt-3" style="width:100%">
            <thead class="text-center">
                <tr class="align-middle">
                    <th>Fecha</th>
                    <th>Reclamo</th>
                    <th>Cliente</th>
                    <th>Empleado Responsable</th>
                    <th>Propuesta</th>
                    <th>Corrección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if($response) : ?>
            <?php foreach($response as $key => $analisis): ?>
                <tr class="align-middle">
                    <td><?=DateFormat($analisis['FechaAnalisis'])?></td>
                    <td><?=$analisis['MensajeReclamo']?></td>
                    <td><?=$analisis['NombreCliente']?></td>
                    <td><?=$analisis['NombreEmpleado'] . ' '. $analisis['ApellidoEmpleado']?></td>
                    <td><?=$analisis['MensajePropuesta']?></td>
                    <td><?=$analisis['SolucionAnalisis']?></td>
                    <td class="col-lg-2 ">
                        <div class="row justify-content-md-center g-0">
                        <a type="button" class="btn btn-dark" href="<?= MAIN_ROUTE . "AnalisisReporte/$analisis[IdAnalisis]?api_token=$_GET[api_token]"?>">
                            Descargar
                        </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<script src="../../resources/js/dashboard/tabla.js"></script>
