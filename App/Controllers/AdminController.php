<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Register;

class AdminController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            die();
        }
    }

    public function Validate($id) {
        if (Register::Validate($id)) {
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
        if ($_SESSION['status'] != 'V') {
            $this->renderView('valideEmail');
            die();
        }
    }
}
