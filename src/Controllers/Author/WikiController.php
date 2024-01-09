<?php

namespace App\Controllers\Author;

use App\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Wiki;
class WikiController extends Controller
{
    public function index()
    {
        $this->render('author/wiki/index');
    }

    public function getaddWiki(){
        $tag = new Tag();
        $tags=$tag->getAllTags();
        $wiki = new Category();
        $results = $wiki->getAllCategories();
        $this->render('author/wiki/addWiki',['categories'=>$results, 'tags'=>$tags]);
    }

    public function insertWiki(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category_id'];
            $tags = isset($_POST['tags']) ? $_POST['tags'] : array(); 
            $wiki = new Wiki();
            $wiki->insertWiki($title, $content, $category, $tags);
        }
    }
    
}