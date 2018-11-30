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
        <div class="row" id="heading">
            <h2>Welcome to Ralphmoolines Designs. Shop for Quality. Make Purchase and pay on delivery or through your credit card</h2>
        </div>
        @if(Session::has('message'))
            <div class="alert {{ Session::get('class', 'alert-info') }} alert-dismissible" style="width: 100%;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa {{ Session::get('fa', 'fa-info') }}" aria-hidden="true" style="font-size: 20px;"></i></strong> {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="shop/{{$product->id}}">
                            <img src="storage/img/{{$product->image_path}}" alt={{$product->name}}>
                        </a>
                        <div class="caption">
                            <p>{{$product->name}}</p>
                            <p style="text-align: right;"> Price: <b># {{$product->price}}</b></p>
                        </div>
                        <form action="add_to_cart" method="post">
                            {{csrf_field()}}
                            <div class="btn-cart">
                                <button type="submit" class="btn btn-primary btn-sm" name="add_to_cart" value="{{$product->id}}">Add to Card</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
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
