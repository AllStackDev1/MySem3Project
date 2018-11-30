<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'user_ip',
        'trans_id',
        'item_set',
        'total_items',
        'amount',
        'name',
        'email',
        'address',
        'phone_no',
        'pay_method',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
