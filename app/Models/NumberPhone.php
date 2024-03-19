<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NumberPhone
 *
 * @property $id
 * @property $number
 * @property $created_at
 * @property $updated_at
 *
 * @property Person[] $people
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NumberPhone extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['number'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany('App\Models\Person', 'number_phones_id', 'id');
    }
    

}
