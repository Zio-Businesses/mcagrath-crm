<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScopeOfWork extends BaseModel
{
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function added(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
