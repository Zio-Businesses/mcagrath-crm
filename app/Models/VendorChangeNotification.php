<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorChangeNotification extends BaseModel
{
    use HasFactory;
    protected $casts = [
        'sow_id' => 'array',
        'created_at' => 'datetime',
        'due_date'=>'datetime',
        'accepted_date'=>'datetime',
        'rejected_date'=>'datetime',
    ];
    protected $cachedSowRecords = null;

    public function sow($data)
    {
        if ($this->cachedSowRecords === null) {
            // Load all related ScopeOfWork records once and cache them
            $this->cachedSowRecords = ScopeOfWork::withTrashed()
                ->whereIn('id', $this->sow_id)
                ->get()
                ->keyBy('id');
        }

        // Return the specific record or null if not found
        return $this->cachedSowRecords->get($data);
    }

    public function added(): BelongsTo
    {
        return $this->belongsTo(User::class, 'link_sent_by')->withoutGlobalScope(ActiveScope::class);
    }

}
