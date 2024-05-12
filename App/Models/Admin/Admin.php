<?php

namespace App\Models\Admin;
use Needs\Model\Model;

class Admin extends Model {
    public function registerBuffet() {
        try {
            $sql = "
                INSERT INTO
                    tb_buffet
                VALUES
                    (null, :nome_buffet, :nome_usuario, :senha, 1)            
            ";
            $query = $this->db->prepare($sql);

            $query->bindParam(':nome_buffet', $_POST['nome-buffet']);
            $query->bindParam(':nome_usuario', $_POST['usuario-inicial']);
            $query->bindValue(':senha', password_hash($_POST['senha-inicial'], PASSWORD_DEFAULT));
            $query->execute();

            $buffetId = $this->getBuffetIdByUsername($_POST['usuario-inicial']); 

            // insert endereço
            $sql = "
                INSERT INTO
                    tb_endereco
                VALUES
                    (null, :complemento, :numero, :logradouro, :bairro, :localidade, :uf, :cep, :id_buffet)
            ";
            $query = $this->db->prepare($sql);

            $query->bindParam(':complemento', $_POST['complemento']);
            $query->bindParam(':numero', $_POST['numero']);
            $query->bindParam(':logradouro', $_POST['logradouro']);
            $query->bindParam(':bairro', $_POST['bairro']);
            $query->bindParam(':localidade', $_POST['localidade']);
            $query->bindParam(':uf', $_POST['uf']);
            $query->bindParam(':cep', $_POST['cep']);
            $query->bindParam(':id_buffet', $buffetId);
            $query->execute();

            // insert configurações
            $sql = "
                INSERT INTO
                    tb_configuracao_buffet
                VALUES
                    (null, :tm_intervalo_pedido, :qt_maxima_cada_produto, :qt_maxima_produto_pedido, :qt_maxima_convidados, :id_buffet)
            ";
            $query = $this->db->prepare($sql);

            $query->bindParam(':tm_intervalo_pedido', $_POST['intervalo-pedidos']);
            $query->bindParam(':qt_maxima_cada_produto', $_POST['qtd-maxima-produtos-pedido']);
            $query->bindParam(':qt_maxima_produto_pedido', $_POST['qtd-maxima-cada-produto']);
            $query->bindParam(':qt_maxima_convidados', $_POST['qtd-maxima-convidados']);
            $query->bindParam(':id_buffet', $buffetId);
            $query->execute();

            return ['erro' => false];
        } catch (\PDOException $e) {
            return ['erro' => true, 'log' => $e];
        }
    }

    private function getBuffetIdByUsername($username){
        $sql = "
            SELECT 
                cd_buffet
            FROM
                tb_buffet
            WHERE
                nm_usuario = ?
        ";

        return $this->executeStatement($sql, [$username])[0]->cd_buffet;
    }
}
