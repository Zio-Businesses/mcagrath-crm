<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectVendorCustomFilter extends BaseModel
{
    use HasFactory;
    
    protected $casts = [
        'project_category' => 'array',
        'vendor_id' => 'array',
        'link_status' => 'array',
        'work_order_status' => 'array',
        'project_status' => 'array',
        'client_id'=>'array',
        'project_members' => 'array',
    ];
}
