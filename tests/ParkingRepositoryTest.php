<?php

use App\Models\Parking;
use App\Repositories\ParkingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParkingRepositoryTest extends TestCase
{
    use MakeParkingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParkingRepository
     */
    protected $parkingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->parkingRepo = App::make(ParkingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateParking()
    {
        $parking = $this->fakeParkingData();
        $createdParking = $this->parkingRepo->create($parking);
        $createdParking = $createdParking->toArray();
        $this->assertArrayHasKey('id', $createdParking);
        $this->assertNotNull($createdParking['id'], 'Created Parking must have id specified');
        $this->assertNotNull(Parking::find($createdParking['id']), 'Parking with given id must be in DB');
        $this->assertModelData($parking, $createdParking);
    }

    /**
     * @test read
     */
    public function testReadParking()
    {
        $parking = $this->makeParking();
        $dbParking = $this->parkingRepo->find($parking->id);
        $dbParking = $dbParking->toArray();
        $this->assertModelData($parking->toArray(), $dbParking);
    }

    /**
     * @test update
     */
    public function testUpdateParking()
    {
        $parking = $this->makeParking();
        $fakeParking = $this->fakeParkingData();
        $updatedParking = $this->parkingRepo->update($fakeParking, $parking->id);
        $this->assertModelData($fakeParking, $updatedParking->toArray());
        $dbParking = $this->parkingRepo->find($parking->id);
        $this->assertModelData($fakeParking, $dbParking->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteParking()
    {
        $parking = $this->makeParking();
        $resp = $this->parkingRepo->delete($parking->id);
        $this->assertTrue($resp);
        $this->assertNull(Parking::find($parking->id), 'Parking should not exist in DB');
    }
}
