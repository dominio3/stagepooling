<?php

use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReservationRepositoryTest extends TestCase
{
    use MakeReservationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReservationRepository
     */
    protected $reservationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->reservationRepo = App::make(ReservationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateReservation()
    {
        $reservation = $this->fakeReservationData();
        $createdReservation = $this->reservationRepo->create($reservation);
        $createdReservation = $createdReservation->toArray();
        $this->assertArrayHasKey('id', $createdReservation);
        $this->assertNotNull($createdReservation['id'], 'Created Reservation must have id specified');
        $this->assertNotNull(Reservation::find($createdReservation['id']), 'Reservation with given id must be in DB');
        $this->assertModelData($reservation, $createdReservation);
    }

    /**
     * @test read
     */
    public function testReadReservation()
    {
        $reservation = $this->makeReservation();
        $dbReservation = $this->reservationRepo->find($reservation->id);
        $dbReservation = $dbReservation->toArray();
        $this->assertModelData($reservation->toArray(), $dbReservation);
    }

    /**
     * @test update
     */
    public function testUpdateReservation()
    {
        $reservation = $this->makeReservation();
        $fakeReservation = $this->fakeReservationData();
        $updatedReservation = $this->reservationRepo->update($fakeReservation, $reservation->id);
        $this->assertModelData($fakeReservation, $updatedReservation->toArray());
        $dbReservation = $this->reservationRepo->find($reservation->id);
        $this->assertModelData($fakeReservation, $dbReservation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteReservation()
    {
        $reservation = $this->makeReservation();
        $resp = $this->reservationRepo->delete($reservation->id);
        $this->assertTrue($resp);
        $this->assertNull(Reservation::find($reservation->id), 'Reservation should not exist in DB');
    }
}
