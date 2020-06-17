@extends('layouts.frontend')
@section('content')

<!-- slider Area Start -->
<div class="slider-area">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider" class="slides">	
            <img src="{{asset('img/slider/banner_home.jpg')}}" alt="" title="#slider-direction-1"  />
            <img src="{{asset('img/slider/banner_home1.jpg')}}" alt="" title="#slider-direction-2"  />
        </div>
        <!-- direction 1 -->
        <div id="slider-direction-1" class="text-center slider-direction">
            <!-- layer 1 -->
            <div class="layer-1">
                <h2 class="title-1">LET’S WRITE IMAGINE</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
                <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- layer 4 -->
            <div class="layer-4">
                <form method="get" action="{{route('frontend.search')}}" class="title-4">
                    @csrf
                    <input type="text" name="search" placeholder="Enter your book title here">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction">
            <!-- layer 1 -->
            <div class="layer-1">
                <h2 class="title-1">LET’S WRITE IMAGINE</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
                <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- layer 4 -->
            <div class="layer-4">
                <form method="get" action="{{asset('frontend.search')}}" class="title-4">
                    @csrf
                    <input type="text" name="search" placeholder="Enter your book title here">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->  

{{-- NEW BOOK --}}

<div class="online-banner-area">
    <div class="container">
        <div class="banner-title text-center">
            <h2>ONLINE <span>BOOK STORE</span></h2>
            <p>The Online Books Guide is the biggest big store and the biggest books library in the world that has alot of the popular and the most top category books presented here. Top Authors are here just subscribe your email address and get updated with us.</p>
        </div>
        <div class="row">
            @foreach($lsProductdt as $prodetail)
            <div class="banner-list">
                <div class="col-md-4 col-sm-6">
                    <div class="single-banner">
                        <a href="single.html/{{$prodetail->id}}">
                            <img src="{{$prodetail->cover}}" alt="">
                        </a>
                        <div class="price"><span>{{$prodetail->price}} Đ</div>
                        <div class="banner-bottom text-center">
                            <a href="single.html/{{$prodetail->id}}">{{$prodetail->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- END NEW BOOK --}}

{{-- SHIPPING --}}


<div class="shop-info-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-transport"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>FREE SHIPPING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                        <a href="{{asset('/about')}}">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-money"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>FREE SHIPPING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                        <a href="{{asset('/about')}}">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-school"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>FREE SHIPPING</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. </p>
                        <a href="{{asset('/about')}}">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- END SHIPPING --}}


{{-- FEATUR --}}

<div class="featured-product-area section-padding">
            <h2 class="section-title">FEATURED PRODUCTS</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-menu">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="first-item active">
                                    <a href="#arrival" aria-controls="arrival" role="tab" data-toggle="tab">New Arrival</a>
                                </li>
                                <li role="presentation">
                                    <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">BEST SELLERS</a>
                                </li>
                            </ul>
                        </div>         
                    </div>
                </div>   
                <div class="row">
                    {{-- TAB ARRIVAL --}}
                    <div class="product-list tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                            <div class="featured-product-list indicator-style">
                                @foreach($arrProductdt->chunk(2) as $items)
                                <div class="single-p-banner">
                                    @foreach($items as $item)
                                    <div class="col-md-3">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="single.html/{{$item->id}}" class="single-banner-image-wrapper">
                                                    <img alt="" src="{{$item->cover}}">
                                                    <div class="price">{{$item->price}}<span>Đ</span></div>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="{{route('add.cart',['id'=>$item->id])}}" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="single.html/{{$item->id}}">{{$item->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>


                        {{-- TAB SALE --}}
                        <div role="tabpanel" class="tab-pane fade" id="sale">
                            <div class="featured-product-list indicator-style">
                                @foreach($saleProductdt->chunk(2) as $items)
                                <div class="single-p-banner">
                                    @foreach($items as $item)
                                    <div class="col-md-3">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="single.html/{{$item->id}}" class="single-banner-image-wrapper">
                                                <img alt="" src="{{$item->cover}}">
                                                    <div class="price">{{$item->price}}<span>Đ</span></div>
                                                    <div class="rating-icon">
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star icolor"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="{{route('add.cart',['id'=>$item->id])}}" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="single.html/{{$item->id}}">{{$item->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>             
            </div>
		</div>


{{-- END FEATUR --}}

{{-- TESTIMONIAL --}}
<div class="testimonial-area text-center">
    <div class="container">
        <div class="testimonial-title">
            <h2>OUR TESTIMONIAL</h2>
            <p>What our clients say about the books reviews and comments</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-list">
                    @foreach($comment as $comm)
                    <div class="single-testimonial">
                       <img src="img/testimonial/1.jpg" alt="">
                       <div class="testmonial-info clearfix">
                       <p>{{$comm->content}}</p> 
                           <div class="testimonial-author text-center">
                               <h3>{{$comm->name}}</h3>
                            </div>
                       </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- END TESTIMONIAL --}}

{{-- COUNTER --}}

<div class="counter-area section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">{{$lsProduct->count()}}</span>
                        </span>
                        <h3>BOOKS READ</h3>								
                    </div>
                </div>		                
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">{{$lsUser->count()}}</span>
                        </span>
                        <h3>ONLINE USERS</h3>								
                    </div>
                </div>		                
            </div>
            {{-- <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">1450</span>
                        </span>
                        <h3>BEST AUTHORS</h3>								
                    </div>
                </div>		                
            </div> --}}
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">{{$lsOrder->count()}}</span>
                        </span>
                        <h3>ORDER</h3>								
                    </div>
                </div>		                
            </div>
        </div>
    </div>
</div>

{{-- END COUNTER --}}

{{-- LATEST NEWS --}}

<div class="blog-area section-padding">
    <h2 class="section-title">LATEST BLOG</h2>
    <p>The Latest Blog post for the biggest Blog for the books Library.</p>
    <div class="container">
        <div class="row">
            <div class="blog-list indicator-style">
                @foreach ($new as $item)
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="#">
                            <img src="{{$item->cover}}" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>{{$item->title}}</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-date">{{date('d/M/Y h:m:s', strtotime($item->created_at))}}</span>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
                 
            </div>
        </div>
    </div>
</div>


{{-- END LATEST NEWS --}}

{{-- SUBMITFORM --}}

<div class="newsletter-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter-title">
                    <h2>SUBSCRIBE OUR NEWSLETTER</h2>
                    <p>Subscribe here with your email us and get up to date.</p>
                </div>
                <div class="letter-box">
                    <form action="subscribe" method="post" class="search-box">
                        @csrf
                        <div>
                            <input type="text" name="email" placeholder="Subscribe us">
                            <button type="submit" class="btn btn-search">SUBSCRIBE<span><i class="flaticon-school-1"></i></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- END SUBMITFORM --}}

@endsection('content')