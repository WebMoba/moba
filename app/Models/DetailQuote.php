<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailQuote
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $services_id
 * @property $products_id
 * @property $projects_id
 * @property $quotes_id
 *
 * @property Product $product
 * @property Project $project
 * @property Quote $quote
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailQuote extends Model
{
    
    static $rules = [
		'services_id' => 'required',
		'products_id' => 'required',
		'projects_id' => 'required',
		'quotes_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['services_id','products_id','projects_id','quotes_id'];


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
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'projects_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quote()
    {
        return $this->hasOne('App\Models\Quote', 'id', 'quotes_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'services_id');
    }
    

}
