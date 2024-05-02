<?php

namespace App\Controllers;
use Needs\Controller\Controller;

class AdminController extends Controller{
    public function __construct(){
        // se estiver logado como admin
        if(!isset($_SESSION['logged']) && $_SESSION['logged']['type'] != 'admin'){
            header('Location: /login');
            die();
        }
    }

    public function dashboard(){
        $this->title = 'Admin - Dashboard';
        $this->render('dashboard', 'Admin', 'AdminLayout');
    }

    public function registerBuffet(){
        $this->title = 'Admin - Cadastrar Buffet';
        $this->render('cadastrarBuffet', 'Admin', 'AdminLayout');
    }
}
