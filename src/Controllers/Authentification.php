<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;
class Authentification extends Controller
{
    public function getLogin(){
        $this->render('login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
            $user = new User();
            $utilisateur = $user->login($email, $password);
            if ($utilisateur) {
                $_SESSION["role"] = $utilisateur["role"];
                $_SESSION["id_author"] = $utilisateur["id"];
                $_SESSION["username"] = $utilisateur["username"];
                if ($_SESSION['role'] == 'admin') {
                    header('Location: /category');
                    exit();
                } elseif ($_SESSION['role'] == 'author') {
                    header('Location: /wiki');
                    exit();
                }
            } else {
                die('Login failed');
            }
        }
    }
    

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
            $user = new User();
            $user->register($username, $password, $email);
            header('location:/login');
        }
    }
    
    
    public function getRegister(){
        $this->render('/register');
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location:/');
    }

    public function is_admin()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            return true;
        }
        return false;
    }

    public function is_author()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'author') {
            return true;
        }
        return false;
    }
    
}