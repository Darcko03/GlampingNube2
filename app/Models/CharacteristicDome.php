<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CharacteristicDome
 *
 * @property $id
 * @property $dome_id
 * @property $characteristic_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Characteristic $characteristic
 * @property Dome $dome
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CharacteristicDome extends Model
{
    
    static $rules = [
		'dome_id' => 'required',
		'characteristic_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dome_id','characteristic_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function characteristic()
    {
        return $this->hasOne('App\Models\Characteristic', 'id', 'characteristic_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dome()
    {
        return $this->hasOne('App\Models\Dome', 'id', 'dome_id');
    }
    

}
