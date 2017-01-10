<?php

namespace Gyg\SupplierApiSdk;

use Gyg\Thrift\Service\SupplierApi\NotificationServiceClient;
use Gyg\Thrift\Service\SupplierApi\NotificationServiceIf;
use TBinaryProtocol;
use TBufferedTransport;
use THttpClient;


class NotificationClient implements NotificationServiceIf
{
	private $client;

	public function __construct($user, $password,
		$host = 'supplier-api-getyourguide-com.partner.gygtest.com',
		$port = 443,
		$path = '/1/',
		$protocol = 'https')
	{
		$headers['Authorization'] = 'Basic ' . base64_encode($user . ':' . $password);
		$httpClient = new THttpClient($host, $port, $path, $protocol, 'error_log');
		$httpClient->setCustomHeaders($headers);
		$transport = new TBufferedTransport($httpClient, 1024, 1024);
		$protocol = new TBinaryProtocol($transport);
		$this->client = new NotificationServiceClient($protocol);
	}

	public function notifyAvailabilityUpdate($productId, $fromDateTime, $toDateTime)
	{
		return $this->client->notifyAvailabilityUpdate($productId, $fromDateTime, $toDateTime);
	}
}