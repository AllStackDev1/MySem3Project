<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in with - {{$method}}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body style="background: #fff;">
    <div class="container">
        @if($method == 'paypal')
            <div class="container" id="main-container" style="width: 80%">
                <div class="row justify-content-center" style="padding: 80px 50px 150px">
                    <div style="position: absolute; margin-top: -80px;">
                        <img src="{{ url('img/paypal.png') }}" alt="" width="165" height="80">
                    </div>
                    <h3>Log in to Paypal</h3>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('#') }}" aria-label="{{ __('Login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" value="" required="" placeholder="E-Mail Address">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" required="" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                {{ __('Continue') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($method == 'banktransfer')
            <div class="container" id="main-container" style="width: 80%">
                <div class="row justify-content-center" style="padding: 80px 50px 150px">
                    <div style="position: absolute; margin-top: -80px;">
                        <img src="{{ url('img/bank_transfer.png') }}" alt="" width="165" height="80">
                    </div>
                    <h3>Log in to Bank</h3>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('#') }}" aria-label="{{ __('Login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" value="" required="" placeholder="E-Mail Address">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" required="" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                {{ __('Continue') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($method == 'bitcoin')
            <div class="container" id="main-container" style="width: 80%">
                <div class="row justify-content-center" style="padding: 80px 50px 150px">
                    <div style="position: absolute; margin-top: -80px;">
                        <img src="{{ url('img/transfer-bitcoin.png') }}" alt="" width="165" height="80">
                    </div>
                    <h3>Log in to wallet</h3>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('#') }}" aria-label="{{ __('Login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" name="email" value="" required="" placeholder="E-Mail Address">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" required="" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                                {{ __('Continue') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>

    </script>
</body>
</html>
