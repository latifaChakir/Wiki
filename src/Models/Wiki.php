<?php

namespace App\Models;

use App\Models\Database;
use PDO;
use PDOException;

class Wiki
{
    public $db;


    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function selectAllWikis()
    {
        // dump($_SESSION["id_author"]);
        if (isset($_SESSION["id_author"])) {
            $author = $_SESSION["id_author"];
        }
        $sql = "SELECT *,category.nom as category_name,tags.nom as tag_name, wikis.id as wiki_id  FROM wikis_tags 
        JOIN wikis ON wikis_tags.wikis_id=wikis.id
        JOIN tags ON wikis_tags.tag_id=tags.id
        join category ON wikis.category_id=category.id WHERE author_id=$author and archived=0";
        $res = $this->db->query($sql);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertWiki($title, $content, $category, $tags, $imagePathInDatabase, $author)
    {
        $uploadDir = __DIR__ . "/../../public/img/";

        if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {

            $uploadFileName = uniqid() . basename($_FILES['image_path']['name']);
            $uploadFile = $uploadDir . $uploadFileName;

            move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile);

            $imagePathInDatabase = $uploadFileName;
        }

        $sql = "INSERT INTO wikis (title, content, category_id,image_path,author_id) VALUES (:title, :content, :category_id, :image_path, :author_id)";
        $res = $this->db->prepare($sql);
        $res->bindParam(':title', $title);
        $res->bindParam(':content', $content);
        $res->bindParam(':category_id', $category);
        $res->bindParam(':image_path', $imagePathInDatabase);
        $res->bindParam(':author_id', $author);
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

    public function getWikiById($wikiId)
    {
        $author = isset($_SESSION['id_author']) ? $_SESSION['id_author'] :'';
        $query = "SELECT *,category.nom as category_nam FROM wikis_tags 
        JOIN wikis ON wikis_tags.wikis_id=wikis.id
        JOIN tags ON wikis_tags.tag_id=tags.id
        join category ON wikis.category_id=category.id WHERE author_id=$author and archived=0 and  wikis.id=$wikiId";
        $result = $this->db->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getTagsById($idWiki)
    {
        $query = "SELECT * FROM wikis_tags JOIN tags ON wikis_tags.tag_id=tags.id WHERE wikis_tags.wikis_id=:wikis_id";
        $result = $this->db->prepare($query);
        $result->bindParam(":wikis_id", $idWiki);
        $result->execute();
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function deleteWiki($idWiki)
    {
        $query = "DELETE FROM wikis WHERE id = :wikis_id";
        $result = $this->db->prepare($query);
        $result->bindParam(":wikis_id", $idWiki);
        $result->execute();

        if ($result) {
            header("Location: /wiki");
            exit();
        }
    }

    public function updateWiki($title, $content, $category, $tags, $idWiki)
    {
        $uploadDir = __DIR__ . "/../../public/img/";

        if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {

            $uploadFileName = uniqid() . basename($_FILES['image_path']['name']);
            $uploadFile = $uploadDir . $uploadFileName;

            move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile);

            $imagePathInDatabase = $uploadFileName;
        }
        $sql = "UPDATE wikis SET title = :title, content = :content, category_id = :category_id, image_path = :image_path, update_date = NOW() WHERE id = :id";
        $result = $this->db->prepare($sql);
        $result->bindParam(":title", $title);
        $result->bindParam(":content", $content);
        $result->bindParam(":category_id", $category);
        $result->bindParam(":image_path", $imagePathInDatabase);
        $result->bindParam(":id", $idWiki);
        $result->execute();

        $sqlUpdateTags = "UPDATE wikis_tags SET tag_id = :tag_id WHERE wikis_id=:wiki_id";
        $resultUpdateTags = $this->db->prepare($sqlUpdateTags);

        foreach ($tags as $tagId) {
            $resultUpdateTags->bindParam(":wiki_id", $idWiki);
            $resultUpdateTags->bindParam(":tag_id", $tagId);
            $resultUpdateTags->execute();

            header("Location: /wiki");
        }
    }

    public function getAllArticles(){
        $sql = "SELECT *,category.nom as category_name,tags.nom as tag_name, wikis.id as wiki_id  FROM wikis_tags 
        JOIN wikis ON wikis_tags.wikis_id=wikis.id
        JOIN tags ON wikis_tags.tag_id=tags.id
        join category ON wikis.category_id=category.id WHERE archived=0";
        $res = $this->db->query($sql);
        $results = $res->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function archive($id){
        $sql = "UPDATE wikis SET archived=1 WHERE id=:id";
        $res = $this->db->prepare($sql);
        $res->bindParam(":id", $id);
        $res->execute();
        header("Location:/archives");

    }

    public function getTotalArticleArchive()
    {
        $query = "SELECT COUNT(*) as total_wikis_archives FROM wikis where archived=1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["total_wikis_archives"];
    }

    public function getTotalArticleNonArchive()
    {
        $query = "SELECT COUNT(*) as total_n_archives FROM wikis where archived=0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["total_n_archives"];
    }

   

}
