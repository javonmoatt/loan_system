<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanCollateral extends Model
{
    /** @use HasFactory<\Database\Factories\LoanCollateralFactory> */
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'description',
        'value'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
