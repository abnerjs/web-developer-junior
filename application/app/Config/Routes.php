<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\UserController;
use App\Controllers\PostController;

/**
 * @var RouteCollection $routes
 */

// Posts Routes
$routes->get('/', 'PostController::index');
$routes->get('posts', 'PostController::index');
$routes->get('posts/create', 'PostController::create');
$routes->post('posts/store', 'PostController::store');

$routes->get('posts/edit/(:num)', 'PostController::edit/$1');
$routes->post('posts/update/(:num)', 'PostController::update/$1');
$routes->get('posts/show/(:num)', 'PostController::show/$1');
$routes->get('posts/delete/(:num)', 'PostController::delete/$1');
$routes->get('posts/all', 'PostController::all');
$routes->get('posts/search', 'PostController::search');

// User Routes
$routes->get('users/login', 'UserController::login');
$routes->post('users/login', 'UserController::login');

$routes->get('users/register', 'UserController::register');
$routes->post('users/register', 'UserController::register');

$routes->get('users/profile', 'UserController::profile');
$routes->get('users/logout', 'UserController::logout');

