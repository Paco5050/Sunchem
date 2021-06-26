<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="../../resources/img/dashboard/icono.png" type="favicon/x-icon">

    <title>SunChemical</title>

    <!-- Bootstrap core CSS -->
    <link href="../../resources/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../resources/css/dashboard/dashboard.css" rel="stylesheet">

    
</head>

<body class="g-0">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="display-6">Análisis de Reclamos

                </h1>
            </div>
            <div class="col-lg-6">
                <img class="" src="../../resources/img/dashboard/crud_usuario.png" alt="" width="70px">
            </div>    
        </div>  
        <div class="row" id="tabla"></div>
    </div>   
    
    <!-- Modal Crear-->
    <div class="modal fade col-lg-12" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar Analisis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation ms-2 mt-2" novalidate>
                        <div class="row">    
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Reclamo</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Empleado encargado</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12 mb-3 birthday_datepicker">
                                <div class="birthday_datepicker">
                                    <label class="mb-2">Fecha:</label>
                                    <input type="date"  class=" form-control" placeholder="(yyyy/mm/dd)"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">  
                            <div class="col-md-12">
                                <label  class="form-label">Análisis</label>
                                <textarea class="form-control"  rows="3"></textarea>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label  class="form-label">Corrección</label>
                                <textarea class="form-control" rows="3"></textarea>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Borrar-->
    <div class="modal fade col-lg-12" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mensaje de advertencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de eliminar el registro seleccionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Eliminar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Actualizar-->
     <div class="modal fade col-lg-12" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Analisis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation ms-2 mt-2" novalidate>
                        <div class="row">    
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Reclamo</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Area detección</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Modo de falla</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Empleado</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01" class="form-label">Estatus</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-3 mb-3 ">
                                <div class="">
                                    <label class="mb-2">Fecha:</label>
                                    <input type="date"  class=" form-control" placeholder="(yyyy/mm/dd)"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Corrección</label>
                                    <input type="text" class="form-control" value="" required>
                                    </select>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../../resources/js/bootstrap/bootstrap.bundle.min.js"></script>
    
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tabla').load('../../app/api/tablaanalisis.php');
        });
    </script>
</body>

</html>