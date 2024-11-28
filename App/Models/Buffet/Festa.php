<?php

namespace App\Models\Buffet;
use Core\Model\Model;
use App\Tools\Tools;

class Festa extends Model {
    private $id_buffet;
    public $cd_festa;
    public $nome_aniversariante;
    public $data_aniversario;
    public $convidados;
    public $nome_responsavel;
    public $cpf_responsavel;
    public $inicio;
    public $fim;

    public function __construct($id_buffet, $cd_festa) {
        $this->id_buffet = $id_buffet;
        $this->cd_festa = $cd_festa;
        $this->Data();
    }

    public function Insert(string $nome_aniversariante, string $data_aniversario, int $convidados, string $nome_responsavel, string $cpf_responsavel, string $inicio, string $fim) {
        $sql = "INSERT INTO
                    tb_festa
                VALUES
                    (:cd_festa, 
                    :nome_aniversariante, 
                    :data_aniversario, 
                    :convidados, 
                    :nome_responsavel,
                    :cpf_responsavel,
                    :inicio,
                    :fim,
                    :id_buffet,
                    default)";

        $params = Tools::encryptRecord('tb_festa', [
            'cd_festa' => $this->cd_festa,
            'nome_aniversariante' => $nome_aniversariante,
            'data_aniversario' => $data_aniversario,
            'convidados' => $convidados,
            'nome_responsavel' => $nome_responsavel,
            'cpf_responsavel' => $cpf_responsavel,
            'inicio' => $inicio,
            'fim' => $fim,
            'id_buffet' => $this->id_buffet
        ]);
        parent::executeStatement($sql, $params);
        $this->Data();

        return true;
    }

    public function Update() {
        $sql = "UPDATE
                    tb_festa
                SET
                    nome_aniversariante = :nome_aniversariante,
                    data_aniversario = :data_aniversario,
                    convidados = :convidados,
                    nome_responsavel = :nome_responsavel,
                    cpf_responsavel = :cpf_responsavel,
                    inicio = :inicio,
                    fim = :fim
                WHERE
                    cd_festa = :cd_festa";
        $params = Tools::encryptRecord('tb_festa', [
            'cd_festa' => $this->cd_festa,
            'nome_aniversariante' => $this->nome_aniversariante,
            'data_aniversario' => $this->data_aniversario,
            'convidados' => $this->convidados,
            'nome_responsavel' => $this->nome_responsavel,
            'cpf_responsavel' => $this->cpf_responsavel,
            'inicio' => $this->inicio,
            'fim' => $this->fim
        ]);
        parent::executeStatement($sql, $params);

        return true;
    }

    public function Delete() {
        $sql = "UPDATE
                    tb_festa
                SET
                    status_festa = 'D'
                WHERE
                    cd_festa = :cd_festa";
        $params = [
            'cd_festa' => $this->cd_festa
        ];
        $this->executeStatement($sql, $params);
        $this->Data();

        return true;
    }

    public function Data() {
        $sql = "SELECT
                    *
                FROM
                    tb_festa
                WHERE
                    cd_festa = :id";
        $smt = parent::executeStatement($sql, ['id' => $this->cd_festa])->fetch();
        if (!$smt) return;
        $festa = Tools::decryptRecord('tb_festa', $smt);
        foreach ($festa as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public static function AllFestas($cd_buffet) {
        $sql = "SELECT
                    *
                FROM
                    tb_festa
                WHERE
                    status_festa = 'A' AND
                    id_buffet = :id AND
                    inicio > curdate()";
        $params = [
            'id' => $cd_buffet
        ];

        $smt = parent::executeStatement($sql, $params)->fetchAll();

        $festas = Tools::decryptRecord('tb_festa', $smt);
        $horarios = [];
        foreach ($festas as $festa) {
            $horarios[] = [$festa->inicio, $festa->fim];
        }

        return [$festas, $horarios];
    }
}
