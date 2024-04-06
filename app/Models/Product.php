<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $image
 * @property $quantity
 * @property $price
 * @property $created_at
 * @property $updated_at
 * @property $units_id
 * @property $categories_products_services_id
 *
 * @property CategoriesProductsService $categoriesProductsService
 * @property DetailQuote[] $detailQuotes
 * @property DetailSale[] $detailSales
 * @property MaterialRawProduct[] $materialRawProducts
 * @property Unit $unit
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'units_id' => 'required',
		'categories_products_services_id' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg|max:100000',
        'name' => 'required',
        'quantity' => 'required',
        'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','quantity','price','units_id','categories_products_services_id', 'disable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriesProductsService()
    {
        return $this->hasOne('App\Models\CategoriesProductsService', 'id', 'categories_products_services_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailQuotes()
    {
        return $this->hasMany('App\Models\DetailQuote', 'products_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailSales()
    {
        return $this->hasMany('App\Models\DetailSale', 'products_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialRawProducts()
    {
        return $this->hasMany('App\Models\MaterialRawProduct', 'products_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unit()
    {
        return $this->hasOne('App\Models\Unit', 'id', 'units_id');
    }
    

}
