<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Reservation",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="reservation_code",
 *          description="reservation_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="parkings_id",
 *          description="parkings_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="vehicules_id",
 *          description="vehicules_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      )
 * )
 */
class Reservation extends Model
{
    use SoftDeletes;

    public $table = 'reservations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'reservation_code',
        'parkings_id',
        'vehicules_id',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'reservation_code' => 'string',
        'parkings_id' => 'integer',
        'vehicules_id' => 'integer',
        'state' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vehicule()
    {
        return $this->belongsTo(\App\Models\Vehicule::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parking()
    {
        return $this->belongsTo(\App\Models\Parking::class);
    }
}
