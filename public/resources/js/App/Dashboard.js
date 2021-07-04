const Usuario = document.querySelector('#usuario');
const UsuarioSalir = document.querySelector('#usuario_salir');

Usuario.textContent = Session.getUserName();
UsuarioSalir.addEventListener('click', (e) => {
  const data = {
    Uri: 'logout',
    Method: 'POST',
    Request: {"api_token": Session.getToken()},
    CallBack: (res) => {
      alert(res.message);
      if (res.code == -1)
        return false;
      Session.logout();
      location.href = './';
    }
  };
  ajax(data)
})
window.addEventListener('load',function (e){
  if(localStorage.roles_id <3){
    $('#content').attr('src', 'reclamos.html');
    return;
  }
  $('#content').attr('src', 'empleado.html');
})
if(localStorage.roles_id == 3){
  document.querySelector('#menu2').className = document.querySelector('#menu4').className +' d-none';
  document.querySelector('#menu3').className = document.querySelector('#menu4').className +' d-none';
}
if(localStorage.roles_id == 2){
  document.querySelector('#menu4').className = document.querySelector('#menu4').className +' d-none';
  document.querySelector('#menu2').className = document.querySelector('#menu4').className +' d-none';
}
if(localStorage.roles_id == 1){
  document.querySelector('#menu4').className = document.querySelector('#menu4').className +' d-none';
}
