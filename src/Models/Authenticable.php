<?php

namespace App\Models;

interface Authenticable
{
    public function login($email, $password);
    public function logout();
    public function register($username, $password, $email);
}