<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->getRoutes();
});


$router->post('login', 'Auth@login');

// cliente
$router->post('CorreoCliente','Cliente@CheckEmail');
$router->post('Cliente', 'Cliente@Insert');
$router->put('Cliente', 'Cliente@UpdateDirection');
$router->post('Reclamo', 'Reclamo@Insert');
$router->get('TiposReclamos','Reclamo@TypesOfClaims');

$router->group(['middleware' => 'auth'], function () use ($router) {

    // administrador
    $router->post('ContratarEmpleado', 'Administrador@HireEmployee');
    $router->post('ValidarCorreo', 'Administrador@CheckEmail');
    $router->post('ValidarUsuario', 'Administrador@CheckUser');
    $router->post('ValidarEmpleado', 'Administrador@CheckEmployee');
    $router->put('EmpleadoActualizar', 'Administrador@UpdateEmployee');
    $router->put('DespedirEmpleado/{id}', 'Administrador@LayOffStaff');
    $router->put('RecontratarEmpleado/{id}', 'Administrador@HireEmployeeAgain');
    $router->get('Empleados', 'Empleado@All');
    $router->get('Profesiones', 'Profesion@All');
    $router->post('Profesion', 'Profesion@Insert');
    $router->put('ProfesionActualizar', 'Profesion@Update');
    $router->get('Analisis', 'Analisis@All');
    $router->post('Analisis', 'Analisis@Insert');
    $router->get('AnalisisReporte/{id}','Reportes@Analisis');

    // administrador y empleado
    $router->get('Propuestas', 'Propuesta@All');
    $router->post('Propuesta', 'Propuesta@Insert');
    $router->get('PropuestasReclamos/{id}','Propuesta@ProposelOfClaim');
    $router->get('Reclamos', 'Reclamo@All');

    $router->post('logout', 'Auth@logout');

    $router->group(['middleware' => 'role:administrador'], function () use ($router) {
    });

});
