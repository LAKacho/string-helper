# lakacho/string-helper

Small string helpers: Cyrillic transliteration and URL slugs. PSR-4 autoloading.

## Installation

```bash
composer require lakacho/string-helper
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use Lakacho\StringHelper\Slugger;

$slugger = new Slugger();

echo $slugger->transliterate('Привет');      // privet
echo $slugger->slugify('Привет, мир!');      // privet-mir
echo $slugger->slugify('Hello Мир', '_');    // hello_mir
```

## Tests

```bash
composer install
composer test
```

## License

MIT
