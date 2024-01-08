<?php

namespace App\Controllers;

use App\Controller;
class UserController extends Controller
{
    public function index()
    {
        $this->render('index');
    }
}