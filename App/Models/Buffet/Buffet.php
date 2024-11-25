<?php

namespace App\Models\Buffet;
use Core\Model\Model;
use App\Tools\Tools;
use App\Models\Register;

class Buffet extends Model {
    public $cd_buffet;
    public $nome_buffet;
    private $cnpj;
    public $url_pfp;
    private $senha;
    private $email;
    public $status_buffet;
    private $data_registro;

    public function __construct(string|null $cd_buffet) {
        $this->cd_buffet = $cd_buffet;
        $this->Data();
    }

    public function Insert(string $nome_buffet, string $cnpj, string $url_pfp, string $senha, string $email) {
        $this->nome_buffet = $nome_buffet;
        $this->cnpj = $cnpj;
        $this->url_pfp = $url_pfp;
        $this->senha = $senha;
        $this->email = $email;

        $sql = "INSERT INTO
                    tb_buffet
                VALUES
                    (:cd_buffet, :nome_buffet, :cnpj, :url_pfp, :senha, :email, default, default)";
        $params = Tools::encryptRecord('tb_buffet', [
            'cd_buffet' => $this->cd_buffet,
            'nome_buffet' => $this->nome_buffet,
            'cnpj' => $this->cnpj,
            'url_pfp' => $this->url_pfp,
            'senha' => password_hash($this->senha, PASSWORD_BCRYPT),
            'email' => $this->email
        ]);
        parent::executeStatement($sql, $params);
        Register::SendValidation($this->cd_buffet, $this->email);

        $_SESSION['cd_buffet'] = $this->cd_buffet;
        $_SESSION['nome_buffet'] = $this->nome_buffet;
        $_SESSION['cnpj'] = $this->cnpj;
        $_SESSION['email'] = $this->email;
        $_SESSION['url_pfp'] = $this->url_pfp;
        $_SESSION['status_buffet'] = 'P';
        $this->status_buffet = 'P';

        return true;
    }

    public function Update() {

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
        foreach ($smt as $key => $value) {
            if (property_exists($this, $key)) {
                $value = Tools::decryptRecord('tb_buffet', $value);
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
}
