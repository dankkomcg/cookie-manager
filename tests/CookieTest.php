<?php

use PHPUnit\Framework\TestCase;
use Dankkomcg\Cookie\Cookie;
use Dankkomcg\Cookie\CookieHelper;

class CookieTest extends TestCase {

    public function testCookieCreation() {
        // Mockeamos CookieHelper
        $cookieHelperMock = $this->getMockBuilder(CookieHelper::class)
                                 ->setMethods(['setCookie'])
                                 ->getMock();

        // Esperamos que setCookie sea llamado con ciertos parámetros
        $cookieHelperMock->expects($this->once())
                         ->method('setCookie')
                         ->with(
                             $this->equalTo('test_key'),
                             $this->equalTo('test_value'),
                             $this->greaterThan(time()),
                             $this->equalTo('/'),
                             $this->equalTo('example.com'),
                             $this->equalTo(true),
                             $this->equalTo(true)
                         );

        // Inyectar el mock en la clase Cookie
        $cookie = new Cookie('test_key', 'test_value', time() + 3600, '/', 'example.com', true, true);
    }

    public function testCookieDeletion() {
        // Mockeamos CookieHelper
        $cookieHelperMock = $this->getMockBuilder(CookieHelper::class)
                                 ->setMethods(['setCookie'])
                                 ->getMock();

        // Esperamos que setCookie sea llamado para eliminar la cookie
        $cookieHelperMock->expects($this->once())
                         ->method('setCookie')
                         ->with(
                             $this->equalTo('test_key'),
                             $this->equalTo(''),
                             $this->lessThan(time()),
                             $this->equalTo('/'),
                             $this->equalTo('example.com'),
                             $this->equalTo(true),
                             $this->equalTo(true)
                         );

        // Inyectar el mock en la clase Cookie y eliminar la cookie
        $cookie = new Cookie('test_key', 'test_value', time() + 3600, '/', 'example.com', true, true);
        $cookie->delete();
    }
}
