<?php

namespace App\Models\Buffet;
use Core\Model\Model;
use App\Tools\Tools;

class Produto extends Model {
    private $id_buffet;
    public $cd_produto;
    public $nome_produto;
    public $quantidade_pote;
    public $url_imagem;
    public $status_produto;

    public $quantidade_estoque;

    public function __construct($id_buffet, $cd_produto) {
        $this->id_buffet = $id_buffet;
        $this->cd_produto = $cd_produto;
        $this->Data();
    }

    public function Insert(string $nome_produto, int $quantidade_pote, string $url_imagem) {
        $sql = "INSERT INTO
                    tb_produto
                VALUES
                    (:cd_produto, 
                    :nome_produto, 
                    :quantidade_pote, 
                    :url_imagem, 
                    :id_buffet, 
                    default)";

        $params = Tools::encryptRecord('tb_produto', [
            'cd_produto' => $this->cd_produto,
            'nome_produto' => $nome_produto,
            'quantidade_pote' => $quantidade_pote,
            'url_imagem' => $url_imagem,
            'id_buffet' => $this->id_buffet
        ]);
        parent::executeStatement($sql, $params);
        $this->Data();

        return true;
    }

    public function Update(string $nome_produto, int $quantidade_pote, string $url_imagem) {
        $sql = "UPDATE
                    tb_produto
                SET
                    nome_produto = :nome_produto,
                    quantidade_pote = :quantidade_pote,
                    url_imagem = :url_imagem
                WHERE
                    cd_produto = :cd_produto";
        $params = Tools::encryptRecord('tb_produto', [
            'nome_produto' => $nome_produto,
            'quantidade_pote' => $quantidade_pote,
            'url_imagem' => $url_imagem,
            'cd_produto' => $this->cd_produto
        ]);
        parent::executeStatement($sql, $params);
        $this->Data();

        return true;
    }

    public function Delete() {
        $sql = "UPDATE
                    tb_produto
                SET
                    status_produto = 'D'
                WHERE
                    cd_produto = :cd_produto";
        $params = [
            'cd_produto' => $this->cd_produto
        ];
        $this->executeStatement($sql, $params);
        Tools::RemoveFile($this->url_imagem);
        $this->Data();

        return true;
    }

    public function Data() {
        $sql = "SELECT
                    *,
                    (SELECT IFNULL(COUNT(*), 0) FROM tb_estoque WHERE id_produto = :id) as quantidade_estoque
                FROM
                    tb_produto
                WHERE
                    cd_produto = :id";
        $smt = Tools::decryptRecord('tb_produto', parent::executeStatement($sql, ['id' => $this->cd_produto])->fetch());
        if (!$smt) return;
        foreach ($smt as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public static function AllProdutos($cd_buffet) {
        $sql = "SELECT
                    *,
                    (SELECT IFNULL(COUNT(*), 0) FROM tb_estoque WHERE id_produto = :id) as quantidade_estoque
                FROM
                    tb_produto
                WHERE
                    status_produto = 'A' AND
                    id_buffet = :id";
        $params = [
            'id' => $cd_buffet
        ];

        return Tools::decryptRecord('tb_produto', parent::executeStatement($sql, $params)->fetchAll());
    }
}
