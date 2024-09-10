<?php

namespace Dankkomcg\Cookie;

class Cookie {
    private string $key;
    private string $value;
    private int $timeExpiration;
    private string $path;
    private string $domain;
    private bool $secure;
    private bool $httpOnly;

    public function __construct(
        string $key, 
        string $value, 
        int $timeExpiration, 
        string $cookiePath = '/', 
        string $cookieDomain = '', 
        bool $cookieSecure = false, 
        bool $cookieHttpOnly = false
    ) {
        $this->key = $key;
        $this->value = $value;
        $this->timeExpiration = $timeExpiration;
        $this->path = $cookiePath;
        $this->domain = $cookieDomain;
        $this->secure = $cookieSecure;
        $this->httpOnly = $cookieHttpOnly;

        $this->create();
    }

    public function create(): void {
        CookieHelper::setCookie(
            $this->key, 
            $this->value, 
            $this->timeExpiration, 
            $this->path, 
            $this->domain, 
            $this->secure, 
            $this->httpOnly
        );
    }

    public function delete(): void {
        CookieHelper::setCookie(
            $this->key, 
            '', 
            time() - 3600, 
            $this->path, 
            $this->domain, 
            $this->secure, 
            $this->httpOnly
        );
    }
}
