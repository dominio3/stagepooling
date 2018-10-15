<?php

namespace App\Repositories;

use App\Models\Parking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParkingRepository
 * @package App\Repositories
 * @version October 14, 2018, 4:26 pm -03
 *
 * @method Parking findWithoutFail($id, $columns = ['*'])
 * @method Parking find($id, $columns = ['*'])
 * @method Parking first($columns = ['*'])
*/
class ParkingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parking_code',
        'date_init',
        'hour_init',
        'date_end',
        'hour_end',
        'stages_id',
        'state'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Parking::class;
    }
}
