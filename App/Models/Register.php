<?php

namespace App\Models;
use Core\Model\Model;
use PHPMailer\PHPMailer\PHPMailer;

abstract class Register extends Model {
    public static function SendValidation(string $id, string $email): bool {
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

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}
