<?php 
namespace App\Controllers\Admin;
use App\Controller;
use App\Controllers\Authentification;
use App\Models\Wiki;
use App\Models\Category;
use App\Models\tag;
class ArchiveWikiController extends Controller {

    public function archivesWiki(){
        $user = new Authentification();
        if (!$user->is_admin()) {
            $this->render('403');
        } else {
        $article = new Wiki();
        $articles=$article->getAllArticles();
        $this->render('admin/archive',['articles'=>$articles]);
    }
}

    public function archiveArticle(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $archive = new Wiki();
        $archive->archive($id);
        header("Location:/archives");
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