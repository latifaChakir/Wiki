<?php
namespace App\Models;
use App\Models\Database;
use PDO;
class Category {
    public $db;

    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getAllCategories(){
        $query = "SELECT * FROM category";
        $result = $this->db->query($query);
        $categories = $result->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function addCategory($nom){
        $query = "INSERT INTO category(nom) values('$nom')";
        $result =$this->db->query($query);
        if($result){
            header('Location: /category');
        }
    }

    public function deleteCategory($idCategory){
        $query ="DELETE FROM category WHERE id='$idCategory'";
        $result = $this->db->query($query);
        if($result){
            header('Location: /category');
        }
    }

    public function getCategoryById($idCategory){
        $query = "SELECT * FROM CATEGORY WHERE id='$idCategory'";
        $result = $this->db->query($query);
        $results=$result->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function updateCategory($idCategory,$nom){
        $query = "UPDATE category SET nom='$nom' WHERE id='$idCategory'";
        $result=$this->db->query($query);
        if($result){
            header("Location:/category");
            }   
         }
}