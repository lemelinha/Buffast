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

    public $bebida;
    public $quantidade_estoque;

    public function __construct($id_buffet, $cd_produto) {
        $this->id_buffet = $id_buffet;
        $this->cd_produto = $cd_produto;
        $this->Data();
    }

    public function Insert(string $nome_produto, int $quantidade_pote, string $url_imagem, int $bebida) {
        $sql = "INSERT INTO
                    tb_produto
                VALUES
                    (:cd_produto, 
                    :nome_produto, 
                    :quantidade_pote, 
                    :url_imagem, 
                    :id_buffet, 
                    default,
                    :bebida)";

        $params = Tools::encryptRecord('tb_produto', [
            'cd_produto' => $this->cd_produto,
            'nome_produto' => $nome_produto,
            'quantidade_pote' => $quantidade_pote,
            'url_imagem' => $url_imagem,
            'id_buffet' => $this->id_buffet,
            'bebida' => $bebida
        ]);
        parent::executeStatement($sql, $params);
        $this->Data();

        return true;
    }

    public function Update() {
        $sql = "UPDATE
                    tb_produto
                SET
                    nome_produto = :nome_produto,
                    quantidade_pote = :quantidade_pote,
                    url_imagem = :url_imagem
                WHERE
                    cd_produto = :cd_produto";
        $params = Tools::encryptRecord('tb_produto', [
            'nome_produto' => $this->nome_produto,
            'quantidade_pote' => $this->quantidade_pote,
            'url_imagem' => $this->url_imagem,
            'cd_produto' => $this->cd_produto
        ]);
        parent::executeStatement($sql, $params);

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

    public static function AllProdutos(string $cd_buffet): array {
        $sql = "SELECT
                    p.*,
                    (SELECT COUNT(*) 
                    FROM tb_estoque e 
                    WHERE e.id_produto = p.cd_produto) as quantidade_estoque
                FROM
                    tb_produto p
                WHERE
                    p.status_produto = 'A' AND
                    p.id_buffet = :cd_buffet";
        $params = [
            'cd_buffet' => $cd_buffet
        ];

        return Tools::decryptRecord('tb_produto', parent::executeStatement($sql, $params)->fetchAll());
    }

    public function Entrada(int $quantidade): array {
        $sql = "INSERT INTO
                    tb_estoque
                VALUES ";
        for ($i=0; $i<$quantidade; $i++) {
            if ($i > 0) $sql .= ', ';
            $id = Tools::UUID();

            $sql .= "(?, ?)";

            $params[] = $id;
            $params[] = $this->cd_produto;
        }
        $params = Tools::encryptRecord('tb_estoque', $params);

        $this->executeStatement($sql, $params);
        $this->Data();
        return [true, 'Estoque Atualizado'];
    }
    
    public function Saida(int $quantidade): array {
        $quantidade = (int) $quantidade;
        if ($quantidade > $this->quantidade_estoque) {
            return [false, 'Quantidade maior que a do estoque'];
        }
        
        $sql = "DELETE FROM
                    tb_estoque
                WHERE
                    id_produto = :cd_produto
                LIMIT " . $quantidade;
        
        $params = [
            ':cd_produto' => $this->cd_produto
        ];
        
        $this->executeStatement($sql, $params);
        $this->Data();
    return [true, 'Estoque Atualizado'];
    }
}
