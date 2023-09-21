<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Characteristic
 *
 * @property $id
 * @property $state
 * @property $description
 * @property $name
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Characteristic extends Model
{
    
    static $rules = [
		'description' => 'required',
		'name' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['state','description','name','price'];

    public function domes()
    {
        return $this->belongsToMany(dome::class, 'Characteristic_Domes');
    }

}
