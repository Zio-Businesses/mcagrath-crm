<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class ProjectVendor extends BaseModel
{
    use HasFactory;
    
    protected $casts = [
        'sow_id' => 'array',
    ];
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function linksentby(): BelongsTo
    {
        return $this->belongsTo(User::class, 'link_sent_by');
    }
    public function sowname($data)
    {
        $scopeofwork= ScopeOfWork::findOrFail($data);
        return $scopeofwork->sow_title;
    }

}
