@extends('layouts.app')

@section('content')
    <div class="container" id="main-container">
        <div class="how_it_works">
            <h1 style="padding: 10px; color: #738ac1;"><a name="how_it_works"></a>HOW IT WORKS</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-header">CUSTOMISE &amp; PLACE ORDER</div>
                    <div class="card-body">
                        <img src="{{url("img/work1.png")}}">
                        <p>Choose your product and personalise it with custom necklines, sleeves etc.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-header">GIVE US YOUR MEASUREMENT</div>
                    <div class="card-body">
                        <img src="{{url("img/work2.png")}}">
                        <p>While we pickup your dress material, give us a perfectly fitting garment to stitch as per your measurements.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-header">10 DAYS TO STITCH &amp; DELIVER</div>
                    <div class="card-body">
                        <img src="{{url("img/work3.png")}}">
                        <p>Each material is individually hand-cut, stitched and finished by professional tailors and delivered at your doorstep.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-header">PAY ON DELIVERY</div>
                    <div class="card-body">
                        <img src="{{url("img/work4.png")}}">
                        <p>Pay by cash after you receive your newly stitched outfit along with the measurement garment.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="why_us">
            <h1 style="padding: 10px; text-align: center; color: #738ac1;"><a name="why_us"></a>WHY RALPHMOOLINS DESIGNS</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-header">CONVENIENCE</div>
                    <div class="card-body">
                        <div class="wu_img_p">
                            <img src="{{url("img/brand1.png")}}">
                        </div>
                        <p class="wu_p">Get your dress material stitched without stepping out of your house.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-header">DESIGN YOUR OWN</div>
                    <div class="card-body">
                        <div class="wu_img_p">
                            <img src="{{url("img/brand2.png")}}">
                        </div>
                        <p class="wu_p">Personalise your product through our simple-to-use customisation tool.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="wu_img_p">
                            <img src="{{url("img/brand3.png")}}">
                        </div>
                        <p class="wu_p">Get your newly stitched garment delivered securely and on time.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="reviews">
            <h1 style="padding: 10px; text-align: center; color: #738ac1;"><a name="reviews"></a>REVIEWS</h1>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div style=" padding: 5px; text-align: center">
                        <img src="{{url("storage/img/reviews/avatar.jpg")}}" width="60" style="border-radius: 50%;">
                    </div>

                    <p class="testimonial_para">
                        <sup><i class="fa fa-quote-left testimonial_fa" aria-hidden="true" style="font-size: 10px; color: #2d51a3;"></i></sup>
                        This was my first experience and it was really nice....
                        I liked the concept of tailor services at your doorstep that
                        too with a professional touch to it which you don't get from the local tailors.
                        Fitting was really nice which impressed me so much so that I have already placed my next order.
                        <sup><i class="fa fa-quote-right testimonial_fa" aria-hidden="true" style="font-size: 10px; color: #2d51a3;"></i></sup>
                        <span class="name_r" style="float: right;">Lilly Joe</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="faqs">
            <h1 style="padding: 10px; color: #738ac1;"><a name="faqs"></a>FAQs</h1>
            <div class="row">
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">1</div>
                    <div class="faqs_body">
                        <div class="faqs_question">What is Ralphmoolins Designs? </div>
                        <div class="faqs_answer">
                            <p>Ralphmoolins Designs provides online tailoring services to women without having to step out of the house.
                                Whether it is blouses, kurtas, bottoms or salwar suits,
                                we help you to get your dress material stitched as per your measurement garment by professional tailors.
                                You can schedule a free pickup service when you place an order.
                                Our pickup team will visit your house to collect the dress material and the measurement garment.
                                It will take 10 working days to stitch, finish and deliver your tailored outfit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">2</div>
                    <div class="faqs_body">
                        <div class="faqs_question">Why RalphMoolins Designs and not the next door tailoring shop?</div>
                        <div class="faqs_answer">
                            <p>Does bad fit and untimely deliveries from your local tailor frustrate you?
                                Do you find it inconvenient to go, deliver and pickup your orders? Well, now you have a choice.
                                Just place your order online at your convenience and schedule a free pick-up & leave the rest with us.
                                If you have difficulty placing your order, just call us. We will help you place your order.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">3</div>
                    <div class="faqs_body">
                        <div class="faqs_question">What are the garment types that you offer stitching service?</div>
                        <div class="faqs_answer">
                            <p>Currently, we offer 4 garment types: blouse, kurta, bottoms and salwar suit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">4</div>
                    <div class="faqs_body">
                        <div class="faqs_question">Do you send a tailor to my house to take my measurements? </div>
                        <div class="faqs_answer">
                            <p>No. You will have to provide a perfectly fitting garment along with the dress material so that we can stitch it as per your measurements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">5</div>
                    <div class="faqs_body">
                        <div class="faqs_question">How much does this service cost? </div>
                        <div class="faqs_answer">
                            <p>The cost varies based on your stitching requirement. Please refer to the pricing section above for more details.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">6</div>
                    <div class="faqs_body">
                        <div class="faqs_question">Are there any pick-up and delivery charges? </div>
                        <div class="faqs_answer">
                            <p>No. We offer free pick-up &amp; delivery. Currently our service is in Bangalore city and we will be coming to other cities soon.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">7</div>
                    <div class="faqs_body">
                        <div class="faqs_question">Do you alter in case the stitched dress does not fit me well? </div>
                        <div class="faqs_answer">
                            <p>It is very unlikely to happen as we take the measurement garment from you before we start stitching the dress material.
                                However, if it happens, we will alter it as per your need free of cost.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 faqs_item">
                    <div class="faqs_no">8</div>
                    <div class="faqs_body">
                        <div class="faqs_question">Awesome. Who is behind this service? </div>
                        <div class="faqs_answer">
                            <p>We are a team of professionals, including a fashion design expert.
                                We are passionate about bringing change to the unprofessional world of tailoring service in India.
                                We believe that our process, technology, and professionally managed stitching centre is going to bring a smile on your face, forever!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="schedule-btn">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="{{url("/")}}" class="btn" role="button" style="background-color: rgb(213, 220, 237); color: #000;">SCHEDULE A FREE PICK UP</a>
                    <p><span id="star_icon">*</span><span id="schedule_notice">Currently available in Nigeria only. Coming to other country soon.</span></p>
                </div>
            </div>
        </div>
        <div class="about_us">
            <h1 style="padding: 10px; color: #738ac1;"><a name="about">About Ralphmoolins Designs</a></h1>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <p>
                        Ralphmoolins Designs offers the modern day woman an unparalleled made-to-measure online tailoring service. It is an unique experience that lets you  express your personal sense of style without having to worry about design, fit, quality and delivery commitment. Offering free pick-up and delivery service in Bangalore,
                        the service provides customisable designs in blouses, kurtas, suits and bottoms according to the client's individual measurement.
                    </p>
                </div>
            </div>
        </div>
        <div class="pay_method">
            <h4 style="padding: 10px; text-transform: uppercase; color: #738ac1;"><a name="pay_method"></a>We accept</h4>
            <div class="row">
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
