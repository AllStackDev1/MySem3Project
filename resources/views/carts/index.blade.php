@extends('layouts.app')

@section('content')
    <div class="container" id="main-container">
        <div class="pay_method" id="pay-accept">
        <div class="row" style="padding-top: 20px">
            <div class="col-md-2">
                <img src="{{url("img/COD_logo.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/master-card.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/paypal_logo.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/visa-icon.png")}}" width="100" style="background-color: #768dc3">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/net_banking_logo.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/bitcoin.png")}}" width="100">
            </div>
        </div>
    </div>
        <div class="row cart_table">
            <div class="row" id="heading">
                <h2>Your Shopping Cart</h2>
            </div>
            <div class="row" style="width: 100%; margin-bottom: 20px">
                <div class="col-md-6" style="float: left;">
                    <a href="{{url("shop#pay-accept")}}" role="button" class="btn btn-primary">Continue Shopping</a>
                </div>
                <div class="col-md-6" style="float: right; text-align: right;">
                    <span class="btn" style="font-weight: bold">Total: Ghc {{$total}}</span>
                </div>
            </div>
            @if(Session::has('message'))
                <div class="alert {{ Session::get('class', 'alert-info') }} alert-dismissible" style="width: 100%;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><i class="fa {{ Session::get('fa', 'fa-info') }}" aria-hidden="true" style="font-size: 20px;"></i></strong> {{ Session::get('message') }}
                </div>
            @endif
            @if (isset($results))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 30%">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Amount (Ghc)</th>
                        <th scope="col" style="width: 50px">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $key=>$result)
                            <tr class="table-body">
                                <td class="o_tb_i"> {{$key + 1}} </td>
                                <td class="o_tb_i">
                                    <img src="storage/img/{{ $result->product->image_path }}" width="60" height="80">
                                    <div class="pro_nm">{{ $result->product->name }}</div>
                                </td>
                                <td class="o_tb_i"> {{ $result->product->price }} </td>
                                <td class="o_tb_i">
                                    <form name="cart_update" action="{{ url('update_cart') }}" method="post">
                                        {{ csrf_field()}}
                                        <input type="number" name="quantity" title="Quantity" value="{{ $result->cart_item_count }}" min="1" max="10" maxlength="2" style="width: 50px;" />
                                        <input type="text" hidden title="Item Id" name="cart_item_id" value="{{ $result->product->id }}"/>
                                        <input type="submit" hidden name="update" value="update"/>
                                    </form>
                                </td>
                                <td class="o_tb_i"> {{ $result->product->price * $result->cart_item_count}} </td>
                                <td class="o_tb_i">
                                    <form name="remove_item" action="{{ url('remove') }}" method="post">
                                        {{ csrf_field()}}
                                        <button type="submit" class="btn btn-danger btn-sm" style="padding: 0 5px;" name="remove" value="{{ $result->id }}">
                                            <i class="fa fa-remove" style="font-size: 10px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row" style="width: 100%;">
                    <div class="col-md-6" style="float: left;">
                        <form name="clear_cart" action="{{ url('clear') }}" method="post">
                            {{ csrf_field()}}
                            <button role="button" class="btn btn-danger" name="clear" value="{{ request()->ip() }}">Clear Cart</button>
                        </form>
                    </div>
                    <div class="col-md-6" style="float: right; text-align: right">
                        <a href=" {{url("checkouts")}} " role="button" class="btn btn-success">Checkout >></a>
                    </div>
                </div>
                <p class="info-p"><i class="fa fa-asterisk" aria-hidden="true"></i> Update the quantity of an item by entering the value and press the <strong>ENTER KEY</strong>.</p>
            @else
                <div class="alert alert-info alert-dismissible" style="width: 100%;">
                    <strong><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 20px;"></i></strong> Cart Empty!
                </div>
                <div class="row empty-cart">
                    <div class="col-md-6 offset-md-5">
                        <a href="{{ url("shop#pay-accept") }}">
                            <img src="{{ url("img/empty-cart-icon-1.jpg") }}" alt="Empty Cart Image" id="cart-empty-img">
                        </a>
                    </div>
                </div>
            @endif
        </div>
        <div class="pay_method">
        <div class="row" style="padding-top: 20px">
            <div class="col-md-2">
                <img src="{{url("img/COD_logo.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/master-card.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/paypal_logo.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/visa-icon.png")}}" width="100" style="background-color: #768dc3">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/net_banking_logo.png")}}" width="100">
            </div>
            <div class="col-md-2">
                <img src="{{url("img/bitcoin.png")}}" width="100">
            </div>
        </div>
    </div>
    </div>
@endsection
