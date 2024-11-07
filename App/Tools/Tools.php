<?php

namespace App\Tools;
use App\Connection;

abstract class Tools {
    public static function encrypt($data) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $_ENV['CRYPT_KEY'], 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public static function decrypt($data) {
        list($encryptedData, $iv) = explode('::', base64_decode($data), 2);
	    return openssl_decrypt($encryptedData, 'aes-256-cbc', $_ENV['CRYPT_KEY'], 0, $iv);
    }

    public static function startsWithAny($string, $words) {
        foreach ($words as $word) {
            if (str_starts_with($string, $word)) {
                return true;
            }
        }
        return false; 
    }

    public static function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
}
