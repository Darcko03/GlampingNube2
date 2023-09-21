<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DomeDetail
 *
 * @property $id
 * @property $dome_id
 * @property $booking_id
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Booking $booking
 * @property Dome $dome
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DomeDetail extends Model
{
    
    static $rules = [
		'dome_id' => 'required',
		'booking_id' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dome_id','booking_id','price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function booking()
    {
        return $this->hasOne('App\Models\Booking', 'id', 'booking_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dome()
    {
        return $this->hasOne('App\Models\Dome', 'id', 'dome_id');
    }
    

}
