<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Town
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 * @property $regions_id
 *
 * @property Person[] $people
 * @property Region $region
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Town extends Model
{
    
    static $rules = [
		'regions_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','regions_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany('App\Models\Person', 'towns_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function region()
    {
        return $this->hasOne('App\Models\Region', 'id', 'regions_id');
    }
    

}
