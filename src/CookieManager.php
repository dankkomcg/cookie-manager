<?php

namespace Dankkomcg\Cookie;

class CookieManager {

    // Crear una cookie
    public static function create(
        string $key, 
        string $value, 
        int $timeExpiration, 
        string $cookiePath = '/', 
        string $cookieDomain = '', 
        bool $cookieSecure = false, 
        bool $cookieHttpOnly = false
    ): Cookie {
        return new Cookie(
            $key, $value, $timeExpiration, $cookiePath, $cookieDomain, $cookieSecure, $cookieHttpOnly
        );
    }

    // Eliminar una cookie por su clave
    public static function delete(string $key, string $cookiePath = '/', string $cookieDomain = ''): void {        
        // Usamos setcookie directamente para asegurarnos que la cookie se elimine sin necesidad de crear una nueva instancia de Cookie
        setcookie(
            $key, '', -1, $cookiePath, $cookieDomain, true, false
        );
    }

    // Obtener el valor de una cookie
    public static function get(string $key): ?string {
        return $_COOKIE[$key] ?? null;
    }

    // Verificar si una cookie existe
    public static function exists(string $key): bool {
        return isset($_COOKIE[$key]);
    }
}
