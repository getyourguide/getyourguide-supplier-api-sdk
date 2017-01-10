<?php

namespace Demo;


//composer autoloading
use Gyg\SupplierApiSdk\Server;

require __DIR__.'/vendor/autoload.php';

$handler = new DemoHandlerService();
$server = new Server($handler);

$server->handle();