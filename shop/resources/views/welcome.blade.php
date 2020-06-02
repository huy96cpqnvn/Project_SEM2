@extends('layouts.frontend')
@section('content')
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
                        <a href="#">
                            <img src="{{$prodetail->cover}}" alt="">
                        </a>
                        <div class="price"><span>{{$prodetail->price}} Đ</div>
                        <div class="banner-bottom text-center">
                            <a href="#">{{$prodetail->name}}</a>
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
                        <a href="#">READ MORE</a>
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
                        <a href="#">READ MORE</a>
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
                        <a href="#">READ MORE</a>
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
                                                <a href="#" class="single-banner-image-wrapper">
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
                                                        <a href="#" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="#">{{$item->name}}</a>
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
                                                <a href="#" class="single-banner-image-wrapper">
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
                                                        <a href="#" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <a href="#">{{$item->name}}</a>
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
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">3725</span>
                        </span>
                        <h3>BOOKS READ</h3>								
                    </div>
                </div>		                
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">950</span>
                        </span>
                        <h3>ONLINE USERS</h3>								
                    </div>
                </div>		                
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">1450</span>
                        </span>
                        <h3>BEST AUTHORS</h3>								
                    </div>
                </div>		                
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="single-counter wow" data-wow-duration="1.5s" data-wow-delay=".3s">
                    <div class="counter-info">
                        <span class="fcount">
                            <span class="counter">62</span>
                        </span>
                        <h3>AWARDS</h3>								
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
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#">
                            <img src="img/blog/1.jpg" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>Modern Book Reviews</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">LATEST BLOG</a></span>
                                <span class="blog-date">19TH JAN 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#">
                            <img src="img/blog/2.jpg" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>Modern Book Reviews</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                <span class="blog-date">19TH JAN 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#">
                            <img src="img/blog/3.jpg" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>Modern Book Reviews</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                <span class="blog-date">19TH JAN 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#">
                            <img src="img/blog/4.jpg" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>Modern Book Reviews</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                <span class="blog-date">19TH JAN 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#">
                            <img src="img/blog/1.jpg" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>Modern Book Reviews</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                <span class="blog-date">19TH JAN 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="single-#">
                            <img src="img/blog/2.jpg" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="#"><h2>Modern Book Reviews</h2></a>
                            <div class="blog-info-bottom">
                                <span class="blog-author">BY: <a href="#">ZARIF SUNI</a></span>
                                <span class="blog-date">19TH JAN 2016</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- END LATEST NEWS --}}

@endsection('content')