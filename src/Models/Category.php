<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class Category
{
    public $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM category order by created_at DESC";
        $result = $this->db->query($query);
        $categories = $result->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function addCategory($nom)
    {
        $query = "INSERT INTO category(nom) VALUES(:nom)";
        $res = $this->db->prepare($query);
        $res->bindParam(':nom', $nom);
        $res->execute();
    }

    public function deleteCategory($idCategory)
    {
        $query = "DELETE FROM category WHERE id = :idCategory";
        $res = $this->db->prepare($query);
        $res->bindParam(':idCategory', $idCategory);
        $res->execute();
    }

    public function updateCategory($idCategory, $nom)
    {
        $query = "UPDATE category SET nom = :nom WHERE id = :idCategory";
        $res = $this->db->prepare($query);
        $res->bindParam(':nom', $nom);
        $res->bindParam(':idCategory', $idCategory);
        $res->execute();
    }


    public function getCategoryById($idCategory)
    {
        $query = "SELECT * FROM CATEGORY WHERE id='$idCategory'";
        $result = $this->db->query($query);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }


    public function getTotalCategories()
    {
        $query = "SELECT COUNT(*) as total_categories FROM category";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["total_categories"];
    }
}
