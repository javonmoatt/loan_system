<?php

namespace App\Enums;

enum LoanScheduleStatus
{
    case PAID = 'paid';
    case UNPAID = 'unpaid';
    case LATE = 'late';
    case PENDING = 'pending';
}
