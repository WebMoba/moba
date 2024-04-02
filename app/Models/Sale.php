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
        return $this->hasMany('App\Models\DetailSale', 'sales_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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
    return $this->hasManyThrough(
        Product::class,
        DetailSale::class,
        'sales_id', // Clave foránea en la tabla intermedia (DetailSale) que apunta a Sale
        'id', // Clave foránea en la tabla intermedia (DetailSale) que apunta a Product
        'id', // Clave local en el modelo Sale
        'products_id' // Clave local en el modelo Product
    );
}
}
