<?php

use Faker\Factory as Faker;
use App\Models\Vehicule;
use App\Repositories\VehiculeRepository;

trait MakeVehiculeTrait
{
    /**
     * Create fake instance of Vehicule and save it in database
     *
     * @param array $vehiculeFields
     * @return Vehicule
     */
    public function makeVehicule($vehiculeFields = [])
    {
        /** @var VehiculeRepository $vehiculeRepo */
        $vehiculeRepo = App::make(VehiculeRepository::class);
        $theme = $this->fakeVehiculeData($vehiculeFields);
        return $vehiculeRepo->create($theme);
    }

    /**
     * Get fake instance of Vehicule
     *
     * @param array $vehiculeFields
     * @return Vehicule
     */
    public function fakeVehicule($vehiculeFields = [])
    {
        return new Vehicule($this->fakeVehiculeData($vehiculeFields));
    }

    /**
     * Get fake data of Vehicule
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVehiculeData($vehiculeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'patent' => $fake->word,
            'trademark' => $fake->word,
            'type' => $fake->word,
            'model' => $fake->word,
            'color' => $fake->word,
            'state' => $fake->word,
            'observation' => $fake->word,
            'users_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $vehiculeFields);
    }
}
