/**
 *
 * @param {*} Params {Uri,Method,CallBack,Request}
 */
const ajax = function(Params){

  const {Uri,Method,CallBack,Request} = Params;

  let HeadersOptions = new Headers();
  HeadersOptions.append("Content-Type", "application/json");

  let raw = JSON.stringify(Request);

  let requestOptions = {
    method: Method,
    headers: HeadersOptions,
    body: Method == 'GET'? null: raw,
    redirect: 'follow'
  };

  console.log(MAIN_POINT + Uri);

  fetch(MAIN_POINT + Uri, requestOptions)
    .then(response =>{
      return response.json();
    })
    .catch(error => {
      error = {
        code:-1,
        message:'se ha presentado un incoveniente al intentar procesar la solicitud, reintente de nuevo',
        error: error,
        data: null
      }
      console.log(error);
      return error;
    }).then(result => CallBack(result));
}
