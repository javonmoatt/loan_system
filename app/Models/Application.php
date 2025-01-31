<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'firstname',
        'lastname',
        'trn',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'marital_status',
        'number_of_dependents',
        'current_employer',
        'job_title',
        'employment_start_date',
        'monthly_income',
        'employer_address',
        'work_phone',
        'self_employed',
        'total_monthly_expenses',
        'total_monthly_debt_obligations',
        'desired_loan_amount',
        'purpose',
        'term',
        'desired_payment_frequency',
        'reference_1_name',
        'reference_1_phone',
        'reference_2_name',
        'reference_2_phone',
        'bank_name',
        'bank_branch',
        'account_number',
        'routing_number',
        'account_type',
        'status',
    ];
}
