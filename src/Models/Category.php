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
}