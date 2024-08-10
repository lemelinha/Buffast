<?php

namespace App\Models;
use Core\Model\Model;

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
        $query->bindParam(':user', $user);
        $query->execute();
        
        if($query->rowCount() == 0){
            return false;
        }

        $result = $query->fetchAll()[0];

        if(password_verify($password, $result->cd_senha)){
            $_SESSION['logged'] = [
                'type' => 'buffet',
                'buffetId' => $result->cd_buffet,
                'username' => $result->nm_usuario
            ];
            return true;
        }
        return false;
    }

    public function AuthAdmin($user, $password){
        if($user == $_ENV['ADMIN_USER'] && password_verify($password, $_ENV['ADMIN_PASSWORD_HASH'])){
            $_SESSION['logged'] = [
                'type' => 'admin',
            ];
            return true;
        }
        return false;
    }
}
