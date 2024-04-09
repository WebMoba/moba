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
		'product_id' => 'required',
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
        return $this->belongsTo('App\Models\Product', 'products_id', 'id');
    }
  
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->belongsTo(Sale::class,'id', 'sales_id');
    }
        
    public function user()
     {
         return $this->hasOne('App\Models\user', 'id', 'user_id');
     }
     public function person()
    {
        return $this->hasOne('App\Models\Person', 'id', 'people_id');
    }
}
