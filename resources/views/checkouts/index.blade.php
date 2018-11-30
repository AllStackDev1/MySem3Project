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
        <div class="checkout-page">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{ $count }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach($results as $result)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $result->product->name }}</h6>
                                    <small class="text-muted"><i class="fa fa-asterisk"></i> {{ $result->cart_item_count}} piece(s)</small>
                                </div>
                                <span class="text-muted">Ghc{{ number_format($result->product->price * $result->cart_item_count, 2, '.', ' ')}}</span>
                            </li>
                        @endforeach
                        @if($promo_code != '')
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>{{ $promo_code }}</small>
                                </div>
                                <span class="text-success">-Ghc{{ number_format($discount, 2, '.', ' ') }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (GHC)</span>
                            <strong>Ghc{{ number_format($total, 2, '.', ' ') }}</strong>
                        </li>
                    </ul>
                    <form class="card p-2" action="{{ url("got_promo_code") }}" method="post">
                        <div class="input-group">
                            {{ csrf_field()}}
                            <input type="text" class="form-control  {{ Session::get('pc-error-class') }}" placeholder="Promo code" name="promo_code">
                            <input type="text" class="form-control" hidden name="total" value="{{ $total }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary" name="btn_pc" value="">Redeem</button>
                            </div>
                        </div>
                        <div class="invalid-feedback {{ Session::get('pc-error-class') }}">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ Session::get('pc-error-mge') }}
                        </div>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middleName">Middle name <span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="middleName" placeholder="" value="">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" required="">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required="">
                                    <option value="">Choose...</option>
                                    <option>Nigeria</option>
                                    <option>Ghana</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state">State (Region)</label>
                                <select class="custom-select d-block w-100" id="state" required="">
                                    <option value="">Choose...</option>
                                    <option>Abuja</option>
                                    <option>Lagos</option>
                                    <option>Accra</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Telephone">Telephone</label>
                            <div class="input-group col-md-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-plus" aria-hidden="true" style="font-size: 10px;"></i></span>
                                </div>
                                <input type="text" class="form-control" id="telephone" placeholder="233 237 280 716"
                                       required="">
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your telephone number is required.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">

                        <h4 class="mb-3">Payment</h4>
                        <div class="row">
                            <div class="d-block my-3 col-md-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="credit card" required="">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="debit card" required="">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="paypal" required="">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="d-block my-3 col-md-3">
                                <div class="custom-control custom-radio">
                                    <input id="mobilemoney" name="paymentMethod" type="radio" class="custom-control-input" value="mobile money" required="">
                                    <label class="custom-control-label" for="mobilemoney">Mobile Money</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="banktransfer" name="paymentMethod" type="radio" class="custom-control-input" value="bank transfer" required="">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="bitcoin" name="paymentMethod" type="radio" class="custom-control-input" value="bitcoin" required="">
                                    <label class="custom-control-label" for="bitcoin">Bit Coin</label>
                                </div>
                            </div>
                            <div class="d-block my-3 col-md-3">
                                <div class="custom-control custom-radio">
                                    <input id="cash_on_delivery" name="paymentMethod" type="radio" class="custom-control-input" value="cash on delivery" required="" checked="" >
                                    <label class="custom-control-label" for="cash_on_delivery">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="payment_model">

                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        $(document).ready(function() {
            $("#credit").click(function() {
                clear();
                $(".payment_model").html(

                    '<div class="row">' +
                    '<div class="col-md-6 mb-3">' +
                    '<label for="cc-name">Name on card</label>' +
                    '<input type="text" class="form-control" id="cc-name" placeholder="" required="">' +
                    '<small class="text-muted">Full name as displayed on card</small>' +
                    '<div class="invalid-feedback">' +
                    'Name on card is required' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6 mb-3">' +
                    '<label for="cc-number">Credit card number</label>' +
                    '<input type="text" class="form-control" id="cc-number" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Credit card number is required' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-3 mb-3">' +
                    '<label for="cc-expiration">Expiration</label>' +
                    '<input type="text" class="form-control" id="cc-expiration" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Expiration date required' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3 mb-3">' +
                    '<label for="cc-expiration">CVV</label>' +
                    '<input type="text" class="form-control" id="cc-cvv" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Security code required' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
            });
            $("#debit").click(function() {
                clear();
                $(".payment_model").html(

                    '<div class="row">' +
                    '<div class="col-md-6 mb-3">' +
                    '<label for="cc-name">Name on card</label>' +
                    '<input type="text" class="form-control" id="cc-name" placeholder="" required="">' +
                    '<small class="text-muted">Full name as displayed on card</small>' +
                    '<div class="invalid-feedback">' +
                    'Name on card is required' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6 mb-3">' +
                    '<label for="cc-number">Credit card number</label>' +
                    '<input type="text" class="form-control" id="cc-number" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Credit card number is required' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-3 mb-3">' +
                    '<label for="cc-expiration">Expiration</label>' +
                    '<input type="text" class="form-control" id="cc-expiration" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Expiration date required' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-3 mb-3">' +
                    '<label for="cc-expiration">CVV</label>' +
                    '<input type="text" class="form-control" id="cc-cvv" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Security code required' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
            });
            $("#paypal").click(function() {
                clear();
                oAuth_popup('paypal');
            });
            $("#mobilemoney").click(function() {
                clear();
                $(".payment_model").html(

                    '<div class="row">' +
                    '<div class="col-md-4 mb-3">' +
                    '<label for="network">Network</label>' +
                    '<select class="custom-select d-block w-100" id="network" required="">' +
                    '<option value="">Choose...</option>' +
                    '<option value="mtnmomo">MTN</option>' +
                    '<option value="tigocash">Tigo</option>' +
                    '<option value="airtelcash">Airtel</option>' +
                    '<option value="vodacash">Vodafone</option>' +
                    '</select>' +
                    '<div class="invalid-feedback">' +
                    'Please provide a valid Network.' +
                    '</div>' +
                    '</div>'+
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-6 mb-3">' +
                    '<label for="momo-no">MoMo Number</label>' +
                    '<input type="text" class="form-control" id="momo-no" placeholder="" required="">' +
                    '<div class="invalid-feedback">' +
                    'Name on account is required' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6 mb-3">' +
                    '<label for="momo-name">MoMo Account Name</label>' +
                    '<input type="text" class="form-control" id="momo-name" placeholder="" required="">' +
                    '<small class="text-muted">Full name as registered</small>' +
                    '<div class="invalid-feedback">' +
                    'Name of account is required' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
            });
            $("#banktransfer").click(function() {
                clear();
                oAuth_popup('banktransfer');
            });
            $("#bitcoin").click(function() {
                clear();
                oAuth_popup('bitcoin');
            });
            $("#cash_on_delivery").click(function() {
                clear();
            });
        });
        function clear(){
            $(".payment_model").html("");
        }
        function oAuth_popup(method) {

            let oauthpopup = function(options)
            {
                options.windowName = options.windowName || 'oAuth2' + method; // should not include space for IE
                options.windowOptions = options.windowOptions || 'location=0,status=0,width=800,height=400';
                options.callback = options.callback || function(){ window.location.reload(); };
                let that = this;
                console.log(options.path);
                that._oauthWindow = window.open(options.path, options.windowName, options.windowOptions);
                that._oauthInterval = window.setInterval(function(){
                    if (that._oauthWindow.closed) {
                        window.clearInterval(that._oauthInterval);
                        options.callback();
                    }
                }, 1000);
            };
            oauthpopup({
                path: 'oAuth2/' + method,
                callback: function()
                {
                    console.log(''+method);
                }
            });
        }
    </script>
@endsection

