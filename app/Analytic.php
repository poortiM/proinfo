<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $fillable = [
    		'line_of_work',
    		'property_type',
    		'budget','location',
    		'pincode',
    		'kms',
    		'super_pros_vendors',
    		'ip',
    		'kms',
    ];
}
