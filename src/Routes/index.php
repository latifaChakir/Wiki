<?php
session_start();

use App\Router;
use App\Controllers\UserController;
use App\Controllers\Authentification;
use App\Controllers\Author\AuthorController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\TagController;

$router = new Router();
$router->get('/', UserController::class, 'index');
$router->get('/login', Authentification::class, 'getLogin');
$router->post('/login', Authentification::class, 'login');
$router->get('/logout', Authentification::class, 'logout');
$router->get('/register', Authentification::class, 'getRegister');
$router->post('/register', Authentification::class, 'register');
$router->get('/category', CategoryController::class,'getCategories');
$router->post('/addCategory', CategoryController::class,'addCategory');
$router->get('/deleteCategory', CategoryController::class,'deleteCategory');
$router->get('/editCategory', CategoryController::class,'getCategory');
$router->post('/updateCategory', CategoryController::class,'updateCategory');
$router->get('/tags', TagController::class,'getTags');
$router->post('/addTag', TagController::class,'addTag');
$router->get('/deleteTag', TagController::class,'deleteTag');
$router->get('/editTag', TagController::class,'getTag');
$router->post('/updateTag', TagController::class,'updateTag');

$router->get('/author', AuthorController::class,'index');

$router->dispatch();
