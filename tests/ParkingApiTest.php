<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParkingApiTest extends TestCase
{
    use MakeParkingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateParking()
    {
        $parking = $this->fakeParkingData();
        $this->json('POST', '/api/v1/parkings', $parking);

        $this->assertApiResponse($parking);
    }

    /**
     * @test
     */
    public function testReadParking()
    {
        $parking = $this->makeParking();
        $this->json('GET', '/api/v1/parkings/'.$parking->id);

        $this->assertApiResponse($parking->toArray());
    }

    /**
     * @test
     */
    public function testUpdateParking()
    {
        $parking = $this->makeParking();
        $editedParking = $this->fakeParkingData();

        $this->json('PUT', '/api/v1/parkings/'.$parking->id, $editedParking);

        $this->assertApiResponse($editedParking);
    }

    /**
     * @test
     */
    public function testDeleteParking()
    {
        $parking = $this->makeParking();
        $this->json('DELETE', '/api/v1/parkings/'.$parking->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/parkings/'.$parking->id);

        $this->assertResponseStatus(404);
    }
}
