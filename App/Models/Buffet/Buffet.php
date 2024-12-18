<?php

namespace App\Models\Buffet;
use Core\Model\Model;
use App\Tools\Tools;

class Buffet extends Model {
    public $cd_buffet;
    public $nome_buffet;
    public $cnpj;
    public $url_pfp;
    private $senha;
    public $email;
    public $status_buffet;
    private $data_registro;

    public function __construct(string|null $cd_buffet) {
        $this->cd_buffet = $cd_buffet;
        $this->Data();
    }

    public function Insert(string $nome_buffet, string $cnpj, string $url_pfp, string $senha, string $email) {
        $sql = "INSERT INTO
                    tb_buffet
                VALUES
                    (:cd_buffet, 
                    :nome_buffet, 
                    :cnpj, 
                    :url_pfp, 
                    :senha, 
                    :email, 
                    default, 
                    '" . date_create()->format('Y-m-d H:i:s') . "')";
        $params = Tools::encryptRecord('tb_buffet', [
            'cd_buffet' => $this->cd_buffet,
            'nome_buffet' => $nome_buffet,
            'cnpj' => $cnpj,
            'url_pfp' => $url_pfp,
            'senha' => $senha,
            'email' => $email
        ]);
        parent::executeStatement($sql, $params);

        $this->Data();

        return true;
    }

    public function Update() {
        $sql = "UPDATE
                    tb_buffet
                SET
                    nome_buffet = :nome_buffet,
                    cnpj = :cnpj,
                    url_pfp = :url_pfp,
                    senha = :senha,
                    email = :email
                WHERE
                    cd_buffet = :cd_buffet";
        $params = Tools::encryptRecord('tb_buffet', [
            'cd_buffet' => $this->cd_buffet,
            'nome_buffet' => $this->nome_buffet,
            'cnpj' => $this->cnpj,
            'url_pfp' => $this->url_pfp,
            'senha' => $this->senha,
            'email' => $this->email
        ]);
        parent::executeStatement($sql, $params);

        return true;
    }

    public function Data() {
        $sql = "SELECT
                    *
                FROM
                    tb_buffet
                WHERE
                    cd_buffet = :id";
        $smt = parent::executeStatement($sql, ['id' => $this->cd_buffet])->fetch();
        if (!$smt) return;
        $buffet = Tools::decryptRecord('tb_buffet', $smt);
        foreach ($buffet as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
                $_SESSION[$key] = $value;
            }
        }
    }

    public static function Validate($id) {
        $smt = parent::executeStatement("SELECT * FROM tb_buffet WHERE cd_buffet = :id", ['id' => $id]);

        if ($smt->rowCount() != 1) {
            return false;
        }

        $buffet = $smt->fetch();
        if ($buffet->status_buffet == 'V') {
            return false;
        }

        $date_diff = abs(time() - strtotime($buffet->data_registro)) / (60 * 60 * 24);
        if ($date_diff > 2) {
            return false;
        }        

        $sql = "UPDATE
                    tb_buffet
                SET
                    status_buffet = 'V'
                WHERE
                    cd_buffet = :id";
        parent::executeStatement($sql, ['id' => $id]);
        return true;
    }

    public function UpdatePassword(string $senha_atual, string $nova_senha) {
        if (!$this->VerifyPassword($senha_atual)) return false;

        $this->senha = password_hash($nova_senha, PASSWORD_BCRYPT);
        $this->Update();
        return true;
    }

    private function VerifyPassword(string $senha): bool {
        return password_verify($senha, $this->senha);
    }
}
