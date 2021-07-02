<?php
  include('../const/index.php');
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => MAIN_ROUTE . 'Empleados',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS =>'
      {
          "api_token": "'.$_GET['api_token'].'"

      }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);
  $response = json_decode($response,true);

  $response = $response['data'];
?>

<div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Agregar registro
  </button>
  <br>
  <div class="table-responsive">
    <br>
    <table id="tablax" class="table table-striped table-bordered table-condensed  mt-3" style="width:100%">
      <thead class="text-center">
        <tr class="align-middle">
          <th>Identificación</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Profesion</th>
          <th>Correo</th>
          <th>Dirección</th>
          <th>Tipo de Empleado</th>
          <th>Estado Empleado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($response as $key => $empleado): ?>
        <tr class="align-middle" id=<?="$empleado[IdEmpleado]"?>>
          <td><?=$empleado['IdentidadEmpleado']?></td>
          <td><?=$empleado['NombreEmpleado']?></td>
          <td><?=$empleado['ApellidoEmpleado']?></td>
          <td><?=$empleado['ProfesionEmpleado']?></td>
          <td><?=$empleado['CorreoEmpleado']?></td>
          <td><?=$empleado['DireccionEmpleado']?></td>
          <td><?=$empleado['RolEmpleado']?></td>
          <td><?=$empleado['EstadoEmpleado']?></td>
          <td class="col-lg-2 ">
            <div class="row justify-content-md-center g-0">
              <button type="button" class="btn btn-danger col col-lg-4 me-3 p-0" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop2" data-id=<?="$empleado[IdEmpleado]"?> >
                <img src="../../resources/img/dashboard/eliminar.png" width="25px">
              </button>
              <button type="button" class="btn btn-primary col col-lg-4 p-0" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop3" data-id=<?="$empleado[IdEmpleado]"?>>
                <img src="../../resources/img/dashboard/borrar.png" width="25px">
              </button>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<script src="../../resources/js/dashboard/tabla.js"></script>