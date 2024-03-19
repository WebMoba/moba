<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @property $id
 * @property $place
 * @property $title
 * @property $description
 * @property $date_start
 * @property $date_end
 * @property $importance_range
 * @property $created_at
 * @property $updated_at
 *
 * @property EventPerson[] $eventPeople
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Event extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['place','title','description','date_start','date_end','importance_range'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventPeople()
    {
        return $this->hasMany('App\Models\EventPerson', 'events_id', 'id');
    }
    

}
