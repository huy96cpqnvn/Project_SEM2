@extends('layouts.frontend')
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>
                       @if ($curentNewcate)
                                {{$curentNewcate->name}}
                        
                        @endif
                    </h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                        <li>
                            @if ($curentNewcate)
                                {{$curentNewcate->name}}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- NEW NEWS --}}
<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">NEWS CATEGORY</h2>
                            <ul class="sidebar-menu">
                              @foreach($allNewsCategory as $newsCate)
                              <li>
                                  <a href="{{asset("news.html/$newsCate->id", false)}}">
                                     <i class="fa fa-angle-double-right"></i>
                                      {{ $newsCate->name }}
                                  </a>
                              </li>
                              @endforeach

                            </ul>
                        </aside>

                    </div>
                </div>
            </div>

            {{-- <div class="col-md-9 col-sm-9 col-xs-12">
                @foreach($allNews as $news)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="">
                        <a href="{{asset("snew.html/$news->id")}}">
                        <img src="{{asset($news->cover)}}" alt="error">
                        </a>
                    </div>
                    <div class="">
                        <h3>{{$news->title}}</h3>
                        <a href="{{asset("news.html/$news->category->name")}}">
                            <b>{{$news->category->name}}</b>
                        </a>
                        
                    </div>
                    </div>
                @endforeach
            </div> --}}




            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-tab-area">
                    <div class="shop-tab-list">
                        <div class="shop-tab-pill pull-right">
                            <ul>
                                <li class="shop-pagination">{{$data->links()}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="row tab-pane fade in active" id="home">
                            <div class="shop-single-product-area">
                                 @foreach ($data as $news)
                                    <div class="col-md-4 col-lg-4 hidden-sm">
                                        <div class="single-banner">
                                            <div class="product-wrapper">
                                                <a href="{{asset("snew.html/$news->id")}}" class="single-banner-image-wrapper">
                                                    <img alt="" src="{{asset($news->cover)}}">
                                                </a>
                                            </div>
                                            <div class="banner-bottom text-center">
                                                <div class="banner-bottom-title">
                                                    <a href="{{asset("snew.html/$news->id")}}">{{$news->title}}</a>
                                                    <p>{{$news->created_at}}</p>
                                                    <p>{{$news->summary}}</p>
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
</div>
{{-- END NEW NEWS --}}

@endsection('content')
