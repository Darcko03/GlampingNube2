<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offer
 *
 * @property $id
 * @property $name
 * @property $discount
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Offer extends Model
{
    
    static $rules = [
		'name' => 'required',
		'discount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','discount'];



}
