<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorInChat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendor_in_chats';
    protected $appends = ['image_url'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_name',
        'vendor_country_code',
        'vendor_phone',
        'last_msg',
        'company_logo',
        'channel_sid',    
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Accessor for the company logo URL.
     *
     * @return string|null
     */
    public function getImageUrlAttribute()
    {
        $company = company();
        return ($this->company_logo) ? asset_url_local_s3('vendor/logo/' . $this->company_logo) : $company->logo_url;
    }
}
