<?php

namespace App\Models;
use Core\Model\Model;
use PHPMailer\PHPMailer\PHPMailer;
use App\Tools\Tools;

abstract class Register extends Model {
    public static function Register($id, $nome, $cnpj, $email, $pfp, $senha) {
        $sql = "INSERT INTO
                    tb_buffet
                VALUES
                    (:cd_buffet, :nome_buffet, :cnpj, :url_pfp, :senha, :email, default, default)";
        $params = Tools::encryptRecord('tb_buffet', [
            'cd_buffet' => $id,
            'nome_buffet' => $nome,
            'cnpj' => $cnpj,
            'url_pfp' => $pfp,
            'senha' => password_hash($senha, PASSWORD_BCRYPT),
            'email' => $email
        ]);
        parent::executeStatement($sql, $params);
        self::SendValidation($id, $email);

        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['cnpj'] = $cnpj;
        $_SESSION['email'] = $email;
        $_SESSION['url_pfp'] = $pfp;
        $_SESSION['status'] = 'P';
    }

    private static function SendValidation($id, $email) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->Port = 465;
        
        $mail->setFrom($_ENV['MAIL_USERNAME']);
        $mail->addAddress($email);
        
        $mail->isHTML(true);
        $mail->Subject = 'Autentificar Registro';
        $mail->Body    = "Autentifique seu registro no Buffast clicando no link abaixo: <br> https://buffast.com.br/validate/$id <br> Esse link tem validade de 2 dias <br>Caso não tenha sido você, apenas ignore";

        $mail->send();
    }

    public static function Validate($id) {
        $smt = self::RegisterInfo($id);
        if ($smt->rowCount() != 1) {
            return False;
        }
        $buffet = $smt->fetch();
        if ($buffet->status_buffet == 'V') {
            return false;
        }
        $date_diff = abs(time() - strtotime($buffet->data_registro)) / (60 * 60 * 24);
        if ($date_diff > 2) {
            parent::executeStatement('DELETE FROM tb_buffet WHERE cd_buffet = :id', ['id' => $id]);
            return False;
        }        

        $sql = "UPDATE
                    tb_buffet
                SET
                    status_buffet = 'V'
                WHERE
                    cd_buffet = :id";
        parent::executeStatement($sql, ['id' => $id]);
        $_SESSION['status'] = 'V';
        return true;
    }

    private static function RegisterInfo($id) {
        return parent::executeStatement("SELECT * FROM tb_buffet WHERE cd_buffet = :id", ['id' => $id]);
    }
}
