<?php

namespace Gyg\SupplierApiSdk;


use Gyg\Thrift\Service\SupplierApi\SupplierApiIf;
use Gyg\Thrift\Service\SupplierApi\SupplierApiProcessor;
use TBinaryProtocol;
use TBufferedTransport;
use TPhpStream;

class Server
{
	private $transport;
	private $processor;
	private $protocol;

	public function __construct(SupplierApiIf $handler)
	{
		$this->processor = new SupplierApiProcessor($handler);
		$this->transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
		$this->protocol = new TBinaryProtocol($this->transport, true, true);
	}

	public function handle()
	{
		header('Content-Type', 'application/x-thrift');

		$this->transport->open();
		$this->processor->process($this->protocol, $this->protocol);
		$this->transport->close();
	}
}