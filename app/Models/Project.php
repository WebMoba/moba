<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date_start',
        'date_end',
        'status',
        'logo',
        'image1',
        'image2',
        'image3',
    ];

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
        return $this->hasMany(TeamWork::class);
    }
    
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }


    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    public function getImageOneUrlAttribute()
    {
        return $this->imageOne ? asset('storage/' . $this->imageOne) : null;
    }

    public function getImageTwoUrlAttribute()
    {
        return $this->imageTwo ? asset('storage/' . $this->imageTwo) : null;
    }

    public function getImageThreeUrlAttribute()
    {
        return $this->imageThree ? asset('storage/' . $this->imageThree) : null;
    }

}
