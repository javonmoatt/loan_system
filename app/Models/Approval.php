<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approval extends Model
{
    /** @use HasFactory<\Database\Factories\ApprovalFactory> */
    use HasFactory;
/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'approvals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'loan_id',
        'approver_id',
        'status',
        'comments',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string', // Explicitly casting the status field as a string
    ];

    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending', // Default status is 'pending'
    ];

    /**
     * Get the loan associated with the approval.
     */
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    /**
     * Get the approver (user) associated with the approval.
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

}
