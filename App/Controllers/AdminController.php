<?php

namespace App\Controllers;
use App\Tools\Tools;
use Needs\Controller\Controller;
use App\Models\Admin\Admin;

class AdminController extends Controller{
    public function __construct(){
        // se estiver logado como admin
        if(!isset($_SESSION['logged']) && $_SESSION['logged']['type'] != 'admin'){
            header('Location: /login');
            die();
        }
    }

    public function index(){
        $this->title = 'Admin';
        $this->renderLayout('AdminLayout');
    }

    public function dashboard(){
        $this->renderView('dashboard', 'Admin');
    }

    public function registerBuffetForm(){
        $this->title = 'Admin - Cadastrar Buffet';
        $this->renderView('registerBuffetForm', 'Admin');
    }
}
