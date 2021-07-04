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
  if(isset($response['data'])){
    $response = $response['data'];
  }else{
    $response = false;
  }
?>

<div>
  <button type="button" class="btn btn-primary BtnAgregarEmpleado" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
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
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php if($response) : ?>
        <?php foreach($response as $key => $empleado): ?>
        <tr class="align-middle" id=<?="$empleado[IdEmpleado]"?>>
          <td><?=$empleado['IdentidadEmpleado']?></td>
          <td><?=$empleado['NombreEmpleado']?></td>
          <td><?=$empleado['ApellidoEmpleado']?></td>
          <td><?=$empleado['ProfesionEmpleado']?></td>
          <td><?=$empleado['CorreoEmpleado']?></td>
          <td><?=$empleado['DireccionEmpleado']?></td>
          <td><?=$empleado['RolEmpleado']?></td>
          <td class="col-lg-2 ">
            <div class="row justify-content-md-center g-0">
              <button type="button" class="btn btn-danger col col-lg-4 me-3 p-0" data-id=<?="$empleado[IdEmpleado]"?>
                  onclick="DespedirEmpleado(this);"
                >
                <img src="../../resources/img/dashboard/eliminar.png" width="25px">
              </button>
              <button
                type="button" class="btn btn-primary col col-lg-4 p-0" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"

                data-id="<?="$empleado[IdEmpleado]"?>"

                data-IdUsuario="<?="$empleado[IdUsuario]"?>"
                
                data-IdentidadEmpleado="<?="$empleado[IdentidadEmpleado]"?>"
                
                data-NombreEmpleado="<?="$empleado[NombreEmpleado]"?>"
                
                data-ApellidoEmpleado="<?="$empleado[ApellidoEmpleado]"?>"
                
                data-ProfesionEmpleado="<?="$empleado[ProfesionEmpleado]"?>"
                
                data-CorreoEmpleado="<?="$empleado[CorreoEmpleado]"?>"
                
                data-DireccionEmpleado="<?="$empleado[DireccionEmpleado]"?>"
                
                data-IdRolEmpleado="<?="$empleado[IdRolEmpleado]"?>"
                
                data-EstadoEmpleado="<?="$empleado[EstadoEmpleado]"?>"
                
                data-IdProfesion="<?="$empleado[IdProfesion]"?>"
                
                onclick="ActualizarEmpleado(this)" >
                <img src="../../resources/img/dashboard/borrar.png" width="25px">
              </button>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php endif?>
      </tbody>
    </table>
  </div>
</div>
<script src="../../resources/js/dashboard/tabla.js"></script>
<script>
  const RegistrarEmpleadoFnc = RegistrarEmpleadoForm.onsubmit;
  document.querySelector('.BtnAgregarEmpleado').onclick = ()=>{ // cambiar formulario para agregar nuvos empleados
    RegistrarEmpleadoForm.onsubmit = RegistrarEmpleadoFnc;
    UsuarioEmpleado.parentElement.hidden = false;
    ClaveEmpleado.parentElement.hidden = false;
    PreguntaEmpleado.parentElement.hidden= false;
    RespuestaEmpleado.parentElement.hidden = false;
    document.querySelector('#EmpleadoSubmit').textContent = "Crear";
    RegistrarEmpleadoForm.reset();

    document.querySelectorAll('.registro-completo').forEach(item => {
      item.className = ('col-md-12 registro-completo d-none');
    })

  }
  function DespedirEmpleado(e){
    const IdEmpleado = e.dataset.id;
    const req ={
      Uri:'DespedirEmpleado/'+IdEmpleado+'?api_token='+localStorage.token,
      Method:'PUT',
      Request:null,
      CallBack:(res)=>{
        if(res.code == 1){
          e.parentElement.parentElement.parentElement.remove();
          return false;
        }
      }
    };
    if(confirm('Desea despedir a éste empleado?')){
      ajax(req);
      return false;
    }
  }
  function ActualizarEmpleado(e){

    document.querySelectorAll('.registro-completo').forEach(item => {
      item.className = ('col-md-12 registro-completo');
    })

    const IdentidadEmpleado   = document.querySelector('#IdentidadEmpleado');
    const NombreEmpleado      = document.querySelector('#NombreEmpleado');
    const ApellidoEmpleado    = document.querySelector('#ApellidoEmpleado');
    const CorreoEmpleado      = document.querySelector('#CorreoEmpleado');
    const DireccionEmpleado   = document.querySelector('#DireccionEmpleado');
    const UsuarioEmpleado     = document.querySelector('#UsuarioEmpleado');
    const ClaveEmpleado       = document.querySelector('#ClaveEmpleado');
    const PreguntaEmpleado    = document.querySelector('#PreguntaEmpleado');
    const RespuestaEmpleado   = document.querySelector('#RespuestaEmpleado');

    const SelectProfesion   = document.querySelector('#ProfesionEmpleado');
    const OtraProfesion     = document.querySelector('#OtraProfesionEmpleado');
    const OtraProfesionEmpleadoInput = document.querySelector('#OtraProfesionEmpleadoInput');
    const EmpleadoSubmit = document.querySelector('#EmpleadoSubmit');
    const RolEmpleado = document.querySelector('#RolEmpleado');
    
    const IdUsuario = e.dataset.idusuario;
    const IdEmpleado = e.dataset.id;
    IdentidadEmpleado.value = e.dataset.identidadempleado;
    NombreEmpleado.value = e.dataset.nombreempleado;
    ApellidoEmpleado.value = e.dataset.apellidoempleado;
    CorreoEmpleado.value = e.dataset.correoempleado;
    DireccionEmpleado.value = e.dataset.direccionempleado;
    SelectProfesion.value = e.dataset.idprofesion;
    RolEmpleado.value = e.dataset.idrolempleado;
  
    EmpleadoSubmit.textContent = 'Actualizar';

    document.querySelector('#RegistrarEmpleado').onsubmit = function(){ // actualizar empleado
      if(
        !IdentidadEmpleado.value || 
        !NombreEmpleado.value || 
        !ApellidoEmpleado.value || 
        !CorreoEmpleado.value || 
        !DireccionEmpleado.value || 
        !UsuarioEmpleado.value|| 
        !ClaveEmpleado.value || 
        !PreguntaEmpleado.value || 
        !RespuestaEmpleado.value 
      ){
        alert('Debe de ingresar todos los campos solicitados');
        return false;
      }

      if(!EMAIL_REGEX.test(CorreoEmpleado.value)){
        alert('Ingrese un correo válido');
        CorreoEmpleado.value = '';
        CorreoEmpleado.placeholder = 'usuario@dominio.com';
        return;
      }

      if(SelectProfesion.value == 0){
        alert('Debe seleccionar una profesión');
        return false;
      }

      if(SelectProfesion.value == -1 && !OtraProfesionEmpleadoInput.value ){
        alert('Escriba la profesión');
        return;
      }
      if(RolEmpleado.value == 0){
        alert('Seleccione un rol');
        return;
      }
      
      ajax({
        Uri:'ValidarEmpleado',
        Method:'POST',
        Request:{
          "api_token":localStorage.token,
          "documento_identidad":IdentidadEmpleado.value
        },
        CallBack: res => {
          
          if(res.code == 2 && !(res.data.usuario_id == IdUsuario)){ // identificacion en uso por otro registro
            alert('Identidad usada por otro registro');
            return;
          }

          ajax({
            Uri:'ValidarCorreo',
            Method:'POST',
            Request:{
              "api_token":localStorage.token,
              "correo":CorreoEmpleado.value.toLowerCase()
            },
            CallBack: res => {// correo usado por otro registro
              if(res.code == 2 && !(res.data.usuarios_id)){
                alert('Correo usado por otro registro');
                return;
            }

            ajax({
              Uri:'ValidarUsuario',
              Method:'POST',
              Request:{
                "api_token":localStorage.token,
                "usuario":UsuarioEmpleado.value.toLowerCase()
              },
              CallBack: res => {// usuario en uso por otro registro
                if(res.code == 2 && !(res.data.id == IdUsuario)){
                  alert('usuario en uso');
                  return;
                }


                // request

                const req = {
                  Request : {
                    "api_token":localStorage.token,
                    "id" : IdEmpleado,
                    "documento_identidad" : IdentidadEmpleado.value,
                    "nombre" : NombreEmpleado.value.toLowerCase(),
                    "apellido" : ApellidoEmpleado.value.toLowerCase(),
                    "direccion" : DireccionEmpleado.value.toLowerCase(),
                    "estado_empleado_id" : "1",
                    "correo" : CorreoEmpleado.value.toLowerCase(),
                    "profesion_id":SelectProfesion.value,
                    "roles_id":RolEmpleado.value,
                    "usuario" : UsuarioEmpleado.value.toLowerCase(),
                    "clave" : ClaveEmpleado.value,
                    "pregunta" : PreguntaEmpleado.value.toLowerCase(),
                    "respuesta" : RespuestaEmpleado.value.toLowerCase()
                  },
                  Uri : 'EmpleadoActualizar',
                  Method : 'PUT',
                  CallBack:(res)=>{
                    if(res.code == -1 || res.code == 2){
                      alert(res.message);
                      return false;
                    }
                    RegistrarEmpleadoForm.reset();
                    location.reload();
                  }
                }

                if(SelectProfesion.value == -1){ // profesion nueva

                  ajax(
                    {
                      Uri:'Profesion',
                      Method:'POST',
                      Request:{
                        "api_token" : localStorage.token,
                        "profesion": OtraProfesionEmpleadoInput.value.toLowerCase()
                      },
                      CallBack: res => { // insertar nueva profesion
                        if(res.code == 1){
                          const IdProfesion = res.data;
                          req.Request.profesion_id = IdProfesion;
                          ajax(req);
                          return;
                        }
                        alert(res.message);
                      }
                    }
                  )

                }else{// profesion existente
                  ajax(req);
                }

              }})

          }});
          
        
        }});
    
    }

  }

</script>

