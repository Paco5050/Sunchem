const ReclamoForm = document.querySelector('.reclamo__form');
const ReclamoFormCorreo = document.querySelector('.reclamo__form__correo');
const ReclamoCerrar = document.querySelector('.btn-close');
const ReclamoModalBody = document.querySelectorAll('.modal-body');
const TiposReclamos = document.querySelector('.tipos_reclamos');
const ReclamoCliente = document.querySelector('#reclamo_cliente');

ReclamoCerrar.addEventListener('click', function (e) {
  ReclamoForm.reset();
  ReclamoFormCorreo.reset();
  ReclamoModalBody[1].className = "modal-body";
  ReclamoModalBody[0].className = "modal-body d-none";
});
const CheckTipoReclamoSelect = function(){
  if (TiposReclamos.value == 0) {
    TiposReclamos.style.border = 'solid red 1px';
    alert('Seleccione un tipo de reclamo');
    return false;
  }
  TiposReclamos.style.border = 'solid rgba(0,0,0,0.2) 1px';
  return true;
}
const InsertReclamoClienteRegistrado = function(IdCliente,DireccionCliente){
  const data = {
    Uri: 'Reclamo', Method: 'POST', Request: {
      "tipos_reclamos_id": TiposReclamos.value,
      "clientes_id": IdCliente,
      "mensaje": ReclamoCliente.value.toLowerCase()
    }, CallBack: (res) => {

      if (res.code == -1) {
        alert(res.message);
        return false;
      }
      ReclamoCliente.value = '';
      alert(res.message);
      ajax({
        Uri: 'Cliente', Method: 'PUT', Request: {
          "id": IdCliente,
          "direccion": DireccionCliente
        }, CallBack: (res) => res
      })

    }
  }
  ajax(data);
}
const UpdateDireccionCLiente = function (e,IdCliente,DireccionCliente) {
  e.preventDefault(); // reclamos de cliente frencuente
  if (!CheckTipoReclamoSelect())
    return false;
  InsertReclamoClienteRegistrado(IdCliente,DireccionCliente);
}

ReclamoFormCorreo.addEventListener('submit', function (e) {
  e.preventDefault();
  if (TiposReclamos.childElementCount == 1) { // buscar tipos de reclamos
    ajax({
      Uri: 'TiposReclamos',
      Method: 'GET',
      CallBack: (res) => {
        if (res.code == 0)
          return false;
        const data = (res.data);
        data.forEach(tipoReclamo => {
          let tipo = document.createElement('option');
          tipo.textContent = tipoReclamo.nombre;
          tipo.value = tipoReclamo.id;
          TiposReclamos.appendChild(tipo);
        })
      }
    });
  }

  const InputCorreo = document.querySelector('#correo_client');
  if (!EMAIL_REGEX.test(InputCorreo.value)) {
    alert('Ingrese un correo válido');
    return false;
  };

  const data = {
    Uri: 'CorreoCliente',
    Method: 'POST',
    Request: {
      "correo": InputCorreo.value
    },

    CallBack: (res) => {

      ReclamoModalBody[1].className = "modal-body d-none";
      ReclamoModalBody[0].className = "modal-body";
      const NombreCliente = document.querySelector('.nombre_cliente');
      const DireccionCliente = document.querySelector('.direccion_cliente');
      const CorreoCliente = document.querySelector('.correo_cliente_older');
      let IdCliente = 0;
      if (res.code == -1) {
        CorreoCliente.readOnly = false;
        NombreCliente.readOnly = false;
        CorreoCliente.value = InputCorreo.value.toLowerCase();
        ReclamoForm.onsubmit = function (e) {// si es cliente nuevo
          e.preventDefault();
          if (!CheckTipoReclamoSelect())
            return false;
          ajax({
            Uri: 'Cliente', Method: 'POST', Request: {
              "nombre": NombreCliente.value.toLowerCase(),
              "correo": CorreoCliente.value.toLowerCase(),
              "direccion": DireccionCliente.value.toLowerCase()
            }, CallBack: (res) => {
              if(res.code != 1){
                alert(res.message);
                return false;
              };
              IdCliente = res.data;
              InsertReclamoClienteRegistrado(IdCliente,DireccionCliente.value.toLowerCase())
              CorreoCliente.readOnly = true;
              NombreCliente.readOnly = true;
              ReclamoForm.onsubmit = function(e){
                UpdateDireccionCLiente(e,IdCliente,DireccionCliente.value.toLowerCase())
              };
            }
          })

        }
        return true;
      }

      IdCliente = res.data.id;
      CorreoCliente.value = res.data.correo.toLowerCase();
      NombreCliente.value = res.data.nombre.toLowerCase();
      DireccionCliente.value = res.data.direccion.toLowerCase();
      CorreoCliente.readOnly = true;
      NombreCliente.readOnly = true;

      ReclamoForm.onsubmit = function(e){
        UpdateDireccionCLiente(e,IdCliente,DireccionCliente.value)
      };
    }
  }
  ajax(data);
})
