<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorContract extends BaseModel
{
    use HasFactory;
    protected $table = 'vendor_contracts';
    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return ($this->company_logo) ? asset_url_local_s3('vendor/logo/' . $this->company_logo) : null;
    }
    public function getSecondaryImageUrlAttribute()
    {
        return ($this->contract_sign) ? asset_url_local_s3('vendor/sign/' . $this->contract_sign) : null;
    }
    public function getTertiaryImageUrlAttribute()
    {
        return ($this->company_sign) ? asset_url_local_s3('vendor/company_sign/' . $this->company_sign) : null;
    }
}
