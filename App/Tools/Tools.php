<?php

namespace App\Tools;
use App\Connection;
use Ramsey\Uuid\Uuid;

abstract class Tools {
    private const CIPHER = 'aes-256-cbc';
    private static array $cache = [];
    private static string $key;
    private static ?string $iv = null;

    // Mapa de campos criptografados por tabela
    private const ENCRYPTED_FIELDS = [
        'tb_buffet' => ['nome_buffet', 'cnpj', 'email', 'url_pfp'],
        'tb_festa' => ['nome_aniversariante', 'data_aniversario', 'nome_responsavel', 'cpf_responsavel']
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
            if ($isObject) {
                foreach ($array as $field => $value) {
                    if (self::shouldEncrypt($table, $field)) {
                        $array[$field] = self::decrypt($value);
                    }
                }
            } else {
                foreach ($array as $obj) {
                    foreach ($obj as $field => $value) {
                        if (self::shouldEncrypt($table, $field)) {
                            $obj->$field = self::decrypt($value);
                        }
                    }
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
            
            $results[$key] = self::encrypt($value);
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

    public static function CNPJExists(string $cnpj): bool {
        $sql = "SELECT
                    cnpj
                FROM
                    tb_buffet
                WHERE
                    status_buffet = 'V' OR
                    DATEDIFF(NOW(), data_registro) < 2";
        $conn = Connection::connect();
        $results = $conn->query($sql)->fetchAll();
        foreach($results as $result) {
            if (self::decrypt($result->cnpj) == $cnpj) return true;
        }
        return false;
    }

    public static function EmailExists(string $email): bool {
        $sql = "SELECT
                    email
                FROM
                    tb_buffet
                WHERE
                    status_buffet = 'V' OR
                    DATEDIFF(NOW(), data_registro) < 2";
        $conn = Connection::connect();
        $results = $conn->query($sql)->fetchAll();
        foreach($results as $result) {
            if (self::decrypt($result->email) == $email) return true;
        }
        return false;
    }

    public static function UploadImage(string $id, array $image, bool $isPFP, ?string $imageToRemove='', ?string $cd_buffet=''): array {
        switch($image['error']) {
            case UPLOAD_ERR_INI_SIZE:
                return ['ok' => false, 'msg' => 'Arquivo muito pesado'];
            case UPLOAD_ERR_FORM_SIZE:
                return ['ok' => false, 'msg' => 'Arquivo muito pesado'];
            case UPLOAD_ERR_PARTIAL:
                return ['ok' => false, 'msg' => 'Falha no upload'];
            case UPLOAD_ERR_NO_FILE:
                return ['ok' => false, 'msg' => 'Arquivo vazio'];
            case UPLOAD_ERR_NO_TMP_DIR:
                return ['ok' => false, 'msg' => 'Pasta temporária ausente'];
            case UPLOAD_ERR_CANT_WRITE:
                return ['ok' => false, 'msg' => 'Falha em salvar arquivo'];
        }

        $allowedTypes = ['image/jpeg', 'image/png'];
        
        // Verifica o tipo do arquivo
        if (!in_array($image['type'], $allowedTypes)) {
            return ['ok' => false, 'msg' => 'Tipo de arquivo não permitido. (JPG, PNG)'];
        }

        if ($isPFP) {
            $uploadDir = ABSOLUTE_PATH . '/public/assets/images/' . $id . '/';
            $ref = '/assets/images/' . $id . '/';
        } else {
            $uploadDir = ABSOLUTE_PATH . '/public/assets/images/' . $cd_buffet . '/';
            $ref = '/assets/images/' . $cd_buffet . '/';
        }

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if ($isPFP) {
            $fileName = 'pfp';
        } else {
            $fileName = hash('sha256', time() . $id);
        }

        if (!empty($imageToRemove)) {
            self::RemoveFile($imageToRemove);
        }

        $fileName = $fileName . '.' . $fileExtension;
        $filePath = $uploadDir . $fileName;

        $ref = $ref . $fileName;

        if (move_uploaded_file($image['tmp_name'], $filePath)) {
            return ['ok' => true, 'path' => $ref];
        } else {
            return ['ok' => false, 'msg' => 'Erro ao salvar o arquivo'];
        }
    }

    public static function RemoveFile($path) {
        if (file_exists(ABSOLUTE_PATH . '/public' . $path) && !is_dir(ABSOLUTE_PATH . '/public' . $path)) {
            unlink(ABSOLUTE_PATH . '/public' . $path);
        }
    }

    public static function DeletePendentAccounts() {
        $sql = "DELETE FROM
                    tb_buffet
                WHERE
                    status_buffet = 'P' AND
                    DATEDIFF(NOW(), data_registro) > 2";
        Connection::connect()->query($sql);
    }
}