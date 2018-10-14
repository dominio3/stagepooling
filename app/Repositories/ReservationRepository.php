<?php

namespace App\Repositories;

use App\Models\Reservation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReservationRepository
 * @package App\Repositories
 * @version October 14, 2018, 6:00 pm -03
 *
 * @method Reservation findWithoutFail($id, $columns = ['*'])
 * @method Reservation find($id, $columns = ['*'])
 * @method Reservation first($columns = ['*'])
*/
class ReservationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'reservation_code',
        'parkings_id',
        'vehicules_id',
        'state'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Reservation::class;
    }
}
