<?php

use APP\Providers\EventServiceProvider;

define("DS", DIRECTORY_SEPARATOR);

define("ROOT", dirname(__DIR__));

define("APP", ROOT . DS . 'app');
define("CONFIG", APP . DS . 'config');
define("CONTROLLERS", APP . DS . 'controllers');
define("MODELS", APP . DS . 'models');
define("VIEW", ROOT . DS . 'views');
define("CORE", APP . DS . 'core');
define("Storage", ROOT . DS . 'Storage');
define("PUBLIC_path", ROOT . DS . 'public');


require "../vendor/autoload.php";

require_once "../Routes/web.php";
app()->run();
