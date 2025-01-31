<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'loan_id',
        'amount_due',
        'amount_paid',
        'due_date',
        'paid_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'paid_date' => 'datetime',
    ];

    // Relationship with the Loan model
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
