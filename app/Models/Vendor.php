<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // protected $fillable = ['payment_methods']; // Add other fillable attributes as needed

    // protected $casts = [
    //     'payment_methods' => 'array', // Cast payment_methods to an array
    // ];

    public function getImageUrlAttribute()
    {
        return ($this->sign) ? asset_url_local_s3('vendor/sign/' . $this->sign) : null;
    }
    public static function getStatuses()
    {
        return [
            'work in progress', 'in progress', 'rejected','vendor created','email not send','on hold',
        ];
    }
    
}
