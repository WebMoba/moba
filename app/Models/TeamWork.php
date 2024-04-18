<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamWork
 *
 * @property $id
 * @property $specialty
 * @property $assigned_work
 * @property $assigned_date
 * @property $created_at
 * @property $updated_at
 * @property $projects_id
 *
 * @property Person[] $people
 * @property Project $project
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TeamWork extends Model
{
    
    static $rules = [
		'projects_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['specialty','assigned_work','assigned_date','projects_id', 'disable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function people()
    {
        return $this->hasMany('App\Models\Person', 'team_works_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'projects_id');
    }
    

}
