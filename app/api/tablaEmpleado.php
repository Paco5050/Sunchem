<div class="col-lg-12">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar registro
    </button>
    <br>
    <div class="table-responsive"> 
        <br>       
        <table id="tablax" class="table table-striped table-bordered table-condensed  mt-3" style="width:100%">
            <thead class="text-center">
                <tr class="align-middle">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Profesion</th>   
                    <th>Correo</th>                             
                    <th>Dirección</th>  
                    <th>Tipo de Empleado</th>
                    <th>Estado Empleado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <td>1</td>
                    <td>Diego Antonio</td>
                    <td>Graduado de Bachiller</td>
                    <td>diegoantonio2000@gmail.com</td>    
                    <td>Colonio Bernal</td> 
                    <td>Bodegero</td> 
                    <td>Activo</td> 
                    <td class="col-lg-2 ">
                        <div class="row justify-content-md-center g-0">
                        <button type="button" class="btn btn-danger col col-lg-4 me-3 p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                            <img src="../../resources/img/dashboard/eliminar.png" alt="" width="25px">
                        </button>
                        <button type="button" class="btn btn-primary col col-lg-4 p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                            <img src="../../resources/img/dashboard/borrar.png" alt="" width="25px">
                        </button>
                        
                        </div>
                    </td>
                </tr>                              
            </tbody>        
        </table>                    
    </div>
</div>
<script src="../../resources/js/dashboard/tabla.js"></script>