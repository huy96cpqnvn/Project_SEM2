@extends('layouts.frontend')
@section('content')

<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
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
</div>
<!-- Breadcrumbs Area Start -->
<!-- Single News Area Start -->
<div class="single-news-area section-padding">
    <div class="container">
         <div class="row">
            <div class="">
              <p><h2><b>{{$allNews->title}}</b></h2></p>
            </div>

            <div class="">
              {{$allNews->created_at}}
            </div>

            <div class="">
              <b>{{$allNews->summary}}</b>
            </div>

            <div class="">
              <?php echo $allNews->content; ?>
            </div>
        </div>

    </div>
</div>


{{-- LATEST NEWS --}}

<div class="blog-area section-padding">
    <h2 class="section-title">RELATED BLOG</h2>
    <p>The Related Blog post in the biggest Blog for the books Library.</p>
    <div class="container">
        <div class="row">
            <div class="blog-list indicator-style">
                @foreach ($newrelate as $item)
                <div class="col-md-3">
                    <div class="single-blog">
                        <a href="{{asset("snew.html/$item->id")}}">
                            <img src="{{asset($item->cover)}}" alt="">
                        </a>
                        <div class="blog-info text-center">
                            <a href="{{asset("snew.html/$item->id")}}">{{$item->title}}</a>
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
