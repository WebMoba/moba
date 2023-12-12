<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailSale
 *
 * @property $id
 * @property $quantity
 * @property $price_unit
 * @property $subtotal
 * @property $discount
 * @property $total
 * @property $created_at
 * @property $updated_at
 * @property $sales_id
 * @property $products_id
 *
 * @property Product $product
 * @property Sale $sale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailSale extends Model
{
    
    static $rules = [
		'sales_id' => 'required',
		'products_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity','price_unit','subtotal','discount','total','sales_id','products_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'products_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->hasOne('App\Models\Sale', 'id', 'sales_id');
    }
    

}
