<?php

namespace App\Controllers\Admin;
use App\Models\Category;

use App\Controller;
class CategoryController extends Controller
{
    

    public function getCategories(){
        $category=new Category();
        $categories=$category->getAllCategories();
        $this->render('admin/category/index',['categories' => $categories]);
    }

    public function addCategory(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom'])){
            $nom = $_POST['nom'];
        }
        $category=new Category();
        $category->addCategory($nom);
    }
}