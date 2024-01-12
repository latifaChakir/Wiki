<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class Tag
{
    public $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllTags()
    {
        $query = "SELECT * FROM tags";
        $result = $this->db->query($query);
        $tags = $result->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }

    public function addTag($nom)
{
    $query = "INSERT INTO tags(nom) VALUES(:nom)";
    $result = $this->db->prepare($query);
    $result->bindParam(':nom', $nom);
    $result->execute();
}

public function deleteTag($idTag)
{
    $query = "DELETE FROM tags WHERE id = :idTag";
    $result = $this->db->prepare($query);
    $result->bindParam(':idTag', $idTag);
    $result->execute();
}

public function updateTag($idTag, $nom)
{
    $query = "UPDATE tags SET nom = :nom WHERE id = :idTag";
    $result = $this->db->prepare($query);
    $result->bindParam(':nom', $nom);
    $result->bindParam(':idTag', $idTag);
    $result->execute();
}


    public function getTagById($idTag)
    {
        $query = "SELECT * FROM tags WHERE id='$idTag'";
        $result = $this->db->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
  

    public function getTotalTages()
    {
        $query = "SELECT COUNT(*) as total_tags FROM tags";
        $result = $this->db->prepare($query);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res["total_tags"];
    }
}
