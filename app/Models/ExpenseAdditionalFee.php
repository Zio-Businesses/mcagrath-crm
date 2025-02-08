<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseAdditionalFee extends Model
{
    use HasFactory;
    protected $table = 'expenses_additional_fee'; // Ensure correct table name

    protected $fillable = [
        'company_id', 
        'fee_method', 
        'added_by', 
        'last_updated_by'
    ];

}
