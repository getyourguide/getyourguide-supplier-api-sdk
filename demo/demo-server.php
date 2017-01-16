<?php

namespace Demo;

use Gyg\SupplierApiSdk\Server;

//composer autoloading
require __DIR__.'/vendor/autoload.php';

$handler = new DemoHandlerService();
$server = new Server($handler);

$server->handle();