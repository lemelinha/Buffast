<?php

namespace App\Tools;

use Ramsey\Uuid\Uuid;

abstract class Tools {
    private const CIPHER = 'aes-256-cbc';
    private static array $cache = [];
    private static string $key;
    private static ?string $iv = null;

    // Mapa de campos criptografados por tabela
    private const ENCRYPTED_FIELDS = [
        'tb_buffet' => ['nome_buffet', 'cnpj', 'email'],
        'tb_festa' => ['nome_aniversariante', 'data_aniversario', 'nome_responsavel']
    ];

    private static function InitKey(): void {
        if (empty(self::$key)) {
            self::$key = hash('sha256', $_ENV['CRYPT_KEY'], true);
        }
    }

    public static function shouldEncrypt(string $table, string $field): bool {
        return isset(self::ENCRYPTED_FIELDS[$table]) && 
               in_array($field, self::ENCRYPTED_FIELDS[$table], true);
    }

    /**
     * Processa um registro para criptografia/descriptografia
     *
     * @param string $table Nome da tabela
     * @param array|object $data Dados a serem processados
     * @param bool $encrypt True para criptografar, false para descriptografar
     * @return array|object
     */
    private static function processRecord(string $table, $data, bool $encrypt) {
        if (!is_array($data) && !is_object($data)) {
            return $data;
        }

        $isObject = is_object($data);
        $array = $isObject ? get_object_vars($data) : $data;
        
        if ($encrypt) {
            $batchData = [];
            foreach ($array as $field => $value) {
                if (self::shouldEncrypt($table, $field)) {
                    $batchData[$field] = $value;
                }
            }
            
            if (!empty($batchData)) {
                $processed = self::encryptBatch($batchData);
                $array = array_merge($array, $processed);
            }
        } else {
            foreach ($array as $field => $value) {
                if (self::shouldEncrypt($table, $field)) {
                    $array[$field] = self::decrypt($value);
                }
            }
        }

        return $isObject ? (object)$array : $array;
    }

    public static function encryptRecord(string $table, $data) {
        return self::processRecord($table, $data, true);
    }

    public static function decryptRecord(string $table, $data) {
        return self::processRecord($table, $data, false);
    }

    private static function getIV(): string {
        if (self::$iv === null) {
            self::$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::CIPHER));
        }
        return self::$iv;
    }

    public static function encrypt(?string $data): ?string {
        self::InitKey();

        if ($data === null || $data === '') {
            return $data;
        }

        $iv = self::getIV();
        $encrypted = openssl_encrypt($data, self::CIPHER, self::$key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public static function decrypt(?string $data): ?string {
        self::InitKey();

        if ($data === null || $data === '') {
            return $data;
        }

        $cacheKey = md5($data);
        if (isset(self::$cache[$cacheKey])) {
            return self::$cache[$cacheKey];
        }

        [$encryptedData, $iv] = explode('::', base64_decode($data), 2);
        $decrypted = openssl_decrypt($encryptedData, self::CIPHER, self::$key, OPENSSL_RAW_DATA, $iv);
        
        self::$cache[$cacheKey] = $decrypted;
        return $decrypted;
    }

    public static function decryptRecursive(string $table, &$input): void {
        if (is_array($input)) {
            foreach ($input as &$item) {
                if (is_object($item) || is_array($item)) {
                    self::decryptRecursive($table, $item);
                }
            }
        } elseif (is_object($input)) {
            foreach (get_object_vars($input) as $key => $value) {
                if (self::shouldEncrypt($table, $key)) {
                    $input->$key = self::decrypt($value);
                } elseif (is_object($value) || is_array($value)) {
                    self::decryptRecursive($table, $input->$key);
                }
            }
        }
    }

    public static function encryptBatch(array $data): array {
        if (empty($data)) {
            return [];
        }

        $iv = self::getIV();
        $results = [];
        
        foreach ($data as $key => $value) {
            if ($value === null || $value === '') {
                $results[$key] = $value;
                continue;
            }
            
            $encrypted = openssl_encrypt($value, self::CIPHER, self::$key, OPENSSL_RAW_DATA, $iv);
            $results[$key] = base64_encode($encrypted . '::' . $iv);
        }
        
        return $results;
    }

    public static function clearCache(): void {
        self::$cache = [];
    }

    public static function UUID(): string {
        return Uuid::uuid4()->toString();
    }

    public static function isAjax(): bool {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}