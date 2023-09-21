<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dome
 *
 * @property $id
 * @property $name
 * @property $state
 * @property $price
 * @property $location
 * @property $description
 * @property $capacity
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dome extends Model
{
    
    static $rules = [
		'name' => 'required',
		'state' => 'required',
		'price' => 'required',
		'location' => 'required',
		'description' => 'required',
		'capacity' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','state','price','location','description','capacity'];

    public function characteristics()
    {
        return $this->belongsToMany(characteristic::class, 'Characteristic_Domes');
    }

    public function domeDetails()
    {
        return $this->hasMany('App\Models\DomeDetail', 'dome_id', 'id');
    }
}
