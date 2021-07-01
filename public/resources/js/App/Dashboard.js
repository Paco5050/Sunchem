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
