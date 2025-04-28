<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH
$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// DASHBOARD
$routes->get('/admin', 'DashboardController::adminDashboard', ['filter' => 'role:admin']);
$routes->get('/user', 'DashboardController::userDashboard', ['filter' => 'role:user']);

// MONITORING USER (admin only)
$routes->get('/admin/monitoring', 'DashboardController::monitoring', ['filter' => 'role:admin']);

// ADMIN - CRUD PRODUK
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    $routes->get('produk', 'ProductController::index');
    $routes->get('produk/create', 'ProductController::create');
    $routes->post('produk/store', 'ProductController::store');
    $routes->get('produk/edit/(:num)', 'ProductController::edit/$1');
    $routes->post('produk/update/(:num)', 'ProductController::update/$1');
    $routes->get('produk/delete/(:num)', 'ProductController::delete/$1');
});

// PRODUK & KERANJANG (untuk admin & user)
$routes->group('home', function($routes) {
    $routes->get('produk', 'HomeController::produk');
    $routes->get('tambah-ke-keranjang/(:num)', 'HomeController::tambahKeKeranjang/$1');
    $routes->get('keranjang', 'HomeController::keranjang');
    $routes->get('hapus-keranjang/(:num)', 'HomeController::hapusKeranjang/$1');
});
