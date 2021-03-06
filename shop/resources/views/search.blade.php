@extends('layouts.frontend')
@section('content')

<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <div class="layer-4">
                <form method="get" action="{{route('frontend.search')}}" class="title-4">
                    @csrf
                    <input type="text" name="search" placeholder="Enter your book title here">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
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
                                    <div class="price-slider-amount">
                                        <form action="{{route('filter.price')}}" method="get" > 
                                            @csrf
                                            <div style="text-align: center">
                                                <select name="price" id="11">
                                                    <option value="0">Price</option>
                                                    <option value="1" >0 - 50k</option>
                                                    <option value="2">50 - 200k</option>
                                                    <option value="3"> > 200k</option>
                                                </select>
                                                <select name="category" id="22" >
                                                    <option value="Category">Category</option>
                                                    <option value="Văn học">Văn học</option>
                                                    <option value="Kinh tế">Kinh tế</option>
                                                    <option value="Kĩ năng sống"> Kĩ năng sống</option>
                                                </select>
    
                                            </div>
    
                                            <div class="widget-buttom" style="margin-top: 20px ;text-align: center" >
                                                <button class="btn btn-default" type="submit">Filter</button>
                                            </div>
    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </aside>                            
                    </div>
                    <div class="shop-widget-bottom">
                        {{-- <aside class="widget widget-tag">
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
                        </aside> --}}
                        {{-- <aside class="widget widget-seller">
                            <h2 class="sidebar-title">TOP SELLERS</h2>
                                @foreach ($saleProductdt as $item)
                                    <div class="single-seller">
                                        <div class="seller-img">
                                            <img src="{{$item->cover}}" alt="" />
                                        </div>
                                        <div class="seller-details">
                                            <a href="{{asset("single.html/$item->id")}}"><h5>{{$item->name}}</h5></a>
                                            <h5>{{$item->price}} Đ</h5>
                                        </div>
                                    </div>
                                @endforeach

                         </aside> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-tab-area">
                    
                    <div class="shop-tab-list">
                        <div class="shop-tab-pill pull-left">
                            <h2>Search for "<span style="color: #38b4f4">{{$search}}</span>"</h2>  
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="row tab-pane fade in active" id="home">
                            <div class="shop-single-product-area pull-left">
                                 @foreach ($lsProduct as $prd)
                                    <div class="col-md-4 col-lg-4 hidden-sm">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="{{asset("single.html/$prd->id")}}" class="single-banner-image-wrapper">
                                                    <img alt="" src="{{asset($prd->cover)}}">
                                                    <div class="price">{{$prd->price}}</div>
                                                </a>
                                                <div class="product-description">
                                                    <div class="functional-buttons">
                                                        <a href="{{route('add.cart',['id'=>$prd->id])}}" title="Add to Cart">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <div class="banner-bottom-title">
                                                    <a href="{{asset("single.html/$prd->id")}}">{{$prd->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                                 {{$lsProduct->links()}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')
