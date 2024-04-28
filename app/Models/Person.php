<?php

namespace App\Models;

use App\Models\Region;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 *
 * @property $id
 * @property $id_card
 * @property $addres
 * @property $created_at
 * @property $updated_at
 * @property $team_works_id
 * @property $number_phones_id
 * @property $towns_id
 * @property $users_id
 *
 * @property EventPerson[] $eventPeople
 * @property NumberPhone $numberPhone
 * @property Purchase[] $purchases
 * @property Quote[] $quotes
 * @property Sale[] $sales
 * @property TeamWork $teamWork
 * @property Town $town
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Person extends Model
{

    static $rules = [
        'id_card' => 'required',
        'team_works_id' => 'required',
        'number_phones_id' => 'required',
        'towns_id' => 'required',
        'users_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_card', 'name', 'addres', 'team_works_id', 'number_phones_id', 'towns_id', 'users_id', 'user_name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventPeople()
    {
        return $this->hasMany('App\Models\EventPerson', 'people_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function numberPhone()
    {
        return $this->hasOne('App\Models\NumberPhone', 'id', 'number_phones_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase', 'people_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'people_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teamWork()
    {
        return $this->hasOne('App\Models\TeamWork', 'id', 'team_works_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function town()
    {
        return $this->hasOne('App\Models\Town', 'id', 'towns_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function isProvider()
    {
        return $this->rol === 'Proveedor';
    }
}
