# Simple PHP cookie manager

![Packagist Version](https://img.shields.io/packagist/v/dankkomcg/cookie)
![Total Downloads](https://img.shields.io/packagist/dt/dankkomcg/cookie)
![PHP Version](https://img.shields.io/packagist/php-v/dankkomcg/cookie)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Librería de PHP para gestionar cookies de manera simple y eficiente. Facilita la creación, eliminación y gestión de cookies.

## Instalación

Instala la librería utilizando Composer:

```bash
composer require dankkomcg/cookie-manager
```

## Uso

### Crear una cookie

Para crear una cookie, utiliza el método `create` de la clase `CookieManager`. Puedes definir el nombre, valor, tiempo de expiración y otras propiedades de la cookie.

```php
use Dankkomcg\Cookie\CookieManager;

// Crear una cookie que expira en 1 hora
CookieManager::create('user_session', 'abc123', time() + 3600, '/', 'example.com', true, true);
```

### Eliminar una cookie

Para eliminar una cookie, simplemente usa el método `delete`. Esto marcará la cookie como expirada y la eliminará del navegador.

```php
use Dankkomcg\Cookie\CookieManager;

// Eliminar una cookie
CookieManager::delete('user_session', '/', 'example.com');
```

### Listar todas las cookies

Puedes obtener todas las cookies creadas y gestionarlas:

```php
use Dankkomcg\Cookie\CookieManager;

// Obtener todas las cookies
$cookies = CookieManager::getCookies();
print_r($cookies);
```

### Zona horaria

Como recomendación, si tu servidor y los usuarios están en diferentes zonas horarias, asegúrate de que el servidor esté configurado con la zona horaria correcta para evitar problemas con la expiración de las cookies. Puedes hacerlo usando `date_default_timezone_set()` en donde consideres:

```php
// Configurar la zona horaria del servidor
date_default_timezone_set('Europe/Madrid');
```

### Tests

Se incluyen pruebas unitarias con `PHPUnit`. Para ejecutarlas:

```bash
vendor/bin/phpunit
```

Las pruebas están diseñadas para simular las operaciones de creación y eliminación de cookies, asegurando que el comportamiento sea el esperado:

```text
Cannot modify header information - headers already sent...
```

Hemos creado un `mock` mediante la clase `CookieHelper`, que encapsula el seteo nativo de la cookie, como ya hemos mencionado más arriba.

## Contribución

Si deseas contribuir a este proyecto, puedes hacer un fork del repositorio, crear una nueva rama para tus cambios y enviar un pull request. ¡Todas las contribuciones son bienvenidas!

1. Haz un fork del proyecto
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`)
3. Realiza tus cambios
4. Haz commit de tus cambios (`git commit -m 'Agregar nueva funcionalidad'`)
5. Envía un push a la rama (`git push origin feature/nueva-funcionalidad`)
6. Abre un pull request

## Licencia

Este proyecto está licenciado bajo la **MIT License**. Consulta el archivo `LICENSE` para más detalles.