<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 *
 * @property $id
 * @property $unit_type
 * @property $size
 * @property $area
 * @property $created_at
 * @property $updated_at
 *
 * @property MaterialsRaw[] $materialsRaws
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unit extends Model
{
    
    static $rules = [
		'unit_type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['unit_type','size','area'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialsRaws()
    {
        return $this->hasMany('App\Models\MaterialsRaw', 'units_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'units_id', 'id');
    }
    

}
