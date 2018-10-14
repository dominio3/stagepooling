<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReservationApiTest extends TestCase
{
    use MakeReservationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateReservation()
    {
        $reservation = $this->fakeReservationData();
        $this->json('POST', '/api/v1/reservations', $reservation);

        $this->assertApiResponse($reservation);
    }

    /**
     * @test
     */
    public function testReadReservation()
    {
        $reservation = $this->makeReservation();
        $this->json('GET', '/api/v1/reservations/'.$reservation->id);

        $this->assertApiResponse($reservation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateReservation()
    {
        $reservation = $this->makeReservation();
        $editedReservation = $this->fakeReservationData();

        $this->json('PUT', '/api/v1/reservations/'.$reservation->id, $editedReservation);

        $this->assertApiResponse($editedReservation);
    }

    /**
     * @test
     */
    public function testDeleteReservation()
    {
        $reservation = $this->makeReservation();
        $this->json('DELETE', '/api/v1/reservations/'.$reservation->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/reservations/'.$reservation->id);

        $this->assertResponseStatus(404);
    }
}
