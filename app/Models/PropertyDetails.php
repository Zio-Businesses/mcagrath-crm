<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_address',
        'street_address',
        'city',
        'state',
        'zipcode',
        'county',
        'property_type',
        'yearbuilt',
        'bedrooms',
        'bathrooms',
        'house_size',
        'lotsize',
        'occupancy_status',
        'lockboxlocation',
        'lockboxcode',
        'utility_status',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
