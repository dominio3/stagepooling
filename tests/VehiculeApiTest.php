<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiculeApiTest extends TestCase
{
    use MakeVehiculeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVehicule()
    {
        $vehicule = $this->fakeVehiculeData();
        $this->json('POST', '/api/v1/vehicules', $vehicule);

        $this->assertApiResponse($vehicule);
    }

    /**
     * @test
     */
    public function testReadVehicule()
    {
        $vehicule = $this->makeVehicule();
        $this->json('GET', '/api/v1/vehicules/'.$vehicule->id);

        $this->assertApiResponse($vehicule->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVehicule()
    {
        $vehicule = $this->makeVehicule();
        $editedVehicule = $this->fakeVehiculeData();

        $this->json('PUT', '/api/v1/vehicules/'.$vehicule->id, $editedVehicule);

        $this->assertApiResponse($editedVehicule);
    }

    /**
     * @test
     */
    public function testDeleteVehicule()
    {
        $vehicule = $this->makeVehicule();
        $this->json('DELETE', '/api/v1/vehicules/'.$vehicule->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vehicules/'.$vehicule->id);

        $this->assertResponseStatus(404);
    }
}
