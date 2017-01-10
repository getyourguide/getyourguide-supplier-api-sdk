<?php

namespace Demo;

use Exception;
use Gyg\Thrift\Service\SupplierApi\FunctionToTest;
use Gyg\Thrift\Service\SupplierApi\NotificationServiceClient;
use Gyg\Thrift\Service\SupplierApi\SupplierApiClient;
use Gyg\Thrift\Service\SupplierApi\SupplierApiTestClient;
use Gyg\Thrift\Service\SupplierApi\TestDataOverride;
use TBinaryProtocol;
use TBufferedTransport;
use THttpClient;

//composer autoloading
require __DIR__.'/vendor/autoload.php';

/**
 * If you want to test your own system locally you can do something like that:
 */
printHeader('Calling the local (your) server for test purposes...');
try {
	$httpClient = new THttpClient('localhost', 8080, '/','http', 'error_log');
	$transport = new TBufferedTransport($httpClient, 1024, 1024);
	$protocol = new TBinaryProtocol($transport);
	$client = new SupplierApiClient($protocol);
	$availabilities = $client->getAvailabilities('Demo Product 1', '2016-01-01T00:00:00', '2016-12-31T23:59:59');
	printResponse($availabilities);
	$transport->close();
} catch (Exception $e) {
	printException($e);
}

/**
 * If you want GetYourGuide to call your test system you can request sample requests as follows:
 */
printHeader('Calling GetYourGuide to request a test call...');
try {
	$httpClient = new THttpClient('supplier-api-getyourguide-com.partner.gygtest.com', 443, '/1/test/','https', 'error_log');
	$user = 'test';
	$password = 'password';
	$headers['Authorization'] = 'Basic ' . base64_encode($user . ':' . $password);
	$httpClient->setCustomHeaders($headers);
	$transport = new TBufferedTransport($httpClient, 1024, 1024);
	$protocol = new TBinaryProtocol($transport);
	$client = new SupplierApiTestClient($protocol);
	$testDataOverride = new TestDataOverride();
	$testDataOverride->productId  = '123';
	$testResult = $client->testFunction(FunctionToTest::GET_AVAILABILITIES, $testDataOverride);
	printResponse($testResult);
	$transport->close();
} catch (Exception $e) {
	printException($e);
}

/**
 * To push availability notifications to GetYourGuide you would do:
 *
 * Please note, this will only work once we confirmed that we have setup a test product for you
 */
printHeader('Calling GetYourGuide to notify about new availability...');
try {
	$httpClient = new THttpClient('supplier-api-getyourguide-com.partner.gygtest.com', 443, '/1/','https', 'error_log');
	$user = 'test';
	$password = 'password';
	$headers['Authorization'] = 'Basic ' . base64_encode($user . ':' . $password);
	$httpClient->setCustomHeaders($headers);
	$transport = new TBufferedTransport($httpClient, 1024, 1024);
	$protocol = new TBinaryProtocol($transport);
	$client = new NotificationServiceClient($protocol);
	$client->notifyAvailabilityUpdate('Demo Product 1', '2016-01-01T00:00:00', '2016-12-31T23:59:59');
	$transport->close();
} catch (Exception $e) {
	printException($e);
}


//helper functions
function printHeader($text) {
	$starCount = strlen($text) + 4;
	echo str_repeat('*', $starCount) . PHP_EOL;
	echo '* ' . $text . ' *' . PHP_EOL;
	echo str_repeat('*', $starCount) . PHP_EOL;
}
function printException($e) {
	echo 'Something exceptional happened: '  . PHP_EOL . get_class($e) . PHP_EOL;
	echo PHP_EOL;
}
function printResponse($response) {
	echo 'Result: ' . PHP_EOL;
	var_dump($response);
	echo PHP_EOL;
}
