<?php 
namespace App\Controllers\Admin;
use App\Controller;
use App\Models\Wiki;
use App\Models\Category;
use App\Models\tag;
class ArchiveWikiController extends Controller {

    public function archivesWiki(){
        $article = new Wiki();
        $articles=$article->getAllArticles();
        $this->render('admin/archive',['articles'=>$articles]);
    }

    public function archiveArticle(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $archive = new Wiki();
        $archive->archive($id);
    }

    public function afficheStatistique(){
        $categorie=new Category();
        $categories=$categorie->getTotalCategories();
        $tag=new Tag();
        $tags=$tag->getTotalTages();
        $wiki=new Wiki();
        $wikisArchives=$wiki->getTotalArticleArchive();
        $wikisNonArchives=$wiki->getTotalArticleNonArchive();
        $this->render('admin/dashboard',['categories'=>$categories,'tags'=>$tags,'wikisarchives'=>$wikisArchives,'wikisnonarchives'=>$wikisNonArchives]);

    }

}