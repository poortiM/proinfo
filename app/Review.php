<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
        'efficiency', 
        'quality', 
        'helpfulness',
        'effectiveness',
        'experience',
        'name',
        'email',
        'phone',
        'description',
        'user_id',
        'time',
        'status',
    ];

    public $timestamps = false;

    public function vendors(){
        return $this->belongsToMany('App\Vendor');
    }
}
