<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Login;

class IndexController extends Controller { 
    public function Index() {
        $this->renderView('landing');
    }
    
    public function Login() {
        if (isset($_SESSION['id'])) {
            header('Location: /painel/produtos');
            die();
        }
        $this->renderView('login');
    }
    
    public function LoginAuth() {
        if (isset($_SESSION['id'])) {
            header('Location: /painel/produtos');
            die();
        }

        if (Login::LoginAuth($_POST['email'], $_POST['senha'])) {
            header('Location: /painel/produtos');
            die();
        }

        $_SESSION['msg'] = 'Email ou senha inválidos';
        header('Location: /login');
        die();
    }
    
    public function Logout() {
        Login::Logout();
        header('Location: /login');
        die();
    }
}
