<?php

use Faker\Factory as Faker;
use App\Models\Parking;
use App\Repositories\ParkingRepository;

trait MakeParkingTrait
{
    /**
     * Create fake instance of Parking and save it in database
     *
     * @param array $parkingFields
     * @return Parking
     */
    public function makeParking($parkingFields = [])
    {
        /** @var ParkingRepository $parkingRepo */
        $parkingRepo = App::make(ParkingRepository::class);
        $theme = $this->fakeParkingData($parkingFields);
        return $parkingRepo->create($theme);
    }

    /**
     * Get fake instance of Parking
     *
     * @param array $parkingFields
     * @return Parking
     */
    public function fakeParking($parkingFields = [])
    {
        return new Parking($this->fakeParkingData($parkingFields));
    }

    /**
     * Get fake data of Parking
     *
     * @param array $postFields
     * @return array
     */
    public function fakeParkingData($parkingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'parking_code' => $fake->word,
            'date_init' => $fake->word,
            'hour_init' => $fake->word,
            'date_end' => $fake->word,
            'hour_end' => $fake->word,
            'stages_id' => $fake->randomDigitNotNull,
            'state' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $parkingFields);
    }
}
