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
        'created_at' => 'datetime',
        'inspection_date'=>'datetime',
        're_inspection_date'=>'datetime',
        'bid_submitted_date'=>'datetime',
        'bid_rejected_date'=>'datetime',
        'bid_approval_date'=>'datetime',
        'work_schedule_date'=>'datetime',
        'work_schedule_re_date'=>'datetime',
        'work_completion_date'=>'datetime',
        'bid_ecd'=>'datetime',
        'work_ecd'=>'datetime',
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
