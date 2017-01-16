<?php

namespace Demo;

use Gyg\Thrift\Service\SupplierApi\SupplierApiIf;
use Gyg\Thrift\Service\SupplierApi\SupplierApiClient;
use TBinaryProtocol;
use TBufferedTransport;
use THttpClient;

class DemoSupplierApiClient implements SupplierApiIf
{
	private $client;

	public function __construct($host = 'localhost', $port = 8080, $path = '/', $protocol = 'http')
	{
		$httpClient = new THttpClient($host, $port, $path, $protocol, 'error_log');
		$transport = new TBufferedTransport($httpClient, 1024, 1024);
		$protocol = new TBinaryProtocol($transport);
		$this->client = new SupplierApiClient($protocol);
	}

	public function book($bookingRequest)
	{
		return $this->client->book($bookingRequest);
	}

	public function cancelBooking($bookingCancelation)
	{
		return $this->client->cancelBooking($bookingCancelation);
	}

	public function cancelReservation($reservationCancelation)
	{
		return $this->client->cancelReservation($reservationCancelation);
	}

	public function getAvailabilities($productId, $fromDateTime, $toDateTime)
	{
		return $this->client->getAvailabilities($productId, $fromDateTime, $toDateTime);
	}

	public function reserve($reservationRequest)
	{
		return $this->client->reserve($reservationRequest);
	}
}