<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCustomFilter extends BaseModel
{
    use HasFactory;
    protected $casts = [
        'state' => 'array',
        'county' => 'array',
        'city' => 'array',
        'contractor_type' => 'array',
        'created_by' => 'array',
        'vendor_status'=>'array',
    ];
}
