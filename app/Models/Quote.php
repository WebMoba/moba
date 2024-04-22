<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quote
 *
 * @property $id
 * @property $date_issuance
 * @property $description
 * @property $total
 * @property $discount
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $people_id
 *
 * @property DetailQuote[] $detailQuotes
 * @property Person $person
 * @property Sale[] $sales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Quote extends Model
{

    static $rules = [
        'date_issuance' => 'required|date',
        'description' => 'required|string|max:300',
        'total' => 'required|numeric',
        'discount' => 'required|numeric',
        'status' => 'required|in:aprobado,rechazado,pendiente',
        'people_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date_issuance', 'description', 'total', 'discount', 'status', 'disable', 'people_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function detailQuotes()
    {
        return $this->hasMany('App\Models\DetailQuote', 'quotes_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'quotes_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();

        // Al crear un nuevo evento, establecer el campo disable como false por defecto
        static::creating(function ($quote) {
            $quote->disable = false;
        });
    }
}
