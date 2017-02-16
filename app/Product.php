<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'description',
        'brand',
        'price',
        'category',
        'subcategory',
        'length',
        'width',
        'depth',
        'weight',
        'material',
        'color',
        'assembly_required',
        'user_id',
        'product_code',
    ];
}
