<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPurchase
 *
 * @property $id
 * @property $quantity
 * @property $price_unit
 * @property $subtotal
 * @property $discount
 * @property $total
 * @property $created_at
 * @property $updated_at
 * @property $materials_raws_id
 * @property $purchases_id
 *
 * @property MaterialsRaw $materialsRaw
 * @property Purchase $purchase
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailPurchase extends Model
{

    static $rules = [
        'materials_raws_id' => 'required',
        'purchases_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity', 'price_unit', 'subtotal', 'discount', 'total', 'materials_raws_id', 'purchases_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materialsRaw()
    {
        return $this->hasOne('App\Models\MaterialsRaw', 'id', 'materials_raws_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase', 'id', 'purchases_id');
    }
}
