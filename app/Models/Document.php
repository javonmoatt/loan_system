<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'customer_id',
        'document_type',
        'file_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    /**
     * Get the loan associated with the document.
     */
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Get the customer associated with the document.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the full URL for the file path.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}
