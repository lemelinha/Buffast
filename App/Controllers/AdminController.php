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

    public function dashboard(){
        $this->title = 'Admin - Dashboard';
        $this->render('dashboard', 'Admin', 'AdminLayout');
    }

    public function registerBuffetForm(){
        $this->title = 'Admin - Cadastrar Buffet';
        $this->render('registerBuffetForm', 'Admin', 'AdminLayout');
    }

    public function registerBuffet() {
        $formInputs = [
            'nome-buffet',
            'cep',
            'uf',
            'localidade',
            'bairro',
            'logradouro',
            'numero',
            'complemento',
            'intervalo-pedidos',
            'qtd-maxima-produtos-pedido',
            'qtd-maxima-cada-produto',
            'qtd-maxima-convidados',
            'usuario-inicial',
            'senha-inicial'
        ];

        $optionalInputs = ['complemento'];

        if (!Tools::validateFormData($formInputs, $optionalInputs)){
            echo json_encode([
                'erro' => true,
                'modal' => ['text' => 'ERRO: Verifique os dados do formulário!']
            ]);
            return;
        }

        $cep = $_POST['cep'];
        $uf = $_POST['uf'];
        $cidade = $_POST['localidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['logradouro'];
        
        if (!Tools::validadeCEP($cep, $uf, $cidade, $bairro, $rua)){
            echo json_encode([
                'erro' => true,
                'modal' => ['text' => 'ERRO: Verifique os dados de endereço!']
            ]);
            return;
        }
        
        if (Tools::usernameExists($_POST['usuario-inicial'])){
            echo json_encode([
                'erro' => true,
                'modal' => ['text' => 'ERRO: Nome de usuário já existente']
            ]);
            return;
        }
        
        $AdminModel = new Admin();
        
        $result = $AdminModel->registerBuffet(); // se passar pelo try catch foi sucesso
        
        if ($result['erro']){
            echo json_encode([
                'erro' => true,
                'modal' => ['text' => 'ERRO NO SERVIDOR LOG: ' . $result['log']->getMessage()]
            ]);
            return;
        }
        
        echo json_encode([
            'erro' => false,
            'modal' => ['text' => 'Buffet Cadastrado com sucesso!']
        ]);
        return;
    }
}
