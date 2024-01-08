<?php
session_start();

use App\Router;
use App\Controllers\UserController;
use App\Controllers\Authentification;
use App\Controllers\Author\AuthorController;
use App\Controllers\Admin\CategoryController;

$router = new Router();
$router->get('/', UserController::class, 'index');
$router->get('/login', Authentification::class, 'getLogin');
$router->post('/login', Authentification::class, 'login');
$router->get('/register', Authentification::class, 'getRegister');
$router->post('/register', Authentification::class, 'register');
$router->get('/category', CategoryController::class,'getCategories');
$router->post('/addCategory', CategoryController::class,'addCategory');
$router->get('/author', AuthorController::class,'index');

$router->dispatch();
