<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->post('login', 'Auth@login');
$router->get('/', function () use ($router) {
    echo 'apiv1';
});

$router->group(['middleware' => 'auth'], function() use ($router){




    $router->group(['middleware' => 'role:administrador'], function() use ($router){
    });
    $router->group(['middleware' => 'role:básico'], function() use ($router){
    });
    $router->post('logout','Auth@logout');

});
