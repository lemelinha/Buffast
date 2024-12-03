<?php

namespace App\Models;

use App\Models\Buffet\Produto;
use Core\Model\Model;
use App\Tools\Tools;

class Pedido extends Model {
    public $cd_pedido;
    public $data_pedido;
    public $status_pedido;
    public $id_mesa;
    public $numero_mesa;
    public $id_festa;
    public $itens;
    public $nome_aniversariante;

    public function __construct($cd_pedido){
        $this->cd_pedido = $cd_pedido;

        $this->Data();
    }

    public function Insert(string $id_mesa, string $id_festa, array $itens) {
        $sql = "INSERT INTO
                    tb_pedido
                VALUES
                    (:cd_pedido, 
                    " . date_create()->format('Y-m-d H:i:s') . ", 
                    default, 
                    :id_mesa,
                    :id_festa)";
        $params = Tools::encryptRecord('tb_pedido', [
            'cd_pedido' => $this->cd_pedido,
            'id_mesa' => $id_mesa,
            'id_festa' => $id_festa
        ]);
        parent::executeStatement($sql, $params);

        $this->itens = $itens;
        $this->InsertItens();

        $this->Data();

        return true;
    }

    private function InsertItens() {
        foreach ($this->itens as $item) {
            for ($i = 0; $i<$item['quantidade']; $i++) {
                $sql = "INSERT INTO
                            tb_produto_has_tb_pedido
                        VALUES
                            (:id_produto, :id_pedido)";
                $params = [
                    'id_produto' => $item['cd_produto'],
                    'id_pedido' => $this->cd_pedido
                ];
                parent::executeStatement($sql, $params);
            }
        }
    }

    public function Update() {
        $sql = "UPDATE
                    tb_pedido
                SET
                    status_pedido = :status_pedido
                WHERE
                    cd_pedido = :cd_pedido";
        $params = [
            'status_pedido' => $this->status_pedido,
            'cd_pedido' => $this->cd_pedido
        ];
        parent::executeStatement($sql, $params);
    }

    public function Data() {
        $sql = "SELECT
                    *
                FROM
                    tb_pedido
                WHERE
                    cd_pedido = :cd_pedido";
        $smt = parent::executeStatement($sql, ['cd_pedido' => $this->cd_pedido])->fetch();
        if (!$smt) return;
        $buffet = Tools::decryptRecord('tb_pedido', $smt);
        foreach ($buffet as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        $sql = "SELECT
                    id_pedido,
                    id_produto,
                    nome_produto
                FROM
                    tb_produto_has_tb_pedido
                INNER JOIN
                    tb_produto
                    ON
                        cd_produto = id_produto
                WHERE
                    id_pedido = :id_pedido";
        $params = [
            'id_pedido' => $this->cd_pedido
        ];
        $smt = parent::executeStatement($sql, $params);
        
        $itens = [];
        foreach ($smt as $item) {
            if (!isset($itens[$item->id_produto])) {
                $itens[$item->id_produto] = ['nome_produto' => '', 'quantidade' => 0];
            }
            $itens[$item->id_produto]['nome_produto'] = $item->nome_produto; 
            $itens[$item->id_produto]['quantidade'] = $itens[$item->id_produto]['quantidade']+1;
        }

        $itensPedido = array_map(function($item, $cdProduto) {
            return [
                'cd_produto' => $cdProduto,
                'nome_produto' => $item['nome_produto'],
                'quantidade' => $item['quantidade']
            ];
        }, array_filter($itens, function($item) {
            // Filtra os itens com quantidade > 0
            return $item['quantidade'] > 0;
        }), array_keys($itens));

        $this->itens = $itensPedido;
    }

    public static function AllPedidos($id_festa) {
        $sql = "SELECT
                    *
                FROM
                    tb_pedido
                INNER JOIN
                    tb_festa
                    ON
                        id_festa = cd_festa
                INNER JOIN
                    tb_mesa
                    ON
                        id_mesa = cd_mesa
                WHERE
                    id_festa = :id_festa AND
                    status_pedido = 'P'
                ORDER BY
                    data_pedido ASC";
        $params = [
            'id_festa' => $id_festa
        ];
        $smt = parent::executeStatement($sql, $params)->fetchAll();

        $pedidos = [];
        foreach ($smt as $item) {
            $pedido = new Pedido($item->cd_pedido);
            $pedido->nome_aniversariante = Tools::decrypt($item->nome_aniversariante);
            $pedido->numero_mesa = $item->numero_mesa;
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public static function UltimosPedidos($ultimo_pedido, $id_festa){
        $sql = "SELECT
                    *
                FROM
                    tb_pedido
                INNER JOIN
                    tb_festa
                    ON
                        id_festa = cd_festa
                INNER JOIN
                    tb_mesa
                    ON
                        id_mesa = cd_mesa
                WHERE
                    id_festa = :id_festa AND
                    status_pedido = 'P' AND
                    data_pedido > :ultimo_pedido
                ORDER BY
                    data_pedido ASC";
        $params = [
            'id_festa' => $id_festa,
            'ultimo_pedido' => $ultimo_pedido
        ];
        $smt = parent::executeStatement($sql, $params)->fetchAll();

        $pedidos = [];
        foreach ($smt as $item) {
            $pedido = new Pedido($item->cd_pedido);
            $pedido->nome_aniversariante = Tools::decrypt($item->nome_aniversariante);
            $pedido->numero_mesa = $item->numero_mesa;
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public function CancelarPedido() {
        $this->status_pedido = 'C';
        $this->Update();
    }

    public function ConcluirPedido() {
        $this->status_pedido = 'E';
        $this->Update();

        foreach ($this->itens as $item) {
            $produto = new Produto($_SESSION['cd_buffet'], $item['cd_produto']);
            $produto->Saida($item['quantidade']);
        }
    }
}
