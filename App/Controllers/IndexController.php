<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Login;
use App\Models\Register;
use App\Tools\Tools;

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
    
    public function Registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->renderView('registro');
            die();
        }

        if (Tools::CNPJExists($_POST['cnpj'])) {
            $_SESSION['msg'] = "CNPJ já cadastrado";
            header('Location: /registro');
            die();
        }

        if (Tools::EmailExists($_POST['email'])) {
            $_SESSION['msg'] = "Email já cadastrado";
            header('Location: /registro');
            die();
        }
        
        $id = Tools::UUID();
        
        $pfp = '/assets/images/test2.jpg';
        if (!empty($_FILES['pfp'])) {
            $pfp = Tools::UploadImage($id, $_FILES['pfp'], true);
            if (!$pfp['ok']) {
                $_SESSION['msg'] = $pfp['msg'];
                header('Location: /registro');
                die();
            }
        }

        Register::Register($id, $_POST['nome'], $_POST['cnpj'], $_POST['email'], $pfp['path'], $_POST['senha']);
        header('Location: /painel/produtos');
        die();
    }

    public function Logout() {
        Login::Logout();
        header('Location: /login');
        die();
    }
}
