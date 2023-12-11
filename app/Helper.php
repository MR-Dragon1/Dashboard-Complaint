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
