<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('produk', function ($routes) {
    $routes->get('/', 'produk::index');
    $routes->get('add', 'produk::add');
    $routes->post('create', 'produk::create');
    $routes->post('upload', 'produk::insert');
    $routes->get('upload/(:segment)', 'produk::show/$1');
    $routes->get('edit/(:segment)', 'produk::edit/$1');
    $routes->post('update/(:segment)', 'produk::update/$1');
    $routes->get('delete/(:segment)', 'produk::delete/$1');

});
$routes->get('uploads/(:segment)', 'Uploads::show/$1');

$routes->group('pesan', function ($routes) {
    $routes->get('/', 'pesan::index');
    $routes->get('add', 'pesan::add');
    $routes->post('create', 'pesan::create');
    $routes->get('edit/(:segment)', 'pesan::edit/$1');
    $routes->post('update/(:segment)', 'pesan::update/$1');
    $routes->get('delete/(:segment)', 'pesan::delete/$1');
});

$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->setAutoRoute(true);