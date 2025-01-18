<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\IconTrait;

class ProjectExternalFile extends BaseModel
{
    use HasFactory;
    use IconTrait;

    const FILE_PATH = 'project-external-files';

    public function getFileUrlAttribute()
    {
        return (!is_null($this->external_link)) ? $this->external_link : asset_url_local_s3(ProjectExternalFile::FILE_PATH . '/' . $this->hashname);
    }
}
