<?php

namespace App\Models;
use App\Models\Database;
use PDO;
class User implements Authenticable{
    public $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }
  
    public function register($username,$password,$email){
        $Hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username,password,email,role) VALUES ('$username','$Hashedpassword', '$email','author')";
        $result = $this->db->query($query);
        header('location:/login');
        return $result;
    }

    public function login($email,$password){
        $query = "SELECT * FROM users WHERE email= '$email'";
        $result=$this->db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if($result->rowCount() > 0){
            if(password_verify($password, $row["password"])){
                if($row['role']=='admin'){
                    header('Location: /register');
                }elseif($row['role']== 'author'){
                    header('Location: /register');
                }

            }
        }
    }
    public function logout(){}


}