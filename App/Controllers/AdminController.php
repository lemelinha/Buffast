<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Buffet\Buffet;
use App\Models\Buffet\Produto;
use App\Tools\Tools;
use App\Models\Modal;

class AdminController extends Controller {
    private $buffet;

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
        $this->render('main', 'AdminLayout', 'Admin');
    }

    public function CadastrarProduto() {
        $this->ValidateAccount();

        $id = Tools::UUID();
        $produto = new Produto($this->buffet->cd_buffet, $id);

        $imagem = '/assets/images/' . $this->buffet->cd_buffet . '/Logo-Buffast2.png';
        if (empty($_FILES['imagem'])) {
            $imagem = Tools::UploadImage($id, $_FILES['imagem'], false, '', $this->buffet->cd_buffet);
            if (!$imagem['ok']) {
                Modal::Error('Erro ao cadastrar o produto', $imagem['msg'], '/painel/produtos');
                die();
            }
        }

        Modal::Success('Produto Cadastrado', '', '/painel/produtos');
        die();
        $produto->Insert($_POST['nome'], $_POST['quantidade'], $imagem['path']??$imagem);
    }

    public function AlterarProduto() {
        $this->ValidateAccount();
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
