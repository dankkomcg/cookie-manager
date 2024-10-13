# Simple PHP Cookie Manager

![Packagist Version](https://img.shields.io/packagist/v/dankkomcg/cookie-manager)
![Build Status](https://img.shields.io/travis/dankkomcg/cookie-manager/main)
![Coverage Status](https://img.shields.io/coveralls/github/dankkomcg/cookie-manager/main)
![License](https://img.shields.io/github/license/dankkomcg/cookie-manager)

A simple and efficient PHP library for managing cookies. It simplifies the creation, deletion, and management of cookies.

## Installation

Install the library using Composer:

```bash
composer require dankkomcg/cookie-manager
```

## Usage

### Create a Cookie

To create a cookie, use the `create` method from the `CookieManager` class. You can define the name, value, expiration time, and other properties of the cookie.

```php
use Dankkomcg\Cookie\CookieManager;

// Create a cookie that expires in 1 hour
CookieManager::create('user_session', 'abc123', time() + 3600, '/', 'example.com', true, true);
```

### Delete a Cookie

To delete a cookie, simply use the `delete` method. This will mark the cookie as expired and remove it from the browser.

```php
use Dankkomcg\Cookie\CookieManager;

// Delete a cookie
CookieManager::delete('user_session', '/', 'example.com');
```

### List All Cookies

You can retrieve all created cookies and manage them:

```php
use Dankkomcg\Cookie\CookieManager;

// Get all cookies
$cookies = CookieManager::getCookies();
print_r($cookies);
```

### Timezone Consideration

If your server and users are in different time zones, ensure your server is set to the correct time zone to avoid issues with cookie expiration. You can do this using:

```php
// Set server timezone
date_default_timezone_set('Europe/Madrid');
```

### Testing

Unit tests are included with `PHPUnit`. To run them:

```bash
vendor/bin/phpunit
```

The tests simulate cookie creation and deletion operations to ensure expected behavior:

```
Cannot modify header information - headers already sent...
```

We have created a `mock` using the `CookieHelper` class, which encapsulates the native cookie setting as mentioned above.

## Contributing

If you wish to contribute to this project, you can fork the repository, create a new branch for your changes, and submit a pull request. All contributions are welcome!

- Fork the project
- Create a new branch (`git checkout -b feature/new-feature`)
- Make your changes
- Commit your changes (`git commit -m 'Add new feature'`)
- Push to the branch (`git push origin feature/new-feature`)
- Open a pull request

## License

This project is licensed under the **MIT License**. See the `LICENSE` file for more details.
```

**Notas sobre los badges:**

- **Packagist Version**: Muestra la versión actual de la librería en Packagist.
- **Build Status**: Indica el estado de la última compilación (requiere integración con Travis CI o similar).
- **Coverage Status**: Muestra el porcentaje de cobertura de pruebas (requiere integración con Coveralls o similar).
- **License**: Indica el tipo de licencia del proyecto.
