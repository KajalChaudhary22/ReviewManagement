<?php

if (!function_exists('custom_encrypt')) {
    // function custom_encrypt($string)
    // {
    //     $key = config('app.key'); // Use your APP_KEY for security
    //     $iv = substr(hash('sha256', $key), 0, 16); // Initialization vector
    //     $encrypted = openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
    //     return str_replace('/', '_', base64_encode($encrypted)); // URL safe
    // }
    function custom_encrypt($string)
    {
        $rawKey = base64_decode(config('app.key'));
        $key = hash('sha256', $rawKey, true);
        $iv = random_bytes(16);

        $customSalt = 'Sc|zOr@/AppL!c@T!0N';

        // Append your salt to the string (non-sensitive, used just to make it larger)
        $paddedString = $string . '::' . $customSalt;

        $encrypted = openssl_encrypt($paddedString, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        $combined = base64_encode($iv . $encrypted);

        return strtr($combined, ['+' => '-', '/' => '_', '=' => '~']);
    }
}

if (!function_exists('custom_decrypt')) {
    function custom_decrypt($string)
    {
        $rawKey = base64_decode(config('app.key'));
        $key = hash('sha256', $rawKey, true);

        $data = base64_decode(strtr($string, ['-' => '+', '_' => '/', '~' => '=']));
        $iv = substr($data, 0, 16);
        $ciphertext = substr($data, 16);

        $decrypted = openssl_decrypt($ciphertext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        // Remove the custom salt
        if (str_contains($decrypted, '::Sc|zOr@/AppL!c@T!0N')) {
            return explode('::Sc|zOr@/AppL!c@T!0N', $decrypted)[0];
        }

        return $decrypted;
    }

    // function custom_decrypt($string)
    // {
    //     $key = config('app.key');
    //     $iv = substr(hash('sha256', $key), 0, 16);
    //     $decoded = base64_decode(str_replace('_', '/', $string));
    //     return openssl_decrypt($decoded, 'AES-256-CBC', $key, 0, $iv);
    // }
}
