<?php

namespace App\Models;

use Mongodb\Laravel\Eloquent\Model;

class Chat extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'chats';

    protected $fillable = [
        'participants', 'msg', 
    ];
}
