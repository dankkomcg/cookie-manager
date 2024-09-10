<?php

use PHPUnit\Framework\TestCase;
use Dankkomcg\Cookie\CookieManager;

class CookieManagerTest extends TestCase {

    public function testCookieManagerCreatesCookie() {
        // Crear una cookie usando el CookieManager
        CookieManager::create('session_key', 'session_value', time() + 3600, '/', 'example.com', true, true);

        // Verificar que la cookie se ha creado correctamente
        $this->assertEquals('session_value', $_COOKIE['session_key']);
    }

    public function testCookieManagerDeletesCookie() {
        // Crear una cookie para eliminarla luego
        CookieManager::create('delete_key', 'delete_value', time() + 3600, '/', 'example.com', true, true);

        // Eliminar la cookie
        CookieManager::delete('delete_key', '/', 'example.com');

        // Verificar que la cookie ha sido eliminada
        $this->assertNotEquals('delete_value', $_COOKIE['delete_key'] ?? null);
    }
}
