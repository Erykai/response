# response
response json, array and object with translation into any language

## Installation

Composer:

```bash
"erykai/response": "1.0.*"
```

Terminal

```bash
composer require erykai/response
```

Create config.php

```php
const RESPONSE_TRANSLATE_PATH = 'translate';
```

Response Json

```php
use Erykai\Response\Response;
require "test/config.php";
require "vendor/autoload.php";
$response = new Response();

$data = new stdClass();
$data->code = 200;
$data->type = 'success';
$data->message = "hello my name is alex vidal and my email is webav.com.br@gmail.com";
$data->data = null;
$data->dynamic = "alexvidal@as.com";

echo $response->data($data)->json();
```
Response Json translate language browser

```php
echo $response->data($data)->lang()->json();
```

Response Json translate define language 

```php
echo $response->data($data)->lang('en')->json();
```
Response Array

```php
var_dump($response->data($data)->array());
```
Response Array translate language browser

```php
var_dump($response->data($data)->lang()->array());
```

Response Array translate define language

```php
var_dump($response->data($data)->lang('en')->array());
```

Response Object

```php
var_dump($response->data($data)->object());
```
Response Object translate language browser

```php
var_dump($response->data($data)->lang()->object());
```

Response Object translate define language

```php
var_dump($response->data($data)->lang('en')->object());
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
