<?php

namespace App\Controllers\Author;

use App\Controller;
class AuthorController extends Controller
{
    public function index()
    {
        $this->render('author/wiki/index');
    }
}