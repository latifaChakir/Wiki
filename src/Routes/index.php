<?php
session_start();

use App\Router;
use App\Controllers\UserController;
use App\Controllers\Authentification;

$router = new Router();
$router->get('/user', UserController::class, 'index');
$router->get('/login', Authentification::class, 'getLogin');
$router->post('/login', Authentification::class, 'login');
$router->get('/register', Authentification::class, 'getRegister');
$router->post('/register', Authentification::class, 'register');

$router->dispatch();
