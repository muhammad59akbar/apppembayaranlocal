<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Pembayaran::index');

// $routes->get('/billing/Admin/DataUser', 'Admin::index');
// $routes->post('/billing/Admin/Tambahuser', 'Admin::Tambah');

$routes->group('billing/Admin', function ($routes) {
    $routes->get('DataUser', 'Admin::index');
    $routes->post('tambahUser', 'Admin::TambahUser');
    $routes->get('detailMember/(:segment)', 'Admin::detailMember/$1');
    $routes->post('updateMember/(:num)', 'Admin::updateMember/$1');
    $routes->delete('deleteMember/(:num)', 'Admin::DeleteMember/$1');
});

$routes->group('billing/customer', function ($routes) {
    $routes->get('List_Customer', 'Customer::index');
    $routes->post('addCust', 'Customer::tambahCustomer');
    $routes->get('SuratJalan/(:segment)', 'Customer::suratJalan/$1');
});
