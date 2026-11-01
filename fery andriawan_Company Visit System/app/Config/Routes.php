<?php
//tes API DI POSTMAN//
 use App\Controllers\Tes;
// //tes API DI POSTMAN//
$routes->get('login', 'AuthController::login');
$routes->post('auth', 'AuthController::auth');
$routes->get('logout', 'AuthController::logout');

//tes API DI POSTMAN//
$routes->get('/ambil', [Tes::class, 'contohGet']);
$routes->post('/kirim', [Tes::class, 'contohPost']);
//tes API DI POSTMAN//

$routes->group('', ['filter' => 'auth'], function($routes) {
    // Arahkan root ke dashboard
    $routes->get('/', 'DashboardController::index');
    
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('dashboard/report', 'DashboardController::report');
    
    $routes->get('pengunjung', 'PengunjungController::index');
    $routes->get('pengunjung/create', 'PengunjungController::create');
    $routes->post('pengunjung/store', 'PengunjungController::store');
    $routes->get('pengunjung/edit/(:num)', 'PengunjungController::edit/$1');
    $routes->post('pengunjung/update/(:num)', 'PengunjungController::update/$1');
    $routes->get('pengunjung/exportExcel', 'PengunjungController::exportExcel');
    $routes->get('pengunjung/exportpdfall', 'PengunjungController::exportpdfall');


    //$routes->get('pengunjung/exportpdfall', 'PengunjungController::exportpdfall');
    // Perbaikan rute delete: pindahkan ke sini atau sesuaikan group admin
    $routes->post('pengunjung/delete/(:num)', 'PengunjungController::delete/$1');
});

$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    $routes->delete('pengunjung/delete/(:num)', 'PengunjungController::delete/$1');
});