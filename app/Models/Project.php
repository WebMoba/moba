<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $date_start
 * @property $date_end
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property DetailQuote[] $detailQuotes
 * @property TeamWork[] $teamWorks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Project extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','date_start','date_end','status','disable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailQuotes()
    {
        return $this->hasMany('App\Models\DetailQuote', 'projects_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamWorks()
    {
        return $this->hasMany('App\Models\TeamWork', 'projects_id', 'id');
    }
    
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

}
