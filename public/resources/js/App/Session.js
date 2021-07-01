const Session = (()=>{

    let getToken      = ()=> localStorage.getItem('token');
    let getUserName   = () => localStorage.getItem('userName');
    let getRolesId    = ()  => localStorage.getItem('roles_id');

    const init = ({api_token,usuario,roles_id}) => {
      localStorage.setItem('token',api_token)
      localStorage.setItem('userName',usuario)
      localStorage.setItem('roles_id',roles_id)
    }
    const check    = () => localStorage.getItem('token')? true:false;
    const logout = () => {
      localStorage.clear();
    };
    return({
      init,
      logout,
      getRolesId,
      getToken,
      getUserName,
      check
    })
  }
)();

let uri = location.href.split('/');
    uri = uri[uri.length-1];
if(Session.check() && uri!=='dashboard.html'){
  location.href= 'dashboard.html';
}


