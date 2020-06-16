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
                       <li>
                            {{$curentCate['name']}}
                        </li> <li>
                           @if(isset($curentProdut))
                            {{$curentProdut->name}}
                           @endif
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
                                    <form action="{{route('filter.price')}}" @method('get') @csrf>
                                        <div style="text-align: center">
                                            <select name="price" id="11">
                                                <option value="0">Price</option>
                                                <option value="1">0 - 50k</option>
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

                                        <div style="margin-top: 20px ;text-align: center" >
                                            <button class="btn btn-default" type="submit">Filter</button>
                                        </div>

                                    </form>

                            </ul>
                        </aside>
                        {{-- <aside class="widget shop-filter">
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
                        </aside>                             --}}
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
                        <aside class="widget widget-seller">
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
                                                <a href="{{asset("single.html/$pr->id")}}" class="single-banner-image-wrapper">
                                                    <img alt="" src="{{asset($pr->cover)}}">
                                                    <div class="price">{{$pr->price}}</div>
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
                                                    <a href="{{asset("single.html/$pr->id")}}">{{$pr->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')
