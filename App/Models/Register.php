<?php

namespace App\Models;
use Core\Model\Model;
use App\Models\Email;

abstract class Register extends Model {
    public static function SendValidation(string $id, string $nome_buffet, string $email): bool {
        $subject = "Autentifique sua conta";

        $body = "Olá $nome_buffet. Foi realizado um registro em nosso sistema com este endereço de email.<br>Autentifique seu registro no Buffast clicando no link abaixo: <br> https://buffast.com.br/validate/$id <br> Esse link tem validade de 2 dias <br>Caso não tenha sido você, apenas ignore";

        return Email::SendEmail($email, $subject, $body);
    }
}
