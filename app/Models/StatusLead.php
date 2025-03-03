<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusLead extends Model
{
    use HasFactory;
    protected $table = 'status_leads'; // Explicitly defining the table name

    protected $fillable = [
        'company_id',
        'status',
    ];
    
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'company_id', 'company_id');
    }
   
}
