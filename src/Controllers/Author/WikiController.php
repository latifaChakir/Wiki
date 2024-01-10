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
        $wiki=new Wiki();
        $wikis=$wiki->selectAllWikis();
        $this->render('author/wiki/index',['wikis'=>$wikis]);
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
            $image_path = $_POST['image_path'];
            $author = isset($_SESSION['id_author']) ? $_SESSION['id_author'] :'';
            $wiki = new Wiki();
            $wiki->insertWiki($title, $content, $category, $tags,$image_path,$author);
        }
    }

   public function geteditWiki(){
    if(isset($_GET['id'])){
        $idWiki = $_GET['id'];
    }
    
    $tag = new Wiki();
    $tags = $tag->getTagsById($idWiki);

    $tag = new Tag();
    $tagg = $tag->getAlltags();
    
    $wiki = new Wiki();
    $wikiInfo = $wiki->getWikiById($idWiki);
    $combinedWikiInfo = [
        'wikiso' => $wikiInfo[0]
    ];
    $wiki=new Category();
    $categories = $wiki->getAllCategories(); 
    
    $this->render('author/wiki/editWiki', ['wikis' => $combinedWikiInfo, 'categories' => $categories,'tags'=>$tags,'tagg'=>$tagg]);
}

public function updateWiki(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idWiki = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category_id'];
        $tags = isset($_POST['tags']) ? $_POST['tags'] : array(); 
       
        $wiki = new Wiki();
        $wiki->updateWiki($title, $content, $category, $tags,$idWiki);


    }

}

public function deleteWiki(){
    if(isset($_GET['id'])){
        $idWiki = $_GET['id'];
    }
    $delwiki=new Wiki();
    $delwiki->deleteWiki($idWiki);
}
    
}