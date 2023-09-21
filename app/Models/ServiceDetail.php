<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceDetail
 *
 * @property $id
 * @property $service_id
 * @property $booking_id
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Booking $booking
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ServiceDetail extends Model
{
    
    static $rules = [
		'service_id' => 'required',
		'booking_id' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['service_id','booking_id','price'];


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
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }
    

}
