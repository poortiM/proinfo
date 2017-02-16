<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 
        'description',
        'location',
        'status',
        'user_id',
        'repost_id',
        'show_on_home',
    ];
}
