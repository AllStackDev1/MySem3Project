<?php
namespace App\Providers;


use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
//    private $cart_count = 0;
    private $user_id = 0;
    public function boot()
    {
        $this->cart_count();
    }

    /**
     * Compose the cart count value
     */
    public function cart_count(): void
    {

        view()->composer(['layouts.app', 'checkouts.index'], function ($view) {
            $ip_address = request()->ip();
            $user_id = (Auth::id()) ? Auth::id() : 0;
            $cart_count = Cart::where('ip_address', '=', $ip_address)
                ->orwhere('user_id', '=', $user_id)
                ->count();
            $view->with('count', $cart_count);
        });
    }
}

