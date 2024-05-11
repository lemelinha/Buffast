<?php

namespace App\Controllers;
use App\Tools\Tools;
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
        
        echo json_encode([
            'erro' => false,
            'modal' => ['text' => 'Buffet Cadastrado com sucesso!']
        ]);
    }
}
