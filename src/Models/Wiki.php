<?php
namespace App\Models;
use App\Models\Database;
use PDO;
use PDOException;
class Wiki {
    public $db;
    

    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function selectAllWikis(){
        $sql= "SELECT * FROM wikis_tags 
        JOIN wikis ON wikis_tags.wikis_id=wikis.id
        JOIN tags ON wikis_tags.tag_id=tags.id";
        $res=$this->db->query($sql);
        $result =$res->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertWiki($title, $content, $category, $tags){
       
            $sql = "INSERT INTO wikis (title, content, category_id) VALUES (:title, :content, :category_id)";
            $res = $this->db->prepare($sql);
            $res->bindParam(':title', $title);
            $res->bindParam(':content', $content);
            $res->bindParam(':category_id', $category);
            $res->execute();
    
            if ($res) {
                $getLastId = "SELECT LAST_INSERT_ID() as last_id";
                $result = $this->db->query($getLastId);
                $result = $result->fetch(PDO::FETCH_ASSOC);
    
                if ($result && isset($result['last_id'])) {
                    $wikiId = $result['last_id'];
                    
                    foreach ($tags as $tagId) {
                        $tagSql = "INSERT INTO wikis_tags (wikis_id, tag_id) VALUES (:wikis_id, :tag_id)";
                        $tagStmt = $this->db->prepare($tagSql);
                        $tagStmt->bindParam('wikis_id', $wikiId);
                        $tagStmt->bindParam('tag_id', $tagId);
                        $tagStmt->execute();
                    }
    
                    header("Location: /wiki");
                } 
            }
       
    }
    
    
    
}