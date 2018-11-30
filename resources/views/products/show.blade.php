@extends('layouts.app')

@section('content')
    <div class="container" id="main-container">
        <div class="row" style="background-color: #ffffff; padding: 20px;">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <img src="../storage/img/{{$product->image_path}}" alt="{{$product->name}}" style="width: 450px; height: 600px;">
            </div>
            <div class="col-md-5" style="padding: 30px;">
                {{$product->description}}
                <p style="margin: 20px; float: right;">
                    Price: <b># {{$product->price}}</b>
                </p>
            </div>
        </div>
    </div>
@endsection
