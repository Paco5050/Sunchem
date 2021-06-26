
<!-- W3hubs.com - Download Free Responsive Website Layout Templates designed on HTML5 
   CSS3,Bootstrap,Tailwind CSS which are 100% Mobile friendly. w3Hubs all Layouts are responsive 
   cross browser supported, best quality world class designs. -->

   <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <title>SunChemical</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            height: 100vh;
            font-family: "Nunito Sans";
        }

        .form-control {
            line-height: 2;
        }

        .bg-custom {
            background-color: #6C63FF;
        }

        .btn-custom {
            background-color: #3e3d56;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #33313f;
            color: #fff;
        }

        label {
            color: #fff;
        }

        a,
        a:hover {
            color: #fff;
            text-decoration: none;
        }

        a,
        a:hover {
            text-decoration: none;
        }

        @media(max-width: 932px) {
            .display-none {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="row m-0 h-100">
        <div class="col col-lg-5 p-0 text-center d-flex justify-content-center align-items-center display-none">
            <img src="../../resources/img/dashboard/sunchem1.png" class="w-75">
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100 bg-dark">
          <img src="../../resources/img/dashboard/login1.png" class="w-50">
            <form class="w-75" action="#">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su usuario"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Ingrese su contraseña"
                        required>
                </div>
                <div class="mb-3">
                    <div class="col-md-6">
                            <a href="Recuperaciones.php">¿Se ha olvidado de sus credenciales?</a>
                    </div>
                </div>
                <a href="Dashboard.php" class="btn btn-custom btn-lg btn-block mt-3 btn-outline-light rounded">Iniciar Sesión</a>
            </form>
        </div>
    </div>
</body>

</html>