<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>SunChemical</title>

    <!-- Custom styles for this template -->

    <!-- Bootstrap core CSS -->
    <link href="../../resources/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  </head>

  <body class="bg-white">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4 rounded" src="../../resources/img/dashboard/sunchem1.png" alt="" width="200" height="102">
        <h2>Reclamos de Cliente</h2>
        <p class="lead">Ingrese los datos en los campos correspondientes para responder a su reclamo.</p>
      </div>

      <div>
        <form class="row g-3 needs-validation ms-2 mt-2" novalidate>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 ">
                  <label for="validationCustomUsername" class="form-label">Cliente</label>
                  <div class="input-group has-validation">
                  <input  class="form-control h-25 d-inline-block" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required readonly>
                  </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Tipo de Reclamo</label>
                    <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Escoje...</option>
                    <option>...</option>
                    </select>
                    <div class="invalid-feedback">
                    Please select a valid state.
                    </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Producto</label>
                    <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Escoje...</option>
                    <option>...</option>
                    </select>
                    <div class="invalid-feedback">
                    Please select a valid state.
                    </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustomUsername" class="form-label">Fecha:</label>
                  <div class="input-group has-validation">
                  <input type="date" class="form-control h-25 d-inline-block" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                </div>
              </div>

              <div class="">
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Descripción reclamo:</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <div class="valid-feedback">
                  Looks good!
                  </div>
                </div>
              </div>

            </div>
          </div>
        </form>
      </div>

      <div class="mt-auto">
        <br>
        <a href="index.php" class="btn btn-dark w-25 py-2 m-4 rounded mx-auto d-block mt-6">Enviar Reclamo</a>
      </div>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../../resources/js/efectos/jquery.min.js"></script>
    <script src="../../resources/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../resources/js/dashboard/dashboard.js"></script>

  </body>
</html>
