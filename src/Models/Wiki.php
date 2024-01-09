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

    public function insertWiki($title, $content, $category, $tags){
       
            $sql = "INSERT INTO wikis (title, content, category_id) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $content);
            $stmt->bindParam(3, $category);
            $stmt->execute();
    
            if ($stmt) {
                $getLastId = "SELECT LAST_INSERT_ID() as last_id";
                $result = $this->db->query($getLastId);
                $result = $result->fetch(PDO::FETCH_ASSOC);
    
                if ($result && isset($result['last_id'])) {
                    $wikiId = $result['last_id'];
                    
                    foreach ($tags as $tagId) {
                        $tagSql = "INSERT INTO wikis_tags (wikis_id, tag_id) VALUES (?, ?)";
                        $tagStmt = $this->db->prepare($tagSql);
                        $tagStmt->bindParam(1, $wikiId);
                        $tagStmt->bindParam(2, $tagId);
                        $tagStmt->execute();
                    }
    
                    header("Location: /wiki");
                } 
            }
       
    }
    
    
    
}