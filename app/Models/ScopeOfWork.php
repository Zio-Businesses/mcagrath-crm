<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScopeOfWork extends BaseModel
{
    use HasFactory, SoftDeletes;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function added(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
