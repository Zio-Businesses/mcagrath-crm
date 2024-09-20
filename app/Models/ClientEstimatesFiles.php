<?php

namespace App\Models;

use App\Traits\IconTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientEstimatesFiles extends BaseModel
{
    use IconTrait;

    const FILE_PATH = 'client-estimates-files';

    protected $fillable = [];

    protected $guarded = ['id'];

    protected $table = 'client_estimates_files';
    public $dates = ['created_at', 'updated_at'];

    protected $appends = ['file_url', 'icon'];

    public $timestamps = false;

    public function getFileUrlAttribute()
    {
        return asset_url_local_s3(ClientEstimatesFiles::FILE_PATH . '/' . $this->hashname);
    }

    public function estimate(): BelongsTo
    {
        return $this->belongsTo(Estimate::class);
    }
}
