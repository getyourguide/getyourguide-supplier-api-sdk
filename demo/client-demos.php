<?php

namespace Demo;

use Exception;
use Gyg\SupplierApiSdk\NotificationClient;
use Gyg\SupplierApiSdk\TestClient;
use Gyg\Thrift\Service\SupplierApi\FunctionToTest;
use Gyg\Thrift\Service\SupplierApi\TestDataOverride;

//composer autoloading
require __DIR__.'/../vendor/autoload.php';

/**
 * If you want to test your own system locally you can do something like that:
 */
printHeader('Calling the local (your) server for test purposes...');
try {

	$client = new DemoSupplierApiClient();
	$availabilities = $client->getAvailabilities('Demo Product 1', '2016-01-01T00:00:00', '2016-12-31T23:59:59');
	printResponse($availabilities);
} catch (Exception $e) {
	printException($e);
}

/**
 * If you want GetYourGuide to call your test system you can request sample requests as follows:
 */
printHeader('Calling GetYourGuide to request a test call...');
try {
	$user = 'test';
	$password = 'password';
	$client = new TestClient($user, $password);
	$testDataOverride = new TestDataOverride();
	$testDataOverride->productId = '123';
	$testResult = $client->testFunction(FunctionToTest::GET_AVAILABILITIES, $testDataOverride);
	printResponse($testResult);
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
	$user = 'test';
	$password = 'password';
	$client = new NotificationClient($user, $password);
	$client->notifyAvailabilityUpdate('Demo Product 1', '2016-01-01T00:00:00', '2016-12-31T23:59:59');
} catch (Exception $e) {
	printException($e);
}

//helper functions
function printHeader($text)
{
	$starCount = strlen($text) + 4;
	echo str_repeat('*', $starCount).PHP_EOL;
	echo '* '.$text.' *'.PHP_EOL;
	echo str_repeat('*', $starCount).PHP_EOL;
}

function printException($e)
{
	echo 'Something exceptional happened: '.PHP_EOL.get_class($e).PHP_EOL;
	echo PHP_EOL;
}

function printResponse($response)
{
	echo 'Result: '.PHP_EOL;
	var_dump($response);
	echo PHP_EOL;
}
