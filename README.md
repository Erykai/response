# response
[![Maintainer](http://img.shields.io/badge/maintainer-@alexdeovidal-blue.svg?style=flat-square)](https://instagram.com/alexdeovidal)
[![Source Code](http://img.shields.io/badge/source-erykai/response-blue.svg?style=flat-square)](https://github.com/erykai/response)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/erykai/response.svg?style=flat-square)](https://packagist.org/packages/erykai/response)
[![Latest Version](https://img.shields.io/github/release/erykai/response.svg?style=flat-square)](https://github.com/erykai/response/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Quality Score](https://img.shields.io/scrutinizer/g/erykai/response.svg?style=flat-square)](https://scrutinizer-ci.com/g/erykai/response)
[![Total Downloads](https://img.shields.io/packagist/dt/erykai/response.svg?style=flat-square)](https://packagist.org/packages/erykai/response)

Receive an object and return it as an array, json or object

## Installation

Composer:

```bash
"erykai/response": "1.1.*"
```

Terminal

```bash
composer require erykai/response
```


Response Json

```php
use Erykai\Response\Response;
require "vendor/autoload.php";
$response = new Response();

$data = new stdClass();
$data->code = 200;
$data->type = 'success';
$data->message = "hello my name is alex vidal and my email is contato@webav.com.br";
$data->data = null;
$data->dynamic = "contato@webav.com.br";

echo $response->data($data)->json();
print_r($response->data($data)->array());
print_r($response->data($data)->object());

```

## Contribution

All contributions will be analyzed, if you make more than one change, make the commit one by one.

## Support


If you find faults send an email reporting to webav.com.br@gmail.com.

## Credits

- [Alex de O. Vidal](https://github.com/alexdeovidal) (Developer)
- [All contributions](https://github.com/erykai/response/contributors) (Contributors)

## License

The MIT License (MIT). Please see [License](https://github.com/erykai/response/LICENSE) for more information.
