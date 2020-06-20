@extends('layouts.frontend')
@section('content')

<!-- Breadcrumbs Area Start -->
<!-- <div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2></h2>
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                        <li>{{$allNews->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Breadcrumbs Area Start -->
<!-- Single News Area Start -->
<div class="single-news-area section-padding">
    <div class="container">
         <div class="row">
            <div class="">
              <p><h2><b>{{$new->title}}</b></h2></p>
            </div>

            <div class="">
              {{$new->created_at}}
            </div>

            <div class="">
              <b>{{$new->summary}}</b>
            </div>

            <div class="">
              {{$new->content}}
            </div>
        </div>

    </div>
</div>


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
