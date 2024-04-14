<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $date_start
 * @property $date_end
 * @property $image
 * @property $created_at
 * @property $updated_at
 * @property $categories_products_services_id
 *
 * @property CategoriesProductsService $categoriesProductsService
 * @property DetailQuote[] $detailQuotes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{

    static $rules = [
        'name' => 'required',
        'description' => 'required',
        'date_start' => 'required|date',
        'date_end' => 'required|date|after_or_equal:date_start',
        'image' => 'image|mimes:jpeg,png,jpg|max:100000',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'date_start', 'date_end', 'image', 'categories_products_services_id', 'disable'];


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
        return $this->hasMany('App\Models\DetailQuote', 'services_id', 'id');
    }
}
