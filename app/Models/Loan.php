<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'loan_amount', 'interest_rate', 'loan_term',
        'start_date', 'end_date', 'payment_type',
    ];

    public function schedules()
    {
        return $this->hasMany(LoanSchedule::class, 'loan_id');
    }
    

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
