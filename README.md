# 🧠 brainiac

A PHP schema validation library, heavily inspired by [Zod](https://zod.dev).

## Installation

`composer require jannbar/brainiac`

## Usage

At the moment, the following data types are supported:

- [Arrays](#arrays)
- [Booleans](#booleans)
- [Numbers](#numbers)
- [Strings](#strings)

You may either use the `parse` or `safe_parse` method.
`parse` will throw an exception when validation fails, while `safe_parse` will always
return an associative array with the following shape, based on validation success:

```php
// On validation success.
$success = [
  "success" => true,
  "data" => "parsed value",
];

// On validation failure.
$failure = [
  "success" => false,
  "error" => "error message",
];
```

### Arrays

```php
<?php

use Jannbar/Brainiac/Brainiac;

Brainiac::array()->parse([4, 2]);
Brainiac::array()->min(1)->parse([4, 2]);
Brainiac::array()->max(10)->parse([4, 2]);
Brainiac::array()->of(Brainiac::number())->parse([4, 2]);
```

### Booleans

```php
<?php

use Jannbar/Brainiac/Brainiac;

Brainiac::boolean()->parse(true);
```

### Numbers

```php
<?php

use Jannbar/Brainiac/Brainiac;

Brainiac::number()->parse(42);
Brainiac::number()->min(1)->parse(42);
Brainiac::number()->max(10)->parse(42);
```

### Strings

```php
<?php

use Jannbar/Brainiac/Brainiac;

Brainiac::string()->parse('foo');
Brainiac::string()->min(1)->parse('foo');
Brainiac::string()->max(10)->parse('foo');
```
