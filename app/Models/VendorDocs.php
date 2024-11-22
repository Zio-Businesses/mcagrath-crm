<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\IconTrait;

class VendorDocs extends BaseModel
{
    use IconTrait;
    use HasFactory;
    
    const FILE_PATH = 'vendor-docs';

    protected $fillable = [];

    protected $guarded = ['id'];

    protected $table = 'vendor_docs';
    public $dates = ['created_at', 'updated_at'];

    protected $appends = ['file_url', 'icon'];

    public $timestamps = false;
    
    public function getFileUrlAttribute()
    {
        return asset_url_local_s3(VendorDocs::FILE_PATH . '/' . $this->hashname);
    }
}
