@extends('layouts.frontend')

@section('content')
<!-- Map Area Start -->
<div class="map-area" style="padding-top: 100px;">
    <div id="googleMap" style="width:100%;height:445px;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7448.267014620704!2d105.77827898208807!3d21.0273433958073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3260b1a8b%3A0x862052392e3f478e!2zOCBUw7RuIFRo4bqldCBUaHV54bq_dCwgTeG7uSDEkMOsbmgsIFThu6sgTGnDqm0sIEjDoCBO4buZaSAxMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1592991571300!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
</div>
<!-- Map Area End -->	
<!-- Address Information Area Start -->
<div class="address-info-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-user-plus"></i></span>
                        </div>
                        <div class="info">
                            <h3>PHONE</h3>
                            <p>+(84)-0243.123.456</p>
                            <p>+(84)-0163.123.456</p>
                        </div>
                    </div>
                </div>						
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single">
                    <div class="all-adress-info">
                        <div class="icon">
                            <span><i class="fa fa-map-marker"></i></span>
                        </div>
                        <div class="info">
                            <h3>ADDRESS</h3>
                            <p>Tôn Thất Thuyết Street 8,</p>
                            <p>Hanoi City, Vietnam.</p>
                        </div>
                    </div>
                </div>						
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="address-single no-margin">
                    <div class="all-adress-info">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="info">
                            <h3>E-MAIL</h3>
                            <p>writer@gmail.com</p>
                            <p>www.writer.com</p>
                        </div>
                    </div>
                </div>					
            </div>
        </div>
    </div>
</div>
<!-- Address Information Area End -->
<!-- Contact Form Area Start -->
<div class="contact-form-area">
    <div class="container">
        <div class="about-title">
            <h3>LEAVE A MESSAGE</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{asset('post_message')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="contact-form-left">
                                <input type="text" placeholder="Your Name" name="name" id="name" />
                                <input type="email" placeholder="Your Email" name="email" id="email" />
                                <input type="text" placeholder="Your phone" name="phone" id="phone" />
                            </div>								
                        </div>
                        <div class="col-md-7">
                            <div class="contact-form-right">
                                <div class="input-message">
                                    <textarea name="content" id="message" placeholder="Your Message"></textarea>
                                    <input class="btn btn-default" type="submit" value="SEND" name="submit" id="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form Area End -->


<!-- all js here -->
<!-- jquery latest version -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="js/owl.carousel.min.js"></script>
<!-- jquery-ui js -->
<script src="js/jquery-ui.min.js"></script>
<!-- jquery Counterup js -->
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>	
<!-- jquery countdown js -->
<script src="js/jquery.countdown.min.js"></script>
<!-- jquery countdown js -->
<script type="text/javascript" src="venobox/venobox.min.js"></script>
<!-- jquery Meanmenu js -->
<script src="js/jquery.meanmenu.js"></script>
<!-- wow js -->
<script src="js/wow.min.js"></script>	
<script>
    new WOW().init();
</script>
<!-- scrollUp JS -->		
<script src="js/jquery.scrollUp.min.js"></script>
<!-- plugins js -->
<script src="js/plugins.js"></script>
<!-- Nivo slider js -->
<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/home.js" type="text/javascript"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMrdj9B1JYMqx1cYHqMxoZuEXydwyQmWo&callback=initMap&language=en"></script>
<!--<script>
    function initMap() {
       var myOptions = {
           zoom: 15,
           center: new google.maps.LatLng(21.0288772,105.7795577),
           mapTypeId: google.maps.MapTypeId.ROADMAP
       };
       map = new google.maps.Map(document.getElementById('googleMap'), myOptions);
       marker = new google.maps.Marker({
           map: map,
           position: new google.maps.LatLng(21.0288772,105.7795577)
       });
       infowindow = new google.maps.InfoWindow({
           content: 'số 8 Tôn Thất Thuyết'
       });
       google.maps.event.addListener(marker, 'click', function() {
           infowindow.open(map, marker);
       });
       infowindow.open(map, marker);
   }
   google.maps.event.addDomListener(window, 'load', initMap);
</script>		-->
<!-- main js -->
<script src="js/main.js"></script>
@endsection
