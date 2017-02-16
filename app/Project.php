<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 
        'location', 
        'cost',
        'service',
        'featured_image',
        'youtube_videos',
        'user_id',
        'date',
        'description',
        'type_of_project',
        'scope_of_work',
        'currency',
        'status',
        'project_status',
        'client_name',
        'area',
        'min_cost',
    ];

    public $timestamps = false;

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
}