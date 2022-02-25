<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Page::login', ['filter' => 'guest']);
$routes->get('home', 'Home::index', ['filter' => 'isLoggedIn']);
$routes->get('about', 'Page::about');
$routes->match(['get', 'post'], 'contact', 'Page::contact');
$routes->get('signup', 'Page::signup', ['filter' => 'guest']);
$routes->post('signup', 'User::register', ['filter' => 'guest']);
$routes->get('login', 'Page::login', ['filter' => 'guest']);
$routes->post('login', 'User::login', ['filter' => 'guest']);
$routes->get('logout', 'User::logout', ['filter' => 'isLoggedIn']);
$routes->get('users/(:num)/profile', 'User::profile/$1', ['filter' => 'isLoggedIn']);
$routes->post('users/(:num)/profile', 'User::updateProfile/$1', ['filter' => 'isLoggedIn']);
$routes->post('users/password', 'User::changePassword', ['filter' => 'isLoggedIn']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}