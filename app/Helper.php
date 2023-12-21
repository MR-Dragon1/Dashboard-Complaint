<?php

if(!function_exists("getUserIP")) {
    function getUserIP($getKey = false)
    {
        if( !empty( request()->server('HTTP_CF_CONNECTING_IP') ) ) {
            if ($getKey) {
                return [
                    "HTTP_CF_CONNECTING_IP" => request()->server('HTTP_CF_CONNECTING_IP')
                ];
            }
            return request()->server('HTTP_CF_CONNECTING_IP');
        }else if( !empty( request()->server('HTTP_X_FORWARDED_FOR') ) ) {
            if ($getKey) {
                return [
                    "HTTP_X_FORWARDED_FOR" => request()->server('HTTP_X_FORWARDED_FOR')
                ];
            }
            return explode(",", request()->server('HTTP_X_FORWARDED_FOR'))[0];
        }else{
            if ($getKey) {
                return [
                    "HTTP_ADDR" => request()->server('HTTP_ADDR')
                ];
            }
            return request()->getClientIp();
        }
    }
}


if (!function_exists('isSpam')) {
    function isSpam($input)
    {
        $patterns = [
            '/([a-zA-Z])\1{3,}/', // Pendeteksian huruf berulang lebih dari 2 kali
            '/\b(?:viagra|cialis|herbal\W*remedy)\b/i',
            '/\b(?:https?:\/\/)?example\.com\b/i',  //email tidak sesuai
            '/\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}\b/',
            '/\d{5,}/' // Mendeteksi angka yang muncul lebih dari 5 kali berturut-turut
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $input)) {
                // Jika pola spam ditemukan, lakukan tindakan yang sesuai, misalnya memblokir atau memberi peringatan
                return true; // Input terdeteksi sebagai spam
            }
        }

        return false; // Input tidak terdeteksi sebagai spam
    }
}
