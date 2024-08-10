<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Login;

class LoginController extends Controller {
    public function index(){
        $this->renderView('login');
    }

    public function auth(){
        if (empty($_POST)){
            echo json_encode(["erro" => "Algo está de errado!"]);
            die();
        }
        
        $user = $_POST['usuario']??'';
        $password = $_POST['senha']??'';
        
        $LoginModel = new Login();
        
        if($LoginModel->Auth($user, $password)){
            echo json_encode(['url' => '/buffet']);
            die();
        }
        
        if($LoginModel->AuthAdmin($user, $password)){
            echo json_encode(['url' => '/admin']);
            die();
        }
        
        echo json_encode(['erro' => 'Erro: Usuário ou senha inválido']);
        die();
    }
}
