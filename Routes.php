<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/veterinario','Propietario::index');
$routes->post('/veterinario/guardar','Propietario::guardar');
$routes->post('/veterinario/guardar_mascota', 'Mascota::guardar');
$routes->get('/veterinario/editar/(:num)','Propietario::editar/$1');
$routes->post('/veterinario/actualizar/(:num)','Propietario::actualizar/$1');
$routes->post('/mascota/actualizar/(:num)', 'Mascota::actualizar/$1');
$routes->get('/veterinario/eliminar/(:num)','Propietario::eliminar/$1');
$routes->get('/mascota/eliminar/(:num)','Mascota::eliminar/$1');