<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Buffet\Buffet;
use App\Models\Buffet\Produto;
use App\Tools\Tools;
use App\Models\Modal;
use App\Models\Register;

class AdminController extends Controller {
    private $buffet;

    public function ReenviarEmail() {
        if (!isset($_SESSION['cd_buffet'])) {
            header('Location: /login');
            die();
        }
        $this->buffet = new Buffet($_SESSION['cd_buffet']);
        if (Register::SendValidation($this->buffet->cd_buffet, $this->buffet->email)) {
            Modal::Success('Email Enviado!', '', '/painel/produtos');
            die();
        };
        Modal::Error('Erro ao enviar o email!', 'Tente novamente mais tarde', '/painel/produtos');
        die();
    }

    public function Validate($id) {
        if (Buffet::Validate($id)) {
            $this->renderView('emailValidado');
            die();
        }
        $this->renderView('validacaoExpirada');
        die();
    }

    public function Produtos() {
        $this->ValidateAccount();

        $produtos = Produto::AllProdutos($this->buffet->cd_buffet);

        $this->render('main', 'AdminLayout', 'Admin', '', ['produtos' => $produtos]);
    }

    public function CadastrarProduto() {
        $this->ValidateAccount();

        $id = Tools::UUID();
        $produto = new Produto($this->buffet->cd_buffet, $id);

        $imagem = '/assets/images/' . $this->buffet->cd_buffet . '/Logo-Buffast2.png';
        if ($_FILES['imagem']['error'] != 4) {
            $imagem = Tools::UploadImage($id, $_FILES['imagem'], false, '', $this->buffet->cd_buffet);
            if (!$imagem['ok']) {
                Modal::Error('Erro ao cadastrar o produto', $imagem['msg'], '/painel/produtos');
                die();
            }
        }

        $produto->Insert($_POST['nome'], $_POST['quantidade'], $imagem['path']??$imagem);
        Modal::Success('Produto Cadastrado', '', '/painel/produtos');
        die();
    }

    public function AlterarProduto() {
        $this->ValidateAccount();

        $produto = new Produto($this->buffet->cd_buffet, $_POST['cd_produto']);

        if ($_FILES['imagem']['error'] != 4) {
            $imagem = Tools::UploadImage($produto->cd_produto, $_FILES['imagem'], false, $_POST['remover_imagem'], $this->buffet->cd_buffet);
            if (!$imagem['ok']) {
                Modal::Error('Erro ao alterar o produto', $imagem['msg'], '/painel/produtos');
                die();
            }
        }

        $produto->Update($_POST['nome'], $_POST['quantidade'], $imagem['path']??$_POST['remover_imagem']);
        Modal::Success('Produto Alterado', '', '/painel/produtos');
        die();
    }

    public function Festas() {
        $this->ValidateAccount();
        $this->render('festa', 'AdminLayout', 'Admin');
    }

    public function Estoque() {
        $this->ValidateAccount();
        $this->render('estoque', 'AdminLayout', 'Admin');
    }

    public function Mesas() {
        $this->ValidateAccount();
        $this->render('mesas', 'AdminLayout', 'Admin');
    }

    public function Pedidos() {
        $this->ValidateAccount();
        $this->render('pedidos', 'AdminLayout', 'Admin');
    }

    private function ValidateAccount() {
        if (!isset($_SESSION['cd_buffet'])) {
            header('Location: /login');
            die();
        }
        $this->buffet = new Buffet($_SESSION['cd_buffet']);
        if ($this->buffet->status_buffet != 'V') {
            $this->renderView('valideEmail');
            die();
        }
    }
}
