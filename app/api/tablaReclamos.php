<?php

include '../const/index.php';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => MAIN_ROUTE . 'Reclamos',
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
    }
',
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
    <div class="table-responsive">
        <br>
        <table id="tablax" class="table table-striped table-bordered table-condensed mt-3" style="width:100%">
            <thead class="text-center">
                <tr class="align-middle">
                    <th>Fecha</th>
                    <th>Tipo de reclamo</th>
                    <th>Cliente</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if($response) : ?>
            <?php foreach($response as $key => $reclamo): ?>
                <tr class="align-middle">
                    <td><?=DateFormat($reclamo['FechaReclamo'])?></td>
                    <td><?=$reclamo['TipoReclamo']?></td>
                  <td><?=$reclamo['NombreCliente']?></td>
                  <td><?=$reclamo['DescripcionReclamo']?></td>
                  <td class="col-lg-2">
                      <?php if($_GET['roles_id'] ==1 ) :?>
                        <button type="button"
                          class="btn btn-dark col col-lg-5 me-3 p-0 w-100 mb-2"
                          data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop3"
                          data-IdReclamo="<?="$reclamo[IdReclamo]"?>"
                          onclick="HacerAnalisis(this)">
                            Hacer Analisis
                        </button>
                      <?php endif?>
                      <button type="button"
                        class="btn btn-primary col col-lg-5 me-3 p-0 w-100 mb-2"
                        data-bs-toggle="modal"
                        onclick="send(this)"
                        data-bs-target="#staticBackdrop2"
                        data-id=<?="$reclamo[IdReclamo]"?>>
                          Hacer propuesta
                      </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif?>
            </tbody>
        </table>
    </div>
</div>
<script src="../../resources/js/dashboard/tabla.js"></script>
<script src="../../resources/js/App/const/index.js"></script>
<script src="../../resources/js/App/Ajax/index.js"></script>
<script>

  function send(e){
    const IdReclamo = e.dataset.id;
    const PropuestaForm = document.querySelector('.modal_propuesta')
    PropuestaForm.onsubmit = function(){
      event.preventDefault();
      const PropuestaEmpleado = document.querySelector('.PropuestaEmpleado');
      ajax(
        {Uri:'Propuesta',
        Method:'POST',
        Request:{
          "api_token":localStorage.token,
          "propuesta":PropuestaEmpleado.value,
          "reclamos_id":IdReclamo
        },
        CallBack:(res)=>{ //
          alert(res.message);
          if(res.code == -1){
            return false;
          }
          PropuestaForm.reset();
        }}
      );
    }
  }

  function HacerAnalisis(e){
    const IdReclamo = e.dataset.idreclamo;
    const ListaPropuesta = document.querySelector('.listPropuestas');
    const OptionLabelPropuestas = document.querySelector('#optionLabelPropuestas');
    ajax({
      Uri:'PropuestasReclamos/' + IdReclamo + '?api_token=' + localStorage.token,
      Method:'GET',
      Request:null,
      CallBack: res => {

        [... ListaPropuesta.children].forEach( (propuesta,index) =>{
          if(index > 0){
            propuesta.remove();
          }
        })

        if(res.code == 0){ // sin propuestas
          OptionLabelPropuestas.textContent = res.message;
          document.querySelector('.AnalisiaEmpleado').value = '';
          document.querySelector('.AnalisiaEmpleado').readOnly = true;
          document.querySelector('.AnalisiaEmpleado').placeholder =  'No tiene propuestas en las cuales basar su analisis';
          document.querySelector('.BtnAnalisis').disabled = true;
          return;
        }
        if(res.code = 1){ //  registros encontrados

          OptionLabelPropuestas.textContent = 'Seleccione una propuesta';
          document.querySelector('.AnalisiaEmpleado').readOnly = false;
          document.querySelector('.AnalisiaEmpleado').placeholder = 'Redacte su propuesta';
          document.querySelector('.BtnAnalisis').disabled = false;

          res.data.forEach(propuesta => {
            const Option  = document.createElement('option');
            Option.value = propuesta.IdPropuesta;
            Option.textContent = propuesta.propuesta + ' - ' + propuesta.NombreEmpleado + ' ' + propuesta.ApellidoEmpleado;
            ListaPropuesta.appendChild(Option);
          });


          document.querySelector('.modal_analisis').onsubmit = e => { // enviando datos
            event.preventDefault();
            if(ListaPropuesta.value == 0){
              alert('Seleccione una propuesta');
              return;
            }
            if(!document.querySelector('.AnalisiaEmpleado').value){
              alert('Redacte su analisis');
              return;
            }

            ajax({
              Uri:'Analisis',
              Method:'POST',
              Request:{
                api_token:localStorage.token,
                propuestas_id:ListaPropuesta.value,
                solucion:document.querySelector('.AnalisiaEmpleado').value
              },
              CallBack: res => {
                alert(res.message);
                if(res.code == 1){
                  location.reload();
                  return;
                }
              }
            });

          }
          return;
        }
      }
    });
  }



</script>
