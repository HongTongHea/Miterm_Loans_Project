<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id', 'payment_date', 'payment_amount',
        'principal_paid', 'interest_paid', 'balance',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
