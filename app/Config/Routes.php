<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// ======================== Dev Page Routes ===================================================
$routes->get('/', 'Page::index');
$routes->get('/table', 'Page::table');
$routes->view('/blank', 'blank');
$routes->view('/about', 'about');
$routes->get('/dev/sign', 'Page::sign');

// EXAMPLE WITH FILTER AUTH
// $routes->get('/api/user', 'User::read', ['filter' => 'authMiddleware']);

$routes->get('/(:num)/test/(:num)', 'Home::index/$1/$2'); // #/:id1/test/:id2
// ====== API ROUTE :: USER ======
$routes->get('/api/user', 'User::read');
$routes->put('/api/user/(:any)', 'User::edit/$1');
$routes->delete('/api/user/(:any)', 'User::delete/$1');
$routes->post('/api/user', 'User::create');
$routes->post('/api/user/login', 'User::login');

// ====== API ROUTE :: DIVISI ======
$routes->get('/api/divisi', 'Divisi::read');
$routes->put('/api/divisi/(:any)', 'Divisi::edit/$1');
$routes->delete('/api/divisi/(:any)', 'Divisi::delete/$1');
$routes->post('/api/divisi', 'Divisi::create');

// ====== API ROUTE :: DEPARTEMEN ======
$routes->get('/api/departemen', 'Departemen::read');
$routes->put('/api/departemen/(:any)', 'Departemen::edit/$1');
$routes->delete('/api/departemen/(:any)', 'Departemen::delete/$1');
$routes->post('/api/departemen', 'Departemen::create');

// ====== API ROUTE :: HISTORY ASET ======
$routes->get('/api/history-aset', 'HistoryAset::read');
$routes->put('/api/history-aset/(:any)', 'HistoryAset::edit/$1');
$routes->delete('/api/history-aset/(:any)', 'HistoryAset::delete/$1');
$routes->post('/api/history-aset', 'HistoryAset::create');

// ====== API ROUTE :: HISTORY PENGAMBILAN ======
$routes->get('/api/history-pengambilan', 'HistoryPengambilan::read');
$routes->put('/api/history-pengambilan/(:any)', 'HistoryPengambilan::edit/$1');
$routes->delete('/api/history-pengambilan/(:any)', 'HistoryPengambilan::delete/$1');
$routes->post('/api/history-pengambilan', 'HistoryPengambilan::create');

// ====== API ROUTE :: MEMBER DIGITALENT ======
$routes->get('/api/member-digitalent', 'MemberDigitalent::read');
$routes->put('/api/member-digitalent/(:any)', 'MemberDigitalent::edit/$1');
$routes->delete('/api/member-digitalent/(:any)', 'MemberDigitalent::delete/$1');
$routes->post('/api/member-digitalent', 'MemberDigitalent::create');

// ====== API ROUTE :: MEMBER PROGRAM ======
$routes->get('/api/member-program', 'MemberProgram::read');
$routes->put('/api/member-program/(:any)', 'MemberProgram::edit/$1');
$routes->delete('/api/member-program/(:any)', 'MemberProgram::delete/$1');
$routes->post('/api/member-program', 'MemberProgram::create');

// ====== API ROUTE :: TALENT PROGRAM ======
$routes->get('/api/talent-program', 'TalentProgram::read');
$routes->put('/api/talent-program/(:any)', 'TalentProgram::edit/$1');
$routes->delete('/api/talent-program/(:any)', 'TalentProgram::delete/$1');
$routes->post('/api/talent-program', 'TalentProgram::create');

// ====== API ROUTE :: STOK ASET ======
$routes->get('/api/stok-aset', 'StokAset::read');
$routes->put('/api/stok-aset/(:any)', 'StokAset::edit/$1');
$routes->delete('/api/stok-aset/(:any)', 'StokAset::delete/$1');
$routes->post('/api/stok-aset', 'StokAset::create');





// ============= Test Relation Routes =================
$routes->get('/relation/m2m', 'Related::ManyToMany');
$routes->get('/relation/o2m', 'Related::OneToMany');
$routes->get('/relation/o2o', 'Related::OneToOne');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}