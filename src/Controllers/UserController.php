<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Wiki;

class UserController extends Controller
{
    public function index()
    {
        $wiki=new Wiki();
        $results=$wiki->getAllArticles();
        $this->render('index',['articles'=>$results]);
    }

    public function search(){
        $search = $_GET['search'];
        $model = new Wiki();
        $results = $model->search($search);
        $this->render('search', ['articles' => $results]);
    }
}