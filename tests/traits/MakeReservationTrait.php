<?php

use Faker\Factory as Faker;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;

trait MakeReservationTrait
{
    /**
     * Create fake instance of Reservation and save it in database
     *
     * @param array $reservationFields
     * @return Reservation
     */
    public function makeReservation($reservationFields = [])
    {
        /** @var ReservationRepository $reservationRepo */
        $reservationRepo = App::make(ReservationRepository::class);
        $theme = $this->fakeReservationData($reservationFields);
        return $reservationRepo->create($theme);
    }

    /**
     * Get fake instance of Reservation
     *
     * @param array $reservationFields
     * @return Reservation
     */
    public function fakeReservation($reservationFields = [])
    {
        return new Reservation($this->fakeReservationData($reservationFields));
    }

    /**
     * Get fake data of Reservation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeReservationData($reservationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'reservation_code' => $fake->word,
            'parkings_id' => $fake->randomDigitNotNull,
            'vehicules_id' => $fake->randomDigitNotNull,
            'state' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $reservationFields);
    }
}
