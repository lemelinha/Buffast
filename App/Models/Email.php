<?php

namespace App\Models;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public static function SendEmail(string $email, string $subject, string $body): bool {
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
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
        $mail->Subject = $subject;
        $mail->Body    = $body;

        if ($mail->send()) {
            return true;
        }
        return false;
    }
}
