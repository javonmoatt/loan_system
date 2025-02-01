<?php

namespace App\Models;

use App\Enums\AddressType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'street_address',
        'city',
        'customer_id',
        'state_province_parish_id',
        'postal_code_id',
        'country_id',
    ];

    protected $casts = [
        'type' => AddressType::class,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the state/province/parish associated with the address.
     */
    public function stateProvinceParish()
    {
        return $this->belongsTo(StateProvinceParish::class);
    }

    /**
     * Get the postal code associated with the address.
     */
    public function postalCode()
    {
        return $this->belongsTo(ZipPostalCode::class);
    }

    /**
     * Get the country associated with the address.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
