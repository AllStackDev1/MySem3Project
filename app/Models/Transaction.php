<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'quantity',
    ];


    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
