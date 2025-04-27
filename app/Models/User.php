<?php

namespace App\Models;

use Mongodb\Laravel\Eloquent\Model;

class User extends Model
{
    protected $connection = 'mongodb';  // Specify MongoDB connection
    protected $collection = 'users';

    
    protected $fillable = [
        'name',
        'email',
        'password',
        'onboarding_data', // Onboarding data field
        'onboardingComplete', // Track completion status
    ];

    protected $casts = [
        'onboarding_data' => 'array', // Ensure onboarding data is saved as an array (JSON)
        'onboardingComplete' => 'boolean', // Boolean for completion status
    ];
}
