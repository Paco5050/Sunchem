<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../resources/img/dashboard/icono.png" type="favicon/x-icon">

    <title>SunChemical</title>

    <!-- Custom styles for this template -->
    <link href="../../resources/css/dashboard/dashboard.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="../../resources/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="row g-0">

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right bg-light" id="sidebar-wrapper">
            <div class="sidebar-heading"><img src="../../resources/img/dashboard/logo1.png" alt="" width="200px" class="rounded"></div>
            <div class="list-group list-group-flush col p-2">
                <a id="menu4" class="list-group-item list-group-item-action w-100 py-2 my-1 rounded"><img src="../../resources/img/dashboard/empleados.png" alt="" width="25px" class="img-fluid img-thumbnail"> Empleado</a>
                <a id="menu2" class="list-group-item list-group-item-action w-100 py-2 my-1 rounded"><img src="../../resources/img/dashboard/entradas.png" alt="" width="25px" class="img-fluid img-thumbnail"> Analisis</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-dark p-1">
                <button class="btn btn-secondary" id="menu-toggle">
                    <img src="../../resources/img/dashboard/pngegg.png" alt="" width="30px">
                </button>
                <div class="collapse navbar-collapse bar d-flex flex-row-reverse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active ">
                            <a class="nav-link text-light " href="#"><img src="../../resources/img/dashboard/user.png" alt="" width="30px"></a>
                        </li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Nombre de Usuario
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="index.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </nav>
            <iframe id="content" class="px-1 mh-100 " width="100%" height="1080px"></iframe>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../../resources/js/efectos/jquery.min.js"></script>
    <script src="../../resources/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../resources/js/dashboard/dashboard.js"></script>
    <script>
	$(document).ready(function(e) {
		$('#menu1').on('click', function(){
			$('#content').attr('src', 'Productos.php');
		});
		$('#menu2').on('click', function(){
			$('#content').attr('src', 'Analisis.php'); 
		});
        $('#menu3').on('click', function(){		
			$('#content').attr('src', 'Reclamos.php');
		});
        $('#menu4').on('click', function(){		
			$('#content').attr('src', 'Empleado.php');
		});
	});
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
</body>
</html>