<?php

namespace App\Controllers\Admin;
use App\Models\Tag;

use App\Controller;
class TagController extends Controller
{
    public function getTags(){
        $tag=new Tag();
        $tags=$tag->getAllTags();
        $this->render('admin/tag/index',['tags' => $tags]);
    }

    public function addTag(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom'])){
            $nom = $_POST['nom'];
        }
        $tag=new Tag();
        $tag->addTag($nom);
    }

    public function deleteTag(){
        if(isset($_GET['id'])){
            $idTag = $_GET['id'];
        }
        $tag =new Tag();
        $tag->deleteTag($idTag);
    }
    public function getTag(){
        if(isset($_GET['id'])){
            $idTag = $_GET['id'];
        }
        $tag =new Tag();
        $results=$tag->getTagById($idTag);
        $this->render('admin/tag/editTag',['results'=>$results]);
    }

    public function updateTag(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom =$_POST['nom'];
            $idTag = $_POST['id'];
            $tag=new Tag();
            $tag->updateTag($idTag,$nom);
        }
    }

}