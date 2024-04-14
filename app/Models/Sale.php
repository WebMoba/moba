<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 *
 * @property $id
 * @property $name
 * @property $date
 * @property $created_at
 * @property $updated_at
 * @property $people_id
 * @property $quotes_id
 *
 * @property DetailSale[] $detailSales
 * @property Person $person
 * @property Quote $quote
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sale extends Model
{
    
    static $rules = [
		'people_id' => 'required',
		'quotes_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','date','people_id','quotes_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

     public function detailSales()
    {
        return $this->hasMany('App\Models\DetailSale','sales_id', 'id', 'id', 'product_id' );
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
     public function user()
     {
         return $this->hasOne('App\Models\user', 'id', 'user_id');
     }
     
     public function person()
    {
        return $this->hasOne('App\Models\Person', 'id', 'people_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quote()
    {
        return $this->hasOne('App\Models\Quote', 'id', 'quotes_id');
    }
    
    public function product()
    {
        return $this->belongsToMany('App\Models\product', 'detail_sales', 'sales_id', 'product_id');
    }
   /**
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'detail_sales', 'sales_id', 'product_id');
    }
     */
}

