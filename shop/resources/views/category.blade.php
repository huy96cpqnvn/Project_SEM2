@extends('layouts.frontend')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    @if(isset($curentProdut))
                        <h2>{{$curentProdut->name}}</h2>
                    @elseif(isset($curentCate))
                        <h2>{{$curentCate->name}}</h2>
                    @endif

                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                       <li>
                            {{$curentCate['name']}}
                        </li>
                           @if(isset($curentProdut))
                           <li>
                                {{$curentProdut->name}}
                            </li>
                           @endif

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
                                                    <option value="Nuôi Dạy Con"> Nuôi Dạy Con</option>
                                                    <option value="Nữ Công Gia Chánh">Nữ Công Gia Chánh</option>
                                                    <option value="Từ Điển">Từ Điển</option>
                                                    <option value="Giáo Trình">Giáo Trình</option>
                                                </select>

                                            </div>

                                            <div class="widget-buttom" style="margin-top: 20px ;text-align: center" >
                                                <button style="margin-top:17px;" class="btn btn-default" type="submit">Filter</button>
                                            </div>

                                        </form>
                                    </div>
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
                                @if(isset($flag) && $flag ==true)
                                <li class="shop-pagination">{{$data->appends(['price' => $price, 'category' => $category])->links()}}</li>
                                @else
                                    <li class="shop-pagination">{{$data->links()}}</li>
                                @endif
                            </ul>
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
                                                    <div class="price"><span>{{$pr->price}}</span></div>
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
