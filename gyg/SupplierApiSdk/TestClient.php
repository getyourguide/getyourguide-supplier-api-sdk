<?php

namespace Gyg\SupplierApiSdk;

use Gyg\Thrift\Service\SupplierApi\SupplierApiTestClient;
use Gyg\Thrift\Service\SupplierApi\SupplierApiTestIf;
use TBinaryProtocol;
use TBufferedTransport;
use THttpClient;

class TestClient implements SupplierApiTestIf
{
	private $client;

	public function __construct(
		$user,
		$password,
		$host = 'supplier-api-getyourguide-com.partner.gygtest.com',
		$port = 443,
		$path = '/1/test/',
		$protocol = 'https'
	) {
		$headers['Authorization'] = 'Basic '.base64_encode($user.':'.$password);
		$httpClient = new THttpClient($host, $port, $path, $protocol, 'error_log');
		$httpClient->setCustomHeaders($headers);
		$transport = new TBufferedTransport($httpClient, 1024, 1024);
		$protocol = new TBinaryProtocol($transport);
		$this->client = new SupplierApiTestClient($protocol);
	}

	public function testFunction($testFunctionName, $testDataOverride)
	{
		return $this->client->testFunction($testFunctionName, $testDataOverride);
	}
}