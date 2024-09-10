<?php

namespace Dankkomcg\Cookie;

class CookieHelper {
    public static function setCookie(
        string $key,
        string $value,
        int $timeExpiration,
        string $path = '/',
        string $domain = '',
        bool $secure = false,
        bool $httpOnly = false
    ): void {
        setcookie($key, $value, $timeExpiration, $path, $domain, $secure, $httpOnly);
    }
}
