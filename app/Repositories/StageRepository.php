<?php

namespace App\Repositories;

use App\Models\Stage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StageRepository
 * @package App\Repositories
 * @version October 14, 2018, 4:38 pm -03
 *
 * @method Stage findWithoutFail($id, $columns = ['*'])
 * @method Stage find($id, $columns = ['*'])
 * @method Stage first($columns = ['*'])
*/
class StageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'locality',
        'province',
        'zipcode',
        'latitude',
        'longitude',
        'observation',
        'photo',
        'state',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Stage::class;
    }
}
