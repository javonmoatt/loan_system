<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StateProvinceParish;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'phone_code',
        'currency',
        'currency_symbol',
        'region',
        'subregion'
    ];

    /**
     * Get the states/provinces/parishes for the country.
     */
    public function stateProvinceParishes(): HasMany
    {
        return $this->hasMany(StateProvinceParish::class);
    }
}
