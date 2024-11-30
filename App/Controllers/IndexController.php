<?php

namespace App\Controllers;

use App\Models\Buffet\Buffet;
use App\Models\Buffet\Mesa;
use App\Models\Buffet\Produto;
use Core\Controller\Controller;
use App\Models\Login;
use App\Tools\Tools;
use App\Models\Register;
use App\Models\Modal;
use App\Models\Email;

class IndexController extends Controller { 
    public function Index() {
        $this->renderView('landing');
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
        $buffet->Insert($_POST['nome'], $_POST['cnpj'], $pfp['path']??$pfp, password_hash($_POST['senha'], PASSWORD_BCRYPT), $_POST['email']);

        if (Register::SendValidation($buffet->cd_buffet, $buffet->nome_buffet, $buffet->email)) {
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

    public function Cardapio($cd_buffet, $numero_mesa_hash) {

        $numero_mesa = Mesa::GetNumeroByHash($cd_buffet, $numero_mesa_hash);
        
        if ($numero_mesa === false) {
            require_once ERRO404;
            die();
        }
        $produtos = Produto::AllProdutos($cd_buffet);

        $this->renderView('cardapio', '', ['produtos' => $produtos, 'numero_mesa' => $numero_mesa]);
    }

    public function EsqueciMinhaSenha() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->renderView('esqueciMinhaSenha', 'senha');
            die();
        }

        if (!($cd_buffet = Tools::EmailExists($_POST['email']))) {
            Modal::Error('Erro', 'Email não cadastrado', '/esqueci-minha-senha');
            die();
        }

        $link = "https://buffast.com.br/redefinir-senha/" . $cd_buffet . "/" . time();
        $subject = "Redefinição de senha";
        $body = "Foi solicitado uma troca de senha em sua conta. <br>Para a redefinição acesse o link: $link <br>Caso não tenha sido você ignore este email.";

        if (Email::SendEmail($_POST['email'], $subject, $body)) {
            Modal::Success('Email enviado', 'Foi enviado um email para a redefinição da senha', '/login');
            die();
        }

        Modal::Error('Algo deu errado', 'Algo deu errado em enviar o email. Tente mais tarde', '/esqueci-minha-senha');
        die();
    }

    public function RedefinirSenha($cd_buffet, $time) {
        if (time() - $time > (24*60*60)) {
            $this->renderView('linkExpirado');
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->renderView('redefinirSenha', 'senha');
            die();
        }

        if (Login::RedefinirSenha($cd_buffet, $_POST['senha'])) {
            Modal::Success('Sucesso!', 'Senha redefinida!', '/login');
            die();
        }

        Modal::Error('Algo deu errado', 'Algo deu errado ao redefinir senha. Tente mais tarde', '/esqueci-minha-senha');
        die();
    }
}
