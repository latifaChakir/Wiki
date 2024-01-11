<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Wiki;
use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        $categorie=new Category();
        $categories=$categorie->getAllCategories();
        $wiki=new Wiki();
        $results=$wiki->getAllArticles();
        
        $this->render('index',['articles'=>$results,'categories' => $categories]);
    }

   

   public function search()
   {
       $search = $_GET['search'];
       $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
       $model = new Wiki();
       $searchResults = $model->search($search, $currentPage);
    //    var_dump($search);
    //    var_dump($currentPage);

       $this->render('search', [
           'articles' => $searchResults['results'],
           'currentPage' => $currentPage,
           'search' => $search,
           'totalPages' => $searchResults['totalPages']
       ]);
   }


    public function afficherDetail(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
       
        $detail = new Wiki();
        $details=$detail->getWikiById($id);
        $this->render('detailwiki',['article' => $details]);
    }
}