<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorWorkOrderStatus extends BaseModel
{
    use HasFactory;
    protected $casts = [
        'vendor_status' => 'array',
    ];
}
