<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Response\ResponseDefault;
$router->get('/', function () use ($router) {
    return $router->getRoutes();
});


$router->post('login', 'Auth@login');

// cliente
$router->post('Cliente', 'Cliente@Insert');
$router->put('Cliente', 'Cliente@UpdateDirection');
$router->post('Reclamo', 'Reclamo@Insert');
$router->get('TiposReclamos','Reclamo@TypesOfClaims');

$router->group(['middleware' => 'auth'], function () use ($router) {

    // administrador
    $router->post('ContratarEmpleado', 'Administrador@HireEmployee');
    $router->get('ValidarCorreo', 'Administrador@CheckEmail');
    $router->get('ValidarUsuario', 'Administrador@CheckUser');
    $router->post('ValidarEmpleado', 'Administrador@CheckEmployee');
    $router->put('EmpleadoActualizar', 'Administrador@UpdateEmployee');
    $router->put('DespedirEmpleado/{id}', 'Administrador@LayOffStaff');
    $router->get('Empleados', 'Empleado@All');
    $router->get('Profesiones', 'Profesion@All');
    $router->post('Profesion', 'Profesion@Insert');
    $router->put('ProfesionActualizar', 'Profesion@Update');
    $router->get('Analisis', 'Analisis@All');
    $router->post('Analisis', 'Analisis@Insert');

    // administrador y empleado
    $router->get('Propuestas', 'Propuesta@All');
    $router->post('Propuesta', 'Propuesta@Insert');
    $router->get('PropuestasReclamos/{id}','Propuesta@ProposelOfClaim');
    $router->get('Reclamos', 'Reclamo@All');

    $router->post('logout', 'Auth@logout');

    $router->group(['middleware' => 'role:administrador'], function () use ($router) {
    });

});
