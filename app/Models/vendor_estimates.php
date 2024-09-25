<?php

namespace App\Models;

use App\Traits\HasCompany;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class vendor_estimates extends BaseModel
{
    use HasCompany;

    protected $casts = [
        'valid_till' => 'datetime',
        'last_viewed' => 'datetime',
    ];

    public static function lastEstimateNumber()
    {
        return (int)vendor_estimates::latest()->first()?->original_estimate_number ?? 0;
    }
}
