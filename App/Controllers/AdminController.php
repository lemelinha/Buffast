<?php

namespace App\Controllers;
use Core\Controller\Controller;

class AdminController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            die();
        }
    }

    public function Index() {
        $this->render('main', 'AdminLayout', 'Admin');
    }

    public function Festas() {
        $this->render('festa', 'AdminLayout', 'Admin');
    }

    public function Estoque() {
        $this->render('estoque', 'AdminLayout', 'Admin');
    }

    public function Mesas() {
        $this->render('mesas', 'AdminLayout', 'Admin');
    }

    public function Pedidos() {
        $this->render('pedidos', 'AdminLayout', 'Admin');
    }
}
