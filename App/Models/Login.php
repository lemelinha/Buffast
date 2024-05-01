<?php

namespace App\Models;
use Needs\Model\Model;

class Login extends Model {
    public function Auth($user, $password){
        $sql = "
            SELECT
                *
            FROM
                tb_buffet
            WHERE
                nm_usuario = :user
        ";
        
        $query = $this->db->prepare($sql);
        $query->bindValue(':user', $user);
        $query->execute();

        $result = $query->fetchAll();

        if(password_verify($password, $result->cd_senha)){
            unset($_SESSION['logged']);
            $_SESSION['logged'] = [
                'type' => 'buffet',
                'buffetId' => $result->cd_buffet
            ];
            return true;
        }
        return false;
    }

    public function AuthAdmin($user, $password){
        if($user == $_ENV['ADMIN_USER'] && password_verify($password, $_ENV['ADMIN_PASSWORD_HASH'])){
            $_SESSION['logged'] = [
                'type' => 'admin',
                'buffetId' => $result->cd_buffet
            ];
            return true;
        }
        return false;
    }
}
