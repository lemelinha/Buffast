<?php

namespace App\Controllers;
use Core\Controller\Controller;
use App\Models\Buffet\Buffet;
use App\Models\Buffet\Produto;
use App\Models\Buffet\Festa;
use App\Models\Buffet\Mesa;
use App\Models\Pedido;
use App\Tools\Tools;
use App\Models\Modal;
use App\Models\Register;

class AdminController extends Controller {
    private $buffet;

    public function ReenviarEmailAutentificacao() {
        if (!isset($_SESSION['cd_buffet'])) {
            header('Location: /login');
            die();
        }
        $this->buffet = new Buffet($_SESSION['cd_buffet']);
        if (Register::SendValidation($this->buffet->cd_buffet, $this->buffet->nome_buffet, $this->buffet->email)) {
            Modal::Success('Email Enviado!', '', '/painel/produtos');
            die();
        };
        Modal::Error('Erro ao enviar o email!', 'Tente novamente mais tarde', '/painel/produtos');
        die();
    }

    public function Validate($id) {
        if (Buffet::Validate($id)) {
            $this->renderView('emailValidado', 'email');
            die();
        }
        $this->renderView('linkExpirado');
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

        $produto->Insert($_POST['nome'], $_POST['quantidade'], $imagem['path']??$imagem, $_POST['bebida']);
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

        $produto->nome_produto = $_POST['nome'];
        $produto->quantidade_maxima = $_POST['quantidade'];
        $produto->url_imagem = $imagem['path']??$_POST['remover_imagem'];

        $produto->Update();
        Modal::Success('Produto Alterado', '', '/painel/produtos');
        die();
    }

    public function DeletarProduto($cd_produto) {
        $this->ValidateAccount();

        $produto = new Produto($this->buffet->cd_buffet, $cd_produto);

        $produto->Delete();
        Modal::Success('Produto Deletado', '', '/painel/produtos');
        die();
    }

    public function Festas() {
        $this->ValidateAccount();

        [$festas, $horarios] = Festa::AllFestas($this->buffet->cd_buffet);

        $this->render('festa', 'AdminLayout', 'Admin', '', ['festas' => $festas, 'horarios' => $horarios]);
    }

    public function CadastrarFesta() {
        $this->ValidateAccount();

        $id = Tools::UUID();
        $festa = new Festa($this->buffet->cd_buffet, $id);

        $data = $_POST['date-start'];
        $hora_inicio = $_POST['time-start'];
        $hora_fim = $_POST['time-end'];

        $inicio = $data . ' ' . $hora_inicio;
        $fim = $data . ' ' . $hora_fim;

        $festa->Insert($_POST['aniversariante'], $_POST['aniversario'], $_POST['convidados'], $_POST['responsavel'], $_POST['cpf-responsavel'], $inicio, $fim);

        Modal::Success('Festa Cadastrada', '', '/painel/festas');
        die();
    }

    public function AlterarFesta() {
        $this->ValidateAccount();

        $festa = new Festa($this->buffet->cd_buffet, $_POST['cd_festa']);

        $data = $_POST['date-start'];
        $hora_inicio = $_POST['time-start'];
        $hora_fim = $_POST['time-end'];

        $inicio = $data . ' ' . $hora_inicio;
        $fim = $data . ' ' . $hora_fim;

        $festa->nome_aniversariante = $_POST['aniversariante'];
        $festa->data_aniversario = $_POST['aniversario'];
        $festa->convidados = $_POST['convidados'];
        $festa->nome_responsavel = $_POST['responsavel'];
        $festa->cpf_responsavel = $_POST['cpf-responsavel'];
        $festa->inicio = $inicio;
        $festa->fim = $fim;

        $festa->Update();
        
        Modal::Success('Festa Alterada', '', '/painel/festas');
        die();
    }

    public function DeletarFesta($cd_festa) {
        $this->ValidateAccount();

        $festa = new Festa($this->buffet->cd_buffet, $cd_festa);

        $festa->Delete();
        Modal::Success('Festa Deletado', '', '/painel/festas');
        die();
    }

    public function Estoque() {
        $this->ValidateAccount();

        $produtos = Produto::AllProdutos($this->buffet->cd_buffet);

        $this->render('estoque', 'AdminLayout', 'Admin', '', ['produtos' => $produtos]);
    }

    public function EstoqueProcess($type, $cd_produto, $quantidade) {
        $this->ValidateAccount();

        switch ($type) {
            case 's':
                $action = 'Saida';
                break;
            case 'e':
                $action = 'Entrada';
                break;
            default:
                echo json_encode(['ok' => false, 'msg' => 'Algo deu errado']);
                die();
        }

        $produto = new Produto($this->buffet->cd_buffet, $cd_produto);
        [$success, $msg] = $produto->$action($quantidade);
        
        echo json_encode(['ok' => $success, 'msg' => $msg, 'quantidade' => $produto->quantidade_estoque]);
    }

    public function Mesas() {
        $this->ValidateAccount();

        $cd_festa = Tools::EmFesta($this->buffet->cd_buffet);

        $mesas = Mesa::AllMesas($this->buffet->cd_buffet);

        $this->render('mesas', 'AdminLayout', 'Admin', '', ['mesas' => $mesas, 'cd_festa' => $cd_festa]);
    }

    public function CadastrarMesa() {
        $this->ValidateAccount();

        Mesa::CadastrarMesa($this->buffet->cd_buffet);
        $mesas = Mesa::AllMesas($this->buffet->cd_buffet);

        $this->renderView('listMesas', 'Admin/mesa', ['mesas' => $mesas]);
    }

    public function DeletarMesa() {
        $this->ValidateAccount();

        Mesa::DeletarMesa($this->buffet->cd_buffet);

        $mesas = Mesa::AllMesas($this->buffet->cd_buffet);
        $this->renderView('listMesas', 'Admin/mesa', ['mesas' => $mesas]);
        die();
    }

    public function Pedidos() {
        $this->ValidateAccount();

        $cd_festa = Tools::EmFesta($this->buffet->cd_buffet);

        if (Tools::isAjax() && isset($_GET['ultimo_pedido']) && !empty($_GET['ultimo_pedido'])) {
            if (!$cd_festa) die();
            $novos_pedidos = Pedido::UltimosPedidos($_GET['ultimo_pedido'], $cd_festa);
            ob_start();
            
            foreach ($novos_pedidos as $novos_pedido) {
                ?>
                <div id="<?= $novos_pedido->cd_pedido ?>" class="card-pedido bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                                <header class="card-header text-base md:text-lg lg:text-lg">
                                <p class="pb-3"><span class="text-amber-300">Festa de:</span> <?= $novos_pedido->nome_aniversariante ?> </p>
                                <div class="flex justify-center items-center">
                                    <img
                                    class="h-12"
                                    src="/assets/images/snack.svg"/>
                                </div>
                                </header>
                                <div class="flex align-end justify-end">
                                    <button class="p-1 bg-<?= $novos_pedido->status_pedido=='P'?'red':'green' ?>-600 text-xs rounded-md">
                                        <p><?= $novos_pedido->status_pedido=='P'?'Pendente':'Entregue' ?></p>
                                    </button>            
                                </div>
                                <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                                    <p><span class="text-amber-300">Mesa:</span> <span class="font-bold"><?= $novos_pedido->numero_mesa ?></span></p>
                                    <p><span class="text-amber-300">Horario do pedido</span> : <span class="font-bold"><?= date_create($novos_pedido->data_pedido)->format('H:i') ?></span></p>
                                    <p><span class="text-amber-300">Salgados:</span> <?php
                                        $first = true;
                                        $virgula = false;
                                        foreach ($novos_pedido->itens as $item) {
                                            if ($virgula) {
                                                echo ", ";
                                            }
                                            if ($first) {
                                                $first = false;
                                                $virgula = true;
                                            }
                                            echo "{$item['quantidade']}x {$item['nome_produto']}";
                                        }
                                    ?></p>
                                </section>
                                <div class="flex align-center justify-center">
                                    <button class="concluir-pedido p-1 bg-amber-300 text-sm rounded-md font-tittle mr-5" cd_pedido="<?= $novos_pedido->cd_pedido ?>">
                                        <p>Concluir</p>
                                    </button>            
                                    <button class="cancelar-pedido p-1 bg-amber-300 text-sm rounded-md font-tittle" cd_pedido="<?= $novos_pedido->cd_pedido ?>">
                                        <p>Cancelar</p>
                                    </button>            
                                </div>
                        </div>
                <?php
            }
            $html_novos_pedidos = ob_get_clean();
            echo json_encode(['html' => $html_novos_pedidos, 'ultimo_pedido' => end($novos_pedidos)->data_pedido]);
            die();
        }

        $pedidos = Pedido::AllPedidos($cd_festa);

        $this->render('pedidos', 'AdminLayout', 'Admin', '', ['pedidos' => $pedidos]);
    }

    public function CancelarPedido($cd_pedido) {
        $this->ValidateAccount();

        $pedido = new Pedido($cd_pedido);
        $pedido->CancelarPedido();
    }
    
    public function ConcluirPedido($cd_pedido) {
        $this->ValidateAccount();
        
        $pedido = new Pedido($cd_pedido);
        $pedido->ConcluirPedido();
    }

    public function Perfil() {
        $this->ValidateAccount();
        $this->render('perfil', 'AdminLayout', 'Admin');
    }

    public function AtualizarPFP() {
        $this->ValidateAccount();

        $pfp = '/assets/images/test2.jpg';
        if ($_FILES['pfp']['error'] != 4) {
            $pfp = Tools::UploadImage($this->buffet->cd_buffet, $_FILES['pfp'], true, $this->buffet->url_pfp);
            if (!$pfp['ok']) {
                echo json_encode(['ok' => false, 'msg' => $pfp['msg']]);
                die();
            }
        }
        $this->buffet->url_pfp = $pfp['path']??$pfp;
        $this->buffet->Update();
        echo json_encode(['ok' => true, 'msg' => 'Imagem Alterada com sucesso']);
        die();
    }

    public function AtualizarInfo() {
        $this->ValidateAccount();

        if ($_POST['cnpj'] != $this->buffet->cnpj && Tools::CNPJExists($_POST['cnpj'])) {
            echo json_encode(['ok' => false, 'msg' => "CNPJ já cadastrado"]);
            die();
        }

        if ($_POST['email'] != $this->buffet->email && Tools::EmailExists($_POST['email'])) {
            echo json_encode(['ok' => false, 'msg' => "Email já cadastrado"]);
            die();
        }

        $this->buffet->nome_buffet = $_POST['nome'];
        $this->buffet->email = $_POST['email'];
        $this->buffet->cnpj = $_POST['cnpj'];
        $this->buffet->Update();

        echo json_encode(['ok' => true, 'msg' => 'Informações alteradas com sucesso!']);
        die();
    }

    public function AtualizarSenha() {
        $this->ValidateAccount();

        if (!$this->buffet->UpdatePassword($_POST['senha-atual'], $_POST['nova-senha'])) {
            echo json_encode(['ok' => false, 'msg' => 'Sua senha atual está incorreta']);
            die();
        }

        echo json_encode(['ok' => true, 'msg' => 'Senha alterada!']);
        die();
    }

    private function ValidateAccount() {
        if (!isset($_SESSION['cd_buffet'])) {
            header('Location: /login');
            die();
        }
        $this->buffet = new Buffet($_SESSION['cd_buffet']);
        if ($this->buffet->status_buffet != 'V') {
            $this->renderView('valideEmail', 'email');
            die();
        }
    }
}
