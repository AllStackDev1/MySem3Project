<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartsController extends Controller
{
    private $total = 0.00;
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
        if($count>0){
            foreach($results as $key=>$result){
                for ($i=0; $i<$count; $i++){
                    $amount = $result->product->price * $result->cart_item_count;
                }
                $this->total += $amount;
            }
            $this->total -= $result->promo_code->discount;
            $this->total = number_format($this->total, 2, '.', ' ');
            return view('carts.index')->with('results',  $results)->with('total', $this->total);
        }else{
            $this->total = number_format($this->total, 2, '.', ' ');
            return view('carts.index')->with('total', $this->total);
        }

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
        if ($request->has('add_to_cart')) {

            $product_id = $request->add_to_cart;
            $ip_address = request()->ip();
            $user_id = (Auth::id()) ? Auth::id() : 0;
            $check = $this->checkUserCartItem($product_id,$ip_address,$user_id);
            if ($check){
                Cart::insert([
                    ['product_id'=>$product_id, 'ip_address'=>$ip_address, 'user_id'=>$user_id],
                ]);
                Session::flash('message', 'Item Added Successfully!');
                Session::flash('class', 'alert-success');
                Session::flash('fa', 'fa-check');
                return redirect('shop#pay-accept');
            }else{
                Session::flash('message', 'Item Already Added');
                Session::flash('class', 'alert-info');
                Session::flash('fa', 'fa-info');
                return redirect('shop#pay-accept');
            }
        }else{
            Session::flash('message', 'Error Occur!');
            Session::flash('class', 'alert-danger');
            Session::flash('fa', 'fa-exclamation-triangle');
            return redirect('shop#pay-accept');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->has('update')) {

            $new_quantity = $request->quantity;
            $product_id = $request->cart_item_id;
            $ip_address = request()->ip();
            $user_id = (Auth::id()) ? Auth::id() : 0;

            $query = Cart::where('user_id','=',$user_id)
                ->where('ip_address','=',$ip_address)
                ->where('product_id','=',$product_id)
                ->update(['cart_item_count'=>$new_quantity]);
            if ($query){
                Session::flash('message', 'Item Updated Successfully.');
                Session::flash('class', 'alert-success');
                Session::flash('fa', 'fa-check');
                return redirect('view_cart#pay-accept');
            }else{
                Session::flash('message', 'Error Occur While Updating');
                Session::flash('class', 'alert-danger');
                Session::flash('fa', 'fa-exclamation-triangle');
                return redirect('view_cart#pay-accept');
            }
        }else{
            Session::flash('message', 'Error Occur!');
            Session::flash('class', 'alert-danger');
            Session::flash('fa', 'fa-exclamation-triangle');
            return redirect('view_cart#pay-accept');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('clear')) {
            $deleted = Cart::where('ip_address', '=', $request->clear)->get()->each->delete();
            if($deleted){
                Session::flash('message', 'Cart Cleared!');
                Session::flash('class', 'alert-success');
                return redirect('view_cart#pay-accept');
            }else{
                Session::flash('message', 'Error Occurred!');
                Session::flash('class', 'alert-danger');
                return redirect('view_cart#pay-accept');
            }
        }
        elseif ($request->has('remove')){
            $deleted = Cart::where('id', '=', $request->remove)->get()->each->delete();
            if($deleted){
                Session::flash('message', 'Item successfully Removed!');
                Session::flash('class', 'alert-success');
                return redirect('view_cart#pay-accept');
            }else{
                Session::flash('message', 'Error Occurred!');
                Session::flash('class', 'alert-danger');
                return redirect('view_cart#pay-accept');
            }
        }else{
            Session::flash('message', 'Error Occurred!');
            Session::flash('class', 'alert-danger');
            return redirect('view_cart#pay-accept');

        }


    }

    public function checkUserCartItem($product_id,$ip_address)
    {
        $query = Cart::where('product_id','=', $product_id)
            ->where('ip_address','=',$ip_address)
            ->count();
        return ($query>0) ? false : true;

    }

}
