<?php

namespace App\Models\Buffet;

use Core\Model\Model;
use App\Tools\Tools;

class Mesa extends Model {
    public static function AllMesas($cd_buffet) {
        $sql = "SELECT
                    *
                FROM
                    tb_mesa
                WHERE
                    id_buffet = :id_buffet
                ORDER BY
                    numero_mesa";
        $params = [
            'id_buffet' => $cd_buffet
        ];
        return parent::executeStatement($sql, $params)->fetchAll();
    }

    public static function CadastrarMesa($cd_buffet) {
        $sql = "SELECT
                    IFNULL(numero_mesa, 0) as numero_mesa
                FROM
                    tb_mesa
                WHERE
                    id_buffet = :id_buffet
                ORDER BY
                    numero_mesa DESC
                LIMIT 1";
        $params = [
            'id_buffet' => $cd_buffet
        ];
        $smt = parent::executeStatement($sql, $params);
        if ($smt->rowCount() > 0) {
            $proxNumero = $smt->fetch()->numero_mesa+1;
        } else {
            $proxNumero = 1;
        }

        $sql = "INSERT INTO
                    tb_mesa
                VALUES
                (:cd_mesa,
                :numero_mesa,
                :id_buffet
                )";
        $id = Tools::UUID();
        $params = [
            'cd_mesa' => $id,
            'numero_mesa' => $proxNumero,
            'id_buffet' => $cd_buffet
        ];
        parent::executeStatement($sql, $params);
        return (object) ['cd_mesa' => $id, 'numero_mesa' => $proxNumero, 'id_buffet' => $cd_buffet];
    }

    public static function DeletarMesa($id_buffet) {
        $sql = "DELETE FROM
                    tb_mesa
                WHERE
                    id_buffet = :id_buffet
                ORDER BY
                    numero_mesa DESC
                LIMIT 1";
        $params = [
            'id_buffet' => $id_buffet
        ];
        parent::executeStatement($sql, $params);
    }

    public static function GetMesaByHash($cd_buffet, $numero_mesa_hash, $cd_festa) {
        $mesas = self::AllMesas($cd_buffet);
        foreach ($mesas as $mesa) {
            if (hash('sha256', $mesa->id_buffet . $mesa->numero_mesa) == $numero_mesa_hash) {
                $sql = "SELECT
                            data_pedido
                        FROM
                            tb_pedido
                        WHERE
                            id_mesa = :mesa AND
                            id_festa = :festa
                        ORDER BY
                            data_pedido DESC
                        LIMIT 1";
                $params = [
                    'mesa' => $mesa->cd_mesa,
                    'festa' => $cd_festa
                ];
                $ultimo_pedido = parent::executeStatement($sql, $params)->fetch();
                if ($ultimo_pedido) {
                    $ultimo_pedido = $ultimo_pedido->data_pedido;
                }
                var_dump($ultimo_pedido);
                die();

                return (object) ['cd_mesa' => $mesa->cd_mesa, 'numero_mesa' => $mesa->numero_mesa, 'ultimo_pedido' => $ultimo_pedido];
            }
        }
        return false;
    }
}

