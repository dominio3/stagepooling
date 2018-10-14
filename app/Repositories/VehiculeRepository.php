<?php

namespace App\Repositories;

use App\Models\Vehicule;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VehiculeRepository
 * @package App\Repositories
 * @version October 14, 2018, 4:38 pm -03
 *
 * @method Vehicule findWithoutFail($id, $columns = ['*'])
 * @method Vehicule find($id, $columns = ['*'])
 * @method Vehicule first($columns = ['*'])
*/
class VehiculeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patent',
        'trademark',
        'type',
        'model',
        'color',
        'state',
        'observation',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehicule::class;
    }
}
