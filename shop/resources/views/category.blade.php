@extends('layouts.frontend')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>SHOP LEFT SIDEBAR</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 


<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">CATEGORY</h2>
                            <ul class="sidebar-menu">
                                @foreach($allCategory as $cate)
                                    <li><a href="{{asset("category.html/$cate->id")}}"><i class="fa fa-angle-double-right"></i>{{$cate->name}}</a>
                                        <ul>
                                            @foreach($cate->products as $prod)
                                                <li><a href="{{asset("category.html/$cate->id/$prod->id", false)}}">{{$prod->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </aside> 
                        <aside class="widget shop-filter">
                            <h2 class="sidebar-title text-center">PRICE SLIDER</h2>
                            <div class="info-widget">
                                <div class="price-filter">
                                    <div id="slider-range"></div>
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                        <div class="widget-buttom">
                                            <input type="submit"  value="Filter"/>  
                                            <input type="reset" value="CLEAR" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>                            
                    </div>
                    <div class="shop-widget-bottom">
                        <aside class="widget widget-tag">
                            <h2 class="sidebar-title">POPULAR TAG</h2>
                            <ul class="tag-list">
                                <li>
                                    <a href="#">e-book</a>
                                </li>
                                <li>
                                    <a href="#">writer</a>
                                </li>
                                <li>
                                    <a href="#">book’s</a>
                                </li>
                                <li>
                                    <a href="#">eassy</a>
                                </li>
                                <li>
                                    <a href="#">nice</a>
                                </li>
                                <li>
                                    <a href="#">author</a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget-seller">
                            <h2 class="sidebar-title">TOP SELLERS</h2>
                            <div class="single-seller">
                                <div class="seller-img">
                                    <img src="img/shop/1.jpg" alt="" />
                                </div>
                                <div class="seller-details">
                                    <a href="shop.html"><h5>Cold mountain</h5></a>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-seller">
                                <div class="seller-img">
                                    <img src="img/shop/2.jpg" alt="" />
                                </div>
                                <div class="seller-details">
                                    <a href=""><h5>The historian</h5></a>
                                    <h5>$ 50.00</h5>
                                    <ul>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                        <li><i class="fa fa-star icolor"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-tab-area">
                    <div class="shop-tab-list">
                        <div class="shop-tab-pill pull-right">
                            <ul>
                                {{-- <li class="product-size-deatils">
                                    <div class="show-label">
                                        <label><i class="fa fa-sort-amount-asc"></i>Sort by : </label>
                                        <select>
                                            <option value="position" selected="selected">Position</option>
                                            <option value="Name">Name</option>
                                            <option value="Price">Price</option>
                                        </select>
                                    </div>
                                </li>	 --}}
                                <li class="shop-pagination">{{$data->links()}}</li>
                            </ul>
                            {{-- <div class="shop-pagination">{{$data->links()}}</div> --}}
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="row tab-pane fade in active" id="home">
                            <div class="shop-single-product-area">
                                 @foreach ($data as $pr)
                                    <div class="col-md-4 col-lg-4 hidden-sm">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="single.html/{{$pr->id}}" class="single-banner-image-wrapper">
                                                    <img alt="" src="{{$pr->cover}}">
                                                    <div class="price">{{$pr->price}}</div>
                                                    <p>{{$pr->review}}</p>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="{{route('add.cart',['id'=>$pr->id])}}" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <div class="banner-bottom-title">
                                                    <a href="single.html/{{$pr->id}}">{{$pr->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                

                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="row">
                                <div class="single-shop-product">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="left-item">
                                            <a href="single-product.html" title="East of eden">
                                                <img src="img/featured/1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <div class="deal-product-content">
                                            <h4>
                                                <a href="single-product.html" title="East of eden">East of eden</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="new-price">$ 140.00</span>
                                                <span class="old-price">$ 120.00</span>
                                            </div>
                                            <div class="list-rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                            <div class="availability">
                                                <span>In stock</span>
                                                <span><a href="cart.html">Add to cart</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="left-item">
                                            <a href="single-product.html" title="People of the book">
                                                <img src="img/featured/2.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <div class="deal-product-content">
                                            <h4>
                                                <a href="single-product.html" title="People of the book">People of the book</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="new-price">$ 140.00</span>
                                                <span class="old-price">$ 120.00</span>
                                            </div>
                                            <div class="list-rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                            <div class="availability">
                                                <span>In stock</span>
                                                <span><a href="cart.html">Add to cart</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="left-item">
                                            <a href="single-product.html" title="The secret letter">
                                                <img src="img/featured/3.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <div class="deal-product-content">
                                            <h4>
                                                <a href="single-product.html" title="The secret letter">The secret letter</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="new-price">$ 140.00</span>
                                                <span class="old-price">$ 120.00</span>
                                            </div>
                                            <div class="list-rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                            <div class="availability">
                                                <span>In stock</span>
                                                <span><a href="cart.html">Add to cart</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-shop-product">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="left-item">
                                            <a href="single-product.html" title="Lone some dove">
                                                <img src="img/featured/4.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <div class="deal-product-content">
                                            <h4>
                                                <a href="single-product.html" title="Lone some dove">Lone some dove</a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="new-price">$ 140.00</span>
                                                <span class="old-price">$ 120.00</span>
                                            </div>
                                            <div class="list-rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                            <div class="availability">
                                                <span>In stock</span>
                                                <span><a href="cart.html">Add to cart</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')