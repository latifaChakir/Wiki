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
            $uploadDir = __DIR__ . "/../../../public/img/";
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $category = htmlspecialchars($_POST['category_id']);
            $tags = isset($_POST['tags']) ? $_POST['tags'] : array(); 

            if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {
    
                $uploadFileName = uniqid() . basename($_FILES['image_path']['name']);
                $uploadFile = $uploadDir . $uploadFileName;
    
                move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile);
    
                $imagePathInDatabase = $uploadFileName;
            }
            $author = isset($_SESSION['id_author']) ? $_SESSION['id_author'] :'';
            $wiki = new Wiki();
            $wiki->insertWiki($title, $content, $category, $tags,$imagePathInDatabase,$author);
            header("Location: /wiki");
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

public function updateWiki() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idWiki = $_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $category = htmlspecialchars($_POST['category_id']);
        $tags = isset($_POST['tags']) ? $_POST['tags'] : array();

        $wiki = new Wiki();
        $wiki->updateWiki($title, $content, $category,$tags, $idWiki);

        header("Location: /wiki");
    }
}


public function deleteWiki(){
    if(isset($_GET['id'])){
        $idWiki = $_GET['id'];
    }
    $delwiki=new Wiki();
    $delwiki->deleteWiki($idWiki);
    header("Location: /wiki");
}
    
}