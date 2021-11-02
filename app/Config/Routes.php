<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

//$routes->get('/yuki', 'Home::index');
//$routes->get('/contact', 'Home::getContact');
//$routes->get('/biodata', 'Home::fungsiBaru'); //error karena belum ada parameternya
//$routes->get('/biodata/(:alpha)/(:num)', 'Home::fungsiBaru/$1/$2'); //pindah ke controller Biodata
//$routes->get('/biodata/(:alpha)/(:num)', 'Biodata::fungsiBaru/$1/$2'); //pertemuan 2
//$routes->get('/biodata/(:alpha)', 'Biodata::fungsiNama/$1'); //routing fungsiNama
//$routes->get('/', 'Home::index');

$routes->get('/', 'Templating::register');

$routes->get('/home', function() {
	//return view('v_home');
	$data = [
		'title' => "Blog - Home",
	];
	echo view('layout/header', $data);
    echo view('layout/navbar');
    echo view('v_home');
    echo view('layout/footer');
});

$routes->get('/admin', 'Templating::index');
// $routes->get('/register', 'Templating::register');
$routes->post('/saveRegister', 'Templating::saveRegister');

$routes->get('/posts', 'PostController::index');

$routes->get('/about', function() {
	//return view('v_about');
	$data = [
		'title' => "Blog - About",
	];
	echo view('layout/header', $data);
    echo view('layout/navbar');
    echo view('v_about');
    echo view('layout/footer');
});

$routes->get('admin/posts', 'AdminPostsController::index');
$routes->get('admin/posts/create', 'AdminPostsController::create');
$routes->post('admin/posts/store', 'AdminPostsController::store');
$routes->delete('admin/posts/(:num)', 'AdminPostsController::delete/$1');
$routes->get('admin/posts/edit/(:num)', 'AdminPostsController::edit/$1');
$routes->post('admin/posts/update/(:num)', 'AdminPostsController::update/$1');


$routes->get('admin/users', 'AdminUsers::index');
$routes->get('admin/users/create', 'AdminUsers::create');
$routes->get('admin/users/edit/(:num)', 'AdminUsers::edit/$1');
$routes->post('admin/users/save', 'AdminUsers::save');
$routes->delete('admin/users/(:num)', 'AdminUsers::delete/$1');
$routes->post('admin/users/ubah/(:num)', 'AdminUsers::ubah/$1');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
