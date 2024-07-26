<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectContact extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'amname',
        'amph',
        'amemail',
        'tenant_name_1',
        'tenant_email_1',
        'tenant_phone_1',
        'tenant_name_2',
        'tenant_email_2',
        'tenant_phone_2',
        'tenant_name_3',
        'tenant_email_3',
        'tenant_phone_3',
        'tenant_name_4',
        'tenant_email_4',
        'tenant_phone_4',
        'tenant_name_5',
        'tenant_email_5',
        'tenant_phone_5',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
