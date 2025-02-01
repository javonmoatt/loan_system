<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StateProvinceParish extends Model
{
    /** @use HasFactory<\Database\Factories\StateProvinceParishFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'country_id'
    ];

    protected $casts = [
        'type' => StateProvinceParishType::class,
    ];

    /**
     * Get the country that owns the state/province/parish.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
