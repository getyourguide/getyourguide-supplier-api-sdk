<?php

namespace Demo;

use Gyg\Thrift\Service\SupplierApi\SupplierApiProcessor;
use TBinaryProtocol;
use TBufferedTransport;
use TPhpStream;

//composer autoloading
require __DIR__.'/vendor/autoload.php';

header('Content-Type', 'application/x-thrift');

$handler = new DemoHandlerService();
$processor = new SupplierApiProcessor($handler);

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
$protocol = new TBinaryProtocol($transport, true, true);

$transport->open();
$processor->process($protocol, $protocol);
$transport->close();
