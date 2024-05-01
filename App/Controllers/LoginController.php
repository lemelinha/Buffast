<?php

namespace App\Controllers;
use Needs\Controller\Controller;
use App\Models\Login;

class LoginController extends Controller {
    public function index(){
        $this->render('login', '');
    }

    public function auth(){
        $user = $_POST['usuario']??'';
        $password = $_POST['senha']??'';

        $LoginModel = new Login();
        
        if($LoginModel->Auth($user, $password)){
            header('Location: /buffet/dashboard');
            die();
        }

        if($LoginModel->AuthAdmin($user, $password)){
            header('Location: /admin/dashboard');
            die();
        }

        $_SESSION['msg_erro'] = 'ERRO! Usuário ou senha inválido';
        header('Location: /login');
        die();
    }
}
