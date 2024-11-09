<?php

namespace App\Tools;
use Ramsey\Uuid\Uuid;

abstract class Tools {
    private static $cipher = 'aes-256-cbc';
    private static $cache = [];
    
    // Define quais campos que criptografa: tabela => [campos]
    private static $encryptedFields = [
        'tb_buffet' => ['nome_buffet', 'cnpj', 'email', 'senha'],
        'tb_festa' => ['nome_aniversariante', 'data_aniversario', 'convidados', 'nome_responsavel', 'inicio', 'fim']
    ];
    
    // Verifica se um campo específico deve ser criptografado
    public static function shouldEncrypt($table, $field) {
        return isset(self::$encryptedFields[$table]) && 
               in_array($field, self::$encryptedFields[$table]);
    }
    
    public static function encryptRecord($table, $data) {
        if (!is_array($data) && !is_object($data)) {
            return $data;
        }
        
        // Converte objeto para array se necessário
        $isObject = is_object($data);
        $array = $isObject ? get_object_vars($data) : $data;
        
        // Prepara arrays para processamento em lote
        $batchData = [];
        $fields = [];
        
        // Separa campos que precisam ser criptografados
        foreach ($array as $field => $value) {
            if (self::shouldEncrypt($table, $field)) {
                $batchData[$field] = $value;
                $fields[] = $field;
            }
        }
        
        // Se houver campos para criptografar, processa em lote
        if (!empty($batchData)) {
            $encrypted = self::encryptBatch($batchData);
            foreach ($fields as $field) {
                $array[$field] = $encrypted[$field];
            }
        }
        
        // Retorna no mesmo formato que recebeu
        return $isObject ? (object)$array : $array;
    }
    
    public static function decryptRecord($table, $data) {
        if (!is_array($data) && !is_object($data)) {
            return $data;
        }
        
        // Converte objeto para array se necessário
        $isObject = is_object($data);
        $array = $isObject ? get_object_vars($data) : $data;
        
        // Decriptografa apenas os campos necessários
        foreach ($array as $field => &$value) {
            if (self::shouldEncrypt($table, $field)) {
                $value = self::decrypt($value);
            }
        }
        
        // Retorna no mesmo formato que recebeu
        return $isObject ? (object)$array : $array;
    }
    
    public static function encrypt($data) {
        // Se o dado for nulo ou vazio, retorna imediatamente
        if ($data === null || $data === '') {
            return $data;
        }
        
        // Gera IV uma vez e reutiliza para o mesmo batch de dados
        static $iv = null;
        if ($iv === null) {
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$cipher));
        }
        
        $encrypted = openssl_encrypt($data, self::$cipher, $_ENV['CRYPT_KEY'], 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }
    
    public static function decrypt($data) {
        // Se o dado for nulo ou vazio, retorna imediatamente
        if ($data === null || $data === '') {
            return $data;
        }
        
        // Verifica se já foi descriptografado antes
        $cacheKey = md5($data);
        if (isset(self::$cache[$cacheKey])) {
            return self::$cache[$cacheKey];
        }
        
        list($encryptedData, $iv) = explode('::', base64_decode($data), 2);
        $decrypted = openssl_decrypt($encryptedData, self::$cipher, $_ENV['CRYPT_KEY'], 0, $iv);
        
        // Armazena no cache
        self::$cache[$cacheKey] = $decrypted;
        
        return $decrypted;
    }
    
    public static function decryptRecursive($table, &$input) {
        if (is_array($input)) {
            foreach ($input as &$item) {
                if (is_object($item) || is_array($item)) {
                    self::decryptRecursive($table, $item);
                }
            }
        } elseif (is_object($input)) {
            $vars = get_object_vars($input);
            foreach ($vars as $key => $value) {
                if (self::shouldEncrypt($table, $key)) {
                    $input->$key = self::decrypt($value);
                } elseif (is_object($value) || is_array($value)) {
                    self::decryptRecursive($table, $input->$key);
                }
            }
        }
    }
    
    // Método para limpar o cache quando necessário
    public static function clearCache() {
        self::$cache = [];
    }
    
    // Método para criptografar em lote
    public static function encryptBatch(array $data) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$cipher));
        $results = [];
        
        foreach ($data as $key => $value) {
            if ($value === null || $value === '') {
                $results[$key] = $value;
                continue;
            }
            
            $encrypted = openssl_encrypt($value, self::$cipher, $_ENV['CRYPT_KEY'], 0, $iv);
            $results[$key] = base64_encode($encrypted . '::' . $iv);
        }
        
        return $results;
    }

    public static function UUID() {
        $uuid = Uuid::uuid4();
        return $uuid->toString();
    }

    public static function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}