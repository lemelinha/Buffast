<?php

namespace App\Models;
use Core\Model\Model;
use App\Tools\Tools;

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
                $_SESSION['id'] = $result->cd_buffet;
                $_SESSION['nome'] = Tools::decrypt($result->nome_buffet);
                $_SESSION['cnpj'] = Tools::decrypt($result->cnpj);
                $_SESSION['email'] = $email;
                $_SESSION['url_pfp'] = Tools::decrypt($result->url_pfp);
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
}
