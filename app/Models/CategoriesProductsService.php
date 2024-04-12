<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriesProductsService
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $status
 * @property $quantity
 * @property $popular
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @property Service[] $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriesProductsService extends Model
{

    static $rules = [
        'name' => 'required',
        'description' => 'required',
        'status' => 'required',
        'quantity' => 'required',
        'popular' => 'required',
        'type' => 'required',
    ];
//las restricciones siempre van en el modelo
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'status', 'quantity', 'popular', 'type', 'disable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'categories_products_services_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany('App\Models\Service', 'categories_products_services_id', 'id');
    }
}
