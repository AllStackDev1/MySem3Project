<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'promo_code_id',
        'user_id',
        'ip_address',
        'cart_item_count',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'carts';

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function promo_code()
    {
        return $this->belongsTo('App\PromoCode', 'promo_code_id');
    }

}
