<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaterialsRaw
 *
 * @property $id
 * @property $name
 * @property $existing_quantity
 * @property $created_at
 * @property $updated_at
 * @property $units_id
 *
 * @property DetailPurchase[] $detailPurchases
 * @property MaterialRawProduct[] $materialRawProducts
 * @property Unit $unit
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MaterialsRaw extends Model
{
    
    static $rules = [
		'units_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','existing_quantity','units_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPurchases()
    {
        return $this->hasMany('App\Models\DetailPurchase', 'materials_raws_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialRawProducts()
    {
        return $this->hasMany('App\Models\MaterialRawProduct', 'materials_raws_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unit()
    {
        return $this->hasOne('App\Models\Unit', 'id', 'units_id');
    }
    

}
