<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permission extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }

}
