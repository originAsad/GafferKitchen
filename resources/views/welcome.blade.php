<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gaffer Kitchen</title>

        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/pricing.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        

        <style>

            @foreach($sliders as $key=>$slider)
        .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{$key+1}}) .item{
            background:url({{ asset('uploads/slider/'.$slider->image)}});
            background-size:cover;
        }
        @endforeach
        
        </style>
        <script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.flexslider.min.js') }}"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>

      
    </head>
    <body data-spy="scroll" data-target="#template-navbar">

        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top" 
        style="height:10px;">
            <div class="container">
          
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="#menu-list">Menu List</a></li>
                        <li><a href="#reserve">reservation</a></li>
                        <li><a href="#contact">contact</a></li>
                    </ul>
               
      
            </div>
        </nav>


        <!--== 5. Header ==-->
        
 <div class="col-md-4 col-sm-12 col-xs-12" style="position: absolute; right:50px; top:200px;  background-color: #F8BA69;">
                                <div class="opening-time">
                                    <h3 class="opening-time-title">Facts</h3>
                                    <p>Food, fun & Festivity, this is what GafferKitchen is all
                                     leading the market since its inception, GafferKitchen provides
                                      the ultimate chicken meals for a chicken loving nation.
                                       Be it colonel sanders secret original recipe chicken 
                                       or the hot & spicy version, every bite brings
                                        a yum on our face. At GafferKitchen we can proudly say, 
                                        “We do chicken right”.

</p></div>

                                    <div class="launch">
                                        <br/>
                                   <p>Apart from fulfilling our commitment to serving delicious,
                                    fresh and hygienic food and at the same time providing 
                                    our customer with the ultimate entertainment; 
                                    </div>
                                </div>
                            

        <section id="header-slider" class="owl-carousel" style="margin-top: 90px; width:60%; margin-left:25px; 
        margin-bottom:30px;">
@foreach($sliders as $key=>$slider)
 <div class="item">
    <div class="container">
        <div class="header-content">
            <h4 class="header-title">{{$slider->title}}</h4>
            <h2 class="header-sub-title">{{$slider->sub_title}}</h2>
            </div>
        </div>
 </div>
 @endforeach

 
            </section>


        <section id="menu-list" class="menu-list">
            <div id="w">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Affordable Pricing</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">All</li>
                                          
                                            @foreach($categories as $categroy)
                                            <li class="filter" data-filter="#{{ $categroy->slug}}">
                                            {{$categroy->name}}
                                            <span class="badge" style="background-color:#493997">
                                                {{$categroy->items->count()}}</span></li>
                                          @endforeach
                                    
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">  
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">
                                
                                @foreach($items as $item)

                                <li class="item" id="{{$item->category->slug}}">
                                    <a href="{{route('checkout',$item->id)}}">
                                        <img src="{{asset('uploads/item/'.$item->image)}}" class="img-responsive" alt="Food" >
                                        <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{$item->name}}</h3>
                                              
                                                {{$item->description}}
                                            </span>
                                        </div>
                                    </a>
                                        
                                    <h5><font style="color:#493997">PKR {{$item->price}}</font> </h5>
                                </li>

                                @endforeach
                          

                        </div>   
                    </div>
                </div>

            </div> 
        </section>
<section id="reserve" class="reserve">
    <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('frontend/images/icons/reserve_black.png') }}">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row dis-table">
                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                    <h2 class="section-title">Reserve A Table !</h2>
                </div>
                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                </div>
            </div> 
        </div> 
    </div> 
</section> 


<section class="reservation">
    <div class="wrapper">
        <div class="container-fluid">
            <div class=" section-content">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <form class="reservation-form" method="POST" action="{{route('reservation.reserve')}}">
                           {{csrf_field()}}
                            <div class="row">
                            
                                   <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="name" id="name"
                                               placeholder="  &#xf007;  Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control reserve-form empty iconified" id="email"  placeholder="  &#xf1d8;  e-mail">
                                    </div>
                         
                                    <div class="form-group">
                                        <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone"  placeholder="  &#xf095;  Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control reserve-form empty iconified" name="dateandtime" id="datetimepicker1" placeholder="&#xf017;  Time">
                                    </div>
                                    <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3"  placeholder="  &#xf086;  We're listening"></textarea>
                               
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                        <span><i class="fa fa-check-circle-o"></i></span>
                                        Make a reservation
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                            <div class="col-md-2 hidden-sm hidden-xs"></div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="opening-time">
                                    <h3 class="opening-time-title">Hours</h3>
                                    <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                                    <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                                    <div class="launch">
                                        <h4>Lunch</h4>
                                        <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                                    </div>

                                    <div class="dinner">
                                        <h4>Dinner</h4>
                                        <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                        <p>Sun: 5:30 PM - 12:00 AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>




        <section id="contact" class="contact">
            <div class="container-fluid color-bg">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell">
                        <h2 class="section-title">Contact With us</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <p>R-545 Sector 14 A Shadman Town Karachi</p>
                            <p>0321-2239552</p>
                            <p>asadiftikhar539@gmail.com </p>
                        </div>
                    </div>
                </div>
               
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div id="map-canvas"></div>
            </div>
        </div>



        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="row">
                             <form class="contact-form" method="post" action="{{route('contact.send')}}">
                             {{@csrf_field()}}
                                
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input  name="name" type="text" class="form-control" id="name"  placeholder="  Name"  required>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="email"  placeholder="  Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" id="subject"  placeholder="  Subject" required="required">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <textarea name="message" type="text" class="form-control" id="message" rows="7"  placeholder="  Message"></textarea>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <div class="text-center">
                                        <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2018 GafferKitchen
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </footer>

    
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.mixitup.min.js') }}" ></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.hoverdir.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jQuery.scrollSpeed.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            $(function(){
                $('#datetimepicker1').datetimepicker({
                    format:"dd MM yyyy -HH : 11 P",
                    showMeridian:true,
                    autoclose:true,
                    todayBtn:true
                });

            })
        </script>
        {!! Toastr::message() !!}
    </body>
</html>