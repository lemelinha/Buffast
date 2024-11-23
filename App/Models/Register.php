<?php

namespace App\Models;
use Core\Model\Model;
use PHPMailer\PHPMailer\PHPMailer;

class Register extends Model {
    public function enviar() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = 'support@buffast.com.br';
        $mail->Password = 'Beta5000@';
        $mail->Port = 465;
        
        $mail->setFrom('support@buffast.com.br');
        $mail->addReplyTo('globglogabgalabcapeta666@gmail.com', 'asd');
        $mail->addAddress('l.leme3008@gmail.com', 'Lucas Leme');
        $mail->addAddress('kauzago9@gmail.com', 'Kauan Zago');
        $mail->addCC('globglogabgalabcapeta666@gmail.com', 'Cópia');
        $mail->addBCC('globglogabgalabcapeta666@gmail.com', 'Cópia Oculta');
        
        $mail->isHTML(true);
        $mail->Subject = 'Autentificar Registro';
        $mail->Body    = 'Autentifique seu registro no Buffast! (aguarde)';
        $mail->AltBody = 'cuzinho';
        //$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

        if(!$mail->send()) {
            echo 'Não foi possível enviar a mensagem.<br>';
            echo 'Erro: ' . $mail->ErrorInfo;
        } else {
            echo 'Mensagem enviada.';
        }
    }
}
