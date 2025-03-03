<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLead extends Model
{
    use HasFactory;
 

    protected $fillable = [
        'company_id',
        'status'
    ];
    
    public function lead()
    {
        return $this->belongsTo(Company::class);
    }
   
}
