<?php

use App\Models\Vehicule;
use App\Repositories\VehiculeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiculeRepositoryTest extends TestCase
{
    use MakeVehiculeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehiculeRepository
     */
    protected $vehiculeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vehiculeRepo = App::make(VehiculeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVehicule()
    {
        $vehicule = $this->fakeVehiculeData();
        $createdVehicule = $this->vehiculeRepo->create($vehicule);
        $createdVehicule = $createdVehicule->toArray();
        $this->assertArrayHasKey('id', $createdVehicule);
        $this->assertNotNull($createdVehicule['id'], 'Created Vehicule must have id specified');
        $this->assertNotNull(Vehicule::find($createdVehicule['id']), 'Vehicule with given id must be in DB');
        $this->assertModelData($vehicule, $createdVehicule);
    }

    /**
     * @test read
     */
    public function testReadVehicule()
    {
        $vehicule = $this->makeVehicule();
        $dbVehicule = $this->vehiculeRepo->find($vehicule->id);
        $dbVehicule = $dbVehicule->toArray();
        $this->assertModelData($vehicule->toArray(), $dbVehicule);
    }

    /**
     * @test update
     */
    public function testUpdateVehicule()
    {
        $vehicule = $this->makeVehicule();
        $fakeVehicule = $this->fakeVehiculeData();
        $updatedVehicule = $this->vehiculeRepo->update($fakeVehicule, $vehicule->id);
        $this->assertModelData($fakeVehicule, $updatedVehicule->toArray());
        $dbVehicule = $this->vehiculeRepo->find($vehicule->id);
        $this->assertModelData($fakeVehicule, $dbVehicule->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVehicule()
    {
        $vehicule = $this->makeVehicule();
        $resp = $this->vehiculeRepo->delete($vehicule->id);
        $this->assertTrue($resp);
        $this->assertNull(Vehicule::find($vehicule->id), 'Vehicule should not exist in DB');
    }
}
