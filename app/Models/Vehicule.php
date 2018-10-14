<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Vehicule",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="patent",
 *          description="patent",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="trademark",
 *          description="trademark",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="model",
 *          description="model",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="color",
 *          description="color",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="observation",
 *          description="observation",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="users_id",
 *          description="users_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Vehicule extends Model
{
    use SoftDeletes;

    public $table = 'vehicules';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patent' => 'string',
        'trademark' => 'string',
        'type' => 'string',
        'model' => 'string',
        'color' => 'string',
        'state' => 'string',
        'observation' => 'string',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'patent' => 'required',
      'trademark' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}
