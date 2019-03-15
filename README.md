# Autoloader
`Xesau\Autoloader` is a simple PHP autoloader script

## Usage

```php
<?php

namespace Xesau\MyApp;

use Xesau\Autoloader;

use Xesau\Router;

include_once 'src/Xesau/Autoloader.php';

(new Autoloader('/path/to/vendor'))->register();
(new Autoloader('/path/to/app', __NAMESPACE__))->register();

$router = new Router(); // is automatically loaded from /path/to/vendor/Xesau/Router.php

MyController:doSomething(); // is automatically loaded from /path/to/app/MyController.php
```
