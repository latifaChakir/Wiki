<?php
session_start();

use App\Controllers\Admin\ArchiveWikiController;
use App\Router;
use App\Controllers\UserController;
use App\Controllers\Authentification;
use App\Controllers\Author\WikiController;
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

$router->get('/wiki', WikiController::class,'index');
$router->get('/addWiki', WikiController::class,'getaddWiki');
$router->post('/insertWiki', WikiController::class,'insertWiki');
$router->get('/editWiki', WikiController::class,'geteditWiki');
$router->post('/updateWiki', WikiController::class,'updateWiki');
$router->get('/deleteWiki', WikiController::class,'deleteWiki');

$router->get('/archives', ArchiveWikiController::class,'archivesWiki');
$router->get('/archiveArticle', ArchiveWikiController::class,'archiveArticle');
$router->get('/deactivateArticle', ArchiveWikiController::class,'archiveArticle');
$router->get('/deactivateArticle', ArchiveWikiController::class,'desarchiveArticle');
$router->get('/search', UserController::class,'search');
$router->get('/detail', UserController::class,'afficherDetail');



$router->dispatch();
