<?php

namespace App\Tools;
use App\Connection;

abstract class Tools {
    public static function random_strings($length_of_string) {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        return substr(str_shuffle($str_result), 
                           0, $length_of_string);
    }

    public static function encrypt($data) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $_ENV['CRYPT_KEY'], 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public static function decrypt($data) {
        list($encryptedData, $iv) = explode('::', base64_decode($data), 2);
	    return openssl_decrypt($encryptedData, 'aes-256-cbc', $_ENV['CRYPT_KEY'], 0, $iv);
    }

    public static function decryptRecursive(&$input) {
        $keysToDecrypt = ['nome', 'telefone', 'cpf', 'rg', 'email', 'nascimento', 'uf', 'cidade', 'bairro', 'logradouro', 'numero', 'complemento', 'cep'];
        if (is_object($input)) {
            foreach ($input as $key => $value) {
                if (!Tools::startsWithAny($key, $keysToDecrypt)) continue;
                $input->$key = Tools::decrypt($value);
            }
            // Verifica recursão em propriedades que são arrays
            foreach ($input as $key => $value) {
                if (is_array($value)) {
                    Tools::decryptRecursive($input->$key);
                }
            }
        }
        
        if (is_array($input)) {
            $ordenar = false;
            foreach ($input as &$value) {
                Tools::decryptRecursive($value);
                if (property_exists($value, 'cd_aluno') || property_exists($value, 'cd_docente')) {
                    $ordenar = true;
                }
            }
            if ($ordenar) {
                $grupos = [];
                foreach ($input as $objeto) {
                    $grupos[$objeto->id_cargo!=1?$objeto->id_cargo:$objeto->id_turma][] = $objeto;
                }
                // Ordenando os nomes dentro de cada grupo
                foreach ($grupos as $cargo => $grupo) {
                    usort($grupo, function($a, $b) {
                        return strcmp($a->nome_aluno??$a->nome_docente, $b->nome_aluno??$b->nome_docente);
                    });
                    $grupos[$cargo] = $grupo;
                }
                // Mantendo a estrutura original do input
                $resultado = [];
                foreach ($grupos as $grupo) {
                    foreach ($grupo as $objeto) {
                        $resultado[] = $objeto; // Adiciona os objetos ordenados ao resultado
                    }
                }
                $input = $resultado;
            }
        }
    }

    public static function startsWithAny($string, $words) {
        foreach ($words as $word) {
            // Verifica se a string começa com a palavra
            if (strpos($string, $word) === 0) {
                return true; // Retorna verdadeiro se a string começar com uma das palavras
            }
        }
        return false; // Retorna falso se não começar com nenhuma das palavras
    }

    public static function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}