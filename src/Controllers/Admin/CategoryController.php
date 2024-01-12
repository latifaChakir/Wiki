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
            $nom = htmlspecialchars($_POST['nom']);
        }
        $category=new Category();
        $category->addCategory($nom);
        header('Location: /category');
    }

    public function deleteCategory(){
        if(isset($_GET['id'])){
            $idCategory = $_GET['id'];
        }
        $category =new Category();
        $category->deleteCategory($idCategory);
        header('Location: /category');
    }
    public function getCategory(){
        if(isset($_GET['id'])){
            $idCategory = $_GET['id'];
        }
        $category =new Category();
        $results=$category->getCategoryById($idCategory);
        $this->render('admin/category/editCategory',['results'=>$results]);
    }

    public function updateCategory(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom =htmlspecialchars($_POST['nom']);
            $idCategory = $_POST['id'];
            $category=new Category();
            $category->updateCategory($idCategory,$nom);
            header('Location: /category');
        }
    }
}