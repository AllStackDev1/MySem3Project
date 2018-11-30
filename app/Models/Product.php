<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'search_keys',
        'quantity',
        'image_path',
        'price',
    ];
}
