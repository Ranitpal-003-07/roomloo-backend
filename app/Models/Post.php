<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mongodb\Laravel\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'userId',
        'content',
        'image',
        'likes',
        'comments',
        'shares',
        'timestamp',
    ];

    protected $casts = [
        'comments' => 'array',
        'timestamp' => 'datetime',
    ];
}
