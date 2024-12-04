<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorChangeNotification extends BaseModel
{
    use HasFactory;
    protected $casts = [
        'sow_id' => 'array',
        'created_at' => 'datetime',
        'accepted_date'=>'datetime',
    ];
    protected $cachedSowRecords = null;
    // public function sowname($data)
    // {  
    //     $scopeofwork= ScopeOfWork::withTrashed()->find($data);
    //     return $scopeofwork;
    // }
    // public function sowcategory($data)
    // {
    //     $scopeofwork= ScopeOfWork::withTrashed()->find($data);
    //     return $scopeofwork->category;
    // }
    // public function sowsubcategory($data)
    // {
    //     $scopeofwork= ScopeOfWork::withTrashed()->find($data);
    //     return $scopeofwork->sub_category;
    // }
    // public function sowdescription($data)
    // {
    //     $scopeofwork= ScopeOfWork::withTrashed()->find($data);
    //     return $scopeofwork->description;
    // }


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

}
