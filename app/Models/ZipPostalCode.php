<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZipPostalCode extends Model
{
    /** @use HasFactory<\Database\Factories\ZipPostalCodeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'city',
        'state_province_parish_id'
    ];

    /**
     * Get the state/province/parish that owns the ZIP/postal code.
     */
    public function stateProvinceParish(): BelongsTo
    {
        return $this->belongsTo(StateProvinceParish::class);
    }
}
