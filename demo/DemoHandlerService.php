<?php

namespace Demo;

use Gyg\Thrift\Service\SupplierApi\AuthorizationException;
use Gyg\Thrift\Service\SupplierApi\Availability;
use Gyg\Thrift\Service\SupplierApi\AvailabilityResponse;
use Gyg\Thrift\Service\SupplierApi\BookingCancelation;
use Gyg\Thrift\Service\SupplierApi\BookingRequest;
use Gyg\Thrift\Service\SupplierApi\BookingResponse;
use Gyg\Thrift\Service\SupplierApi\InternalSystemException;
use Gyg\Thrift\Service\SupplierApi\InvalidBookingException;
use Gyg\Thrift\Service\SupplierApi\InvalidProductException;
use Gyg\Thrift\Service\SupplierApi\InvalidReservationException;
use Gyg\Thrift\Service\SupplierApi\NoAvailabilityException;
use Gyg\Thrift\Service\SupplierApi\ReservationCancelation;
use Gyg\Thrift\Service\SupplierApi\ReservationRequest;
use Gyg\Thrift\Service\SupplierApi\ReservationResponse;
use Gyg\Thrift\Service\SupplierApi\SupplierApiIf;
use Gyg\Thrift\Service\SupplierApi\ValidationException;

class DemoHandlerService implements SupplierApiIf
{
	/**
	 * @param string $productId
	 * @param string $fromDateTime
	 * @param string $toDateTime
	 * @return AvailabilityResponse
	 *
	 * @throws InvalidProductException
	 * @throws ValidationException
	 * @throws AuthorizationException
	 * @throws InternalSystemException
	 */
	public function getAvailabilities($productId, $fromDateTime, $toDateTime)
	{
		$availabilityResponse = new AvailabilityResponse();
		$availabilities = [];

		$availability = new Availability();
		$availability->productId = $productId;
		$availability->dateTime = '2016-08-02T09:00:00+02:00';
		$availability->vacancies = 21;
		$availabilities[] = $availability;

		$availability = new Availability();
		$availability->productId = $productId;
		$availability->dateTime = '2016-08-03T09:00:00';
		$availability->vacancies = 4;
		$availabilities[] = $availability;

		$availabilityResponse->availabilities = $availabilities;

		return $availabilityResponse;
	}

	/**
	 * @param ReservationRequest $reservationRequest
	 * @return ReservationResponse
	 *
	 * @throws NoAvailabilityException
	 * @throws InvalidProductException
	 * @throws ValidationException
	 * @throws AuthorizationException
	 * @throws InternalSystemException
	 */
	public function reserve($reservationRequest)
	{
		// TODO: Implement reserve() method.
	}

	/**
	 * @param BookingRequest $bookingRequest
	 * @return BookingResponse
	 *
	 * @throws NoAvailabilityException
	 * @throws InvalidProductException
	 * @throws InvalidReservationException
	 * @throws ValidationException
	 * @throws AuthorizationException
	 * @throws InternalSystemException
	 */
	public function book($bookingRequest)
	{
		// TODO: Implement book() method.
	}

	/**
	 * @param ReservationCancelation $reservationCancelation
	 *
	 * @throws InvalidReservationException
	 * @throws ValidationException
	 * @throws AuthorizationException
	 * @throws InternalSystemException
	 *
	 */
	public function cancelReservation($reservationCancelation)
	{
		// TODO: Implement cancelReservation() method.
	}

	/**
	 * @param BookingCancelation $bookingCancelation
	 *
	 * @throws InvalidBookingException
	 * @throws ValidationException
	 * @throws AuthorizationException
	 * @throws InternalSystemException
	 */
	public function cancelBooking($bookingCancelation)
	{
		// TODO: Implement cancelBooking() method.
	}
}