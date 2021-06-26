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
                <h1 class="display-6">Administración de Empleados

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
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation ms-2 mt-2" novalidate>
                        
                        <div class="row">    
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nombre Empleado</label>
                                    <input type="text" class="form-control" value="" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Profesion</label>
                                    <input type="text" class="form-control" value="" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" value="" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" value="" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustomUsername" class="form-label">Correo Empleado</label>
                                <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tipo Empleado</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Estado Empleado</label>
                                <select class="form-select" required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid state.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">Tipo Usuario</label>
                                <select class="form-select"  required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Dirección del Empleado</label>
                                <textarea class="form-control"  rows="3"></textarea>
                                <div class="valid-feedback">
                                Looks good!
                                </div>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation ms-2 mt-2" novalidate>
                        
                        <div class="row">    
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nombre Empleado</label>
                                    <input type="text" class="form-control" value="" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Profesion</label>
                                    <input type="text" class="form-control"  value="" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Usuario</label>
                                    <input type="text" class="form-control"  value="" required>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control"  value="" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustomUsername" class="form-label">Correo Empleado</label>
                                <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tipo Empleado</label>
                                <select class="form-select"  required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Estado Empleado</label>
                                <select class="form-select"  required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid state.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">Tipo Usuario</label>
                                <select class="form-select"  required>
                                <option selected disabled value="">Escoje...</option>
                                <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Dirección del Empleado</label>
                                <textarea class="form-control"  rows="3"></textarea>
                                <div class="valid-feedback">
                                Looks good!
                                </div>
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
            $('#tabla').load('../../app/api/tablaempleado.php');
        });
    </script>
</body>

</html>