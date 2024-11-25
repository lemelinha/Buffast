<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Register;
use App\Models\Buffet\Buffet;
use App\Tools\Tools;

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
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            die();
        }
        $this->buffet = new Buffet($_SESSION['id']);
        if ($this->status_buffet != 'V') {
            $this->renderView('valideEmail');
            die();
        }
    }
}
