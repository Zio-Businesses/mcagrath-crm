<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends BaseModel
{
    use HasFactory;

    // protected $fillable = ['payment_methods']; // Add other fillable attributes as needed

    protected $casts = [
        'nxt_date' => 'datetime', // Cast payment_methods to an array
    ];
    
    public function notetb(): HasMany
    {
        return $this->hasMany(VendorNotes::class, 'vendor_id')->orderByDesc('id');
    }

    public function getImageUrlAttribute()
    {
        return ($this->sign) ? asset_url_local_s3('vendor/sign/' . $this->sign) : null;
    }
    public static function getStatuses()
    {
        return [
            'Yet to Call', 'Voicemail', 'Unable to Connect','Incorrect Ph # Listed','Duplicate','Initial Pitch Made','Proposal Link Sent','Declined by Vendor','Rejected by MCG','Non-Responsive','Profile Created','Awaiting Docs','Active',
        ];
    }
    
}
