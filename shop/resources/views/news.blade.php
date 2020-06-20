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
                        <li>News</li>
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

                    <!-- <div class="shop-widget-bottom">

                        <aside class="widget widget-tag">
                            <h2 class="sidebar-title">POPULAR TAG</h2>
                            <ul class="tag-list">
                              @foreach($allTag as $tag)
                                <li>
                                    <a href="{{asset('/news')}}">
                                      {{ $tag->name }}
                                    </a>
                                </li>
                              @endforeach
                            </ul>
                        </aside>
                    </div> -->
                </div>
            </div>

            <div class="col-md-9 col-sm-9 col-xs-12">
              @foreach($allNews as $news)
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="">
                    <a href="{{asset("snew.html/$news->id")}}">
                      <img src="{{$news->cover}}" alt="error">
                    </a>
                  </div>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="">
                      <a href="{{asset("snew.html/$news->id")}}">
                        <h3>{{$news->title}}</h3>
                      </a>
                      <div class="">
                        <a href="{{asset("news.html/$news->category->name")}}">
                          <b>{{$news->category->name}}</b>
                        </a>
                        {{$news->created_at}}
                      </div>
                      <div class="">
                        {{$news->summary}}
                      </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
{{-- END NEW NEWS --}}

{{-- LATEST NEWS --}}

<div class="blog-area section-padding">
    <h2 class="section-title">LATEST BLOG</h2>
    <p>The Latest Blog post for the biggest Blog for the books Library.</p>
    <div class="container">
        <div class="row">
            <div class="blog-list indicator-style">
                @foreach ($allNews as $item)
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

@endsection('content')
