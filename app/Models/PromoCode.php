<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = [
        'id',
        'code',
        'discount',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'promocodes';
}
