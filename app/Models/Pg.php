<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mongodb\Laravel\Eloquent\Model;

class Pg extends Model
{
    use HasFactory;

    // Allow mass assignment
    protected $fillable = [
        'title',
        'googleMapLink',
        'address',
        'location',
        'roomType',
        'sharingType',
        'amenities',
        'nearbyMetro',
        'nearbyBusStand',
        'nearbyLandmark',
        'nearbyCollege',
        'price',
        'ownerPhone',
        'ownerEmail',
        'description',
        'rules',
        'images',
        'ownerId',
        'createdAt',
        'updatedAt',
    ];

    // Cast some fields to JSON automatically
    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
    ];
}
