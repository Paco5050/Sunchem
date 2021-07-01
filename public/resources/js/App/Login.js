const FormIniciarSession = document.querySelector('#form-iniciar-session');
function Login(e){
  e.preventDefault();

  const InputClave         = document.querySelector('#AutenticarClave');
  const InputUsuario       = document.querySelector('#AutenticarUsuario');

  if(!InputClave.value || !InputUsuario.value){
    alert('Debe de ingresar todos los campos del formulario');
    return false;
  }
  ajax({
    Uri:'login',
    Method:'POST',
    Request:{
      "usuario":InputUsuario.value.toLowerCase(),
      "clave":InputClave.value
    },
    CallBack:(res)=>{
      alert(res.message);
      if(res.code == -1){
        return false;
      }
      InputClave.value = '';
      InputUsuario.value = '';
      Session.init(res.data);
      location.href = 'dashboard.html'
    }
  });
}
FormIniciarSession.addEventListener('submit',Login);
