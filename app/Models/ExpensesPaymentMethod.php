<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesPaymentMethod extends BaseModel
{
    use HasFactory;

    protected $table = 'expenses_payment_methods'; // Ensure correct table name

    protected $fillable = [
        'company_id', 
        'payment_method', 
        'added_by', 
        'last_updated_by'
    ];
}
