<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property $id
 * @property $name
 * @property $last_name
 * @property $email
 * @property $phone_number
 * @property $birthdate
 * @property $city
 * @property $address
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model
{
    
    static $rules = [
		'name' => 'required',
		'last_name' => 'required',
		'email' => 'required',
		'phone_number' => 'required',
		'birthdate' => 'required',
		'city' => 'required',
		'address' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','last_name','email','phone_number','birthdate','city','address'];



}
