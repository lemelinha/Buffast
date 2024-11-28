<?php

namespace App\Controllers;

use App\Models\Buffet\Buffet;
use App\Models\Buffet\Produto;
use Core\Controller\Controller;
use App\Models\Login;
use App\Tools\Tools;
use App\Models\Register;
use App\Models\Modal;

class IndexController extends Controller { 
    public function Index() {
        $this->renderView('landing');
    }

    public function Cardapio() {
        $this->renderView('cardapio');
    }
    
    public function Login() {
        if (isset($_SESSION['cd_buffet'])) {
            header('Location: /painel/produtos');
            die();
        }
        $this->renderView('login');
    }
    
    public function LoginAuth() {
        if (isset($_SESSION['cd_buffet'])) {
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
        if ($_FILES['pfp']['error'] != 4) {
            $pfp = Tools::UploadImage($id, $_FILES['pfp'], true);
            if (!$pfp['ok']) {
                $_SESSION['msg'] = $pfp['msg'];
                header('Location: /registro');
                die();
            }
        }

        $buffet = new Buffet($id);
        $buffet->Insert($_POST['nome'], $_POST['cnpj'], $pfp['path']??$pfp, $_POST['senha'], $_POST['email']);

        if (Register::SendValidation($buffet->cd_buffet, $buffet->email)) {
            Modal::Success('Email Enviado!', '', '/painel/produtos');
            die();
        };
        Modal::Error('Erro ao enviar o email!', 'Tente novamente mais tarde', '/painel/produtos');
        die();
    }

    public function Logout() {
        Login::Logout();
        header('Location: /login');
        die();
    }

    public function Produtos() {

        $produtos = Produto::AllProdutos($this->buffet->cd_buffet);

        $this->renderView('cardapio', '', ['produtos' => $produtos]);
    }
}
