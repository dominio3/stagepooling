<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Parking",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="parking_code",
 *          description="parking_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date_init",
 *          description="date_init",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="date_end",
 *          description="date_end",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="stages_id",
 *          description="stages_id",
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
class Parking extends Model
{
    use SoftDeletes;

    public $table = 'parkings';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'parking_code',
        'date_init',
        'hour_init',
        'date_end',
        'hour_end',
        'stages_id',
        'state',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parking_code' => 'string',
        'date_init' => 'date',
        'hour_init' => 'time',
        'date_end' => 'date',
        'hour_end' => 'time',
        'stages_id' => 'integer',
        'state' => 'string',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'parking_code' => 'required',
      'date_init' => 'required',
      'hour_init' =>'required',
      'date_end' => 'required',
      'hour_end' =>'required',
      'stages_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stages()
    {
        return $this->belongsTo(\App\Models\Stage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
