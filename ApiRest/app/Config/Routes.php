<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/usuarios', 'UsuariosController::index');
$routes->get('roles', 'RolesController::index');
$routes->get('modulos', 'ModulosController::index');

$routes->get('/login', 'AuthController::login');
$routes->post('/auth', 'AuthController::auth');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/usuarios/agregar', 'UsuariosController::agregar');
$routes->post('/usuarios/guardar', 'UsuariosController::guardar');

$routes->resource('usuarios_api', ['controller' => 'UsuariosApiController']);

$routes->resource('roles_api', ['controller' => 'RolesApiController']);

$routes->resource('modulos_api', ['controller' => 'ModulosApiController']);