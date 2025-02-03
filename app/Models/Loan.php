<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'customer_id',
        'activation_date',
        'loan_amount',
        'interest_rate',
        'penalty_rate',
        'number_of_installments',
        'repayment_frequency',
        'term',
        'purpose',
        'currency',
        'interest_calculation_method',
        'status',
    ];

    // Relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relationship with the Payment model
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function collaterals()
    {
        return $this->hasMany(LoanCollateral::class);
    }

    public function comments()
    {
        return $this->hasMany(LoanComment::class);
    }
        /**
     * Get all the documents for the loan.
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function schedules()
    {
        return $this->hasMany(LoanSchedule::class);
    }
}
