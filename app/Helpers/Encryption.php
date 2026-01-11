<?php

namespace App\Helpers;

class Encryption
{
    private static $key = 'T34mS1st3m@s.2024SIGU2@SLAEPM@6OLMSWA8XyLRnL74wqK5';
    private static $cipher = 'aes-256-cbc';

    public static function encriptar($data)
    {
        $ivLength = openssl_cipher_iv_length(self::$cipher);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encrypted = openssl_encrypt($data, self::$cipher, self::$key, 0, $iv);

        if ($encrypted === false) {
            throw new \Exception('Encryption failed');
        }

        // Encode the IV and encrypted data using base64 URL safe
        return self::base64UrlEncode($iv . $encrypted);
    }

    public static function desencriptar($data)
    {
        // Decode the data using base64 URL safe
        $data = self::base64UrlDecode($data);
        $ivLength = openssl_cipher_iv_length(self::$cipher);
        $iv = substr($data, 0, $ivLength);
        $encryptedData = substr($data, $ivLength);

        $decrypted = openssl_decrypt($encryptedData, self::$cipher, self::$key, 0, $iv);

        if ($decrypted === false) {
            throw new \Exception('Decryption failed');
        }

        return $decrypted;
    }

    private static function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private static function base64UrlDecode($data)
    {
        return base64_decode(strtr($data, '-_', '+/'));
    }

    public static function generateKey()
    {
        return self::base64UrlEncode(openssl_random_pseudo_bytes(32));
    }
}
