<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;
class Authentification extends Controller
{
    public function getLogin(){
        $this->render('login');
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email =isset($_POST['email']) ? $_POST['email'] : '';
            $password =isset($_POST['password']) ? $_POST['password'] :'';
            $user = new User();
            $user->login($email,$password);

        }


    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username =isset($_POST['username']) ? $_POST['username'] : '';
            $email =isset($_POST['email']) ? $_POST['email'] : '';
            $password =isset($_POST['password']) ? $_POST['password'] : '';
            $user=new User();
            $user->register($username, $password, $email);
        }
    }
    

    public function getRegister(){
        $this->render('/register');
    }

    public function logout(){
        $user=new User();
        $user->logout();
    }

}