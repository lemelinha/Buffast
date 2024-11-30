<?php

namespace App\Models;
use Core\Model\Model;
use App\Tools\Tools;
use App\Models\Buffet\Buffet;

abstract class Login extends Model {
    public static function LoginAuth($userEmail, $userSenha) {
        $sql = "SELECT
                    *
                FROM
                    tb_buffet";
        $results = parent::executeStatement($sql)->fetchAll();
        foreach ($results as $result) {
            $email = Tools::decrypt($result->email);
            $senha = $result->senha;
            
            if ($email == $userEmail && password_verify($userSenha, $senha)) {
                new Buffet($result->cd_buffet);
                return True;
            }
        }
        return False;
    }

    public static function Logout() {
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 84000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        foreach($_SESSION as $i => $v) {
            unset($_SESSION[$i]);
        }
        session_destroy();
    }

    public static function RedefinirSenha($cd_buffet, $senha) {
        $sql = "UPDATE
                    tb_buffet
                SET
                    senha = :senha
                WHERE
                    cd_buffet = :cd_buffet";
        $params = [
            'senha' => password_hash($senha, PASSWORD_BCRYPT),
            'cd_buffet' => $cd_buffet
        ];
        try {
            parent::executeStatement($sql, $params);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
