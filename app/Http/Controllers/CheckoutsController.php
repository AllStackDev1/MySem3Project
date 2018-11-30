<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Checkout;
use App\PromoCode;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutsController extends Controller
{
    private $total = 0.00;

    /**
     * Make a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip_address = request()->ip();
        $user_id = (Auth::id()) ? Auth::id() : 0;
        $results = Cart::where('ip_address','=',$ip_address)
            ->orwhere('user_id','=',$user_id)
            ->with('product')
            ->with('promo_code')->get();
        $count = $results->count();
        foreach($results as $key=>$result){
            for ($i=0; $i<$count; $i++){
                $amount = $result->product->price * $result->cart_item_count;
            }
            $this->total += $amount;
        }
        $this->total -= $result->promo_code->discount;
        return view('checkouts.index')
            ->with('results',  $results)
            ->with('promo_code',  $result->promo_code->code)
            ->with('discount',  $result->promo_code->discount)
            ->with('total', $this->total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function promo(Request $request)
    {
        if(isset($request->promo_code)){

            $get_pc_id = PromoCode::where('code','=',$request->promo_code)->first();
            if($get_pc_id) {
                $promo_code_id = $get_pc_id->id;
            }else{
                Session::flash('pc-error-mge', 'Code Expired or Invalid!');
                Session::flash('pc-error-class', 'pc-error');
                return redirect('checkouts#pay-accept');
            }
            $ip_address = request()->ip();
            $user_id = (Auth::id()) ? Auth::id() : 0;
            $query = Cart::where('ip_address','=',$ip_address)
                ->orwhere('user_id','=',$user_id)
                ->update(['promo_code_id'=>$promo_code_id]);
            if ($query){
                return redirect('checkouts#pay-accept');
            }else{
                Session::flash('message', 'Error Occur While Updating');
                Session::flash('class', 'alert-danger');
                Session::flash('fa', 'fa-exclamation-triangle');
                return redirect('view_cart#pay-accept');
            }
        }else{
            Session::flash('pc-error-mge', 'Enter promo code!');
            Session::flash('pc-error-class', 'pc-error');
            return redirect('checkouts#pay-accept');
        }
    }

    public function oAuth2($method){
        return view('checkouts.oAuth2')
            ->with('method', $method);
    }
}
