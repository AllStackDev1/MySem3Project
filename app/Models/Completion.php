<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    protected $fillable = [
        'order_id',
        'trans_id',
        'status_id',
    ];
}
