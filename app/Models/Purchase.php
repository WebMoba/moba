<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @property $id
 * @property $name
 * @property $date
 * @property $created_at
 * @property $updated_at
 * @property $people_id
 *
 * @property DetailPurchase[] $detailPurchases
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Purchase extends Model
{

    static $rules = [
        'people_id' => 'required',
        'materials_raws_id' => 'required',
        'name' => 'required',
        'quantity' => 'required|numeric',
        'price_unit' => 'required|numeric',
        'subtotal' => 'required|numeric',
        'discount' => 'required|numeric',
        'total' => 'required|numeric',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'date', 'people_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPurchases()
    {
        return $this->hasMany('App\Models\DetailPurchase', 'purchases_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function person()
    {
        return $this->hasOne('App\Models\Person', 'id', 'people_id');
    }
}
