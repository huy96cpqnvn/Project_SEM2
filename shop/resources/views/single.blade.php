@extends('layouts.frontend')
@section('content')

<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h2>PRODUCT DETAILS</h2> 
                    <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                        <li>{{$prodetail->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Single Product Area Start -->
<div class="single-product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <div class="single-product-image-inner">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="one">
                            <a class="venobox" href="#" data-gall="gallery" title="">
                                <img src="{{asset($prodetail->cover)}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="single-product-details">
                    <h2>{{$prodetail->name}}</h2>
                    <p>{{$prodetail->review}}</p>
                    <p>
                        <b>Tác giả:</b> {{$prodetail->author->name}}
                    </p>
                    <p><b>Nhà sản xuất:</b> {{$prodetail->publisher->name}}</p>
                    <span class="sal">Sale : {{$prodetail->discount}}%</span>    
                    <div class="single-product-price">
                        <b>Giá : </b>
                        @if (isset($total))
                        <h2 class="first">{{$price = $total}} đ</h2>
                        @endif
                        <h2 class="last first">{{$prodetail->price}} đ</h2>

                    </div>
                    <div class="product-attributes clearfix">
                        <span>
                            <a class="cart-btn btn-default" href="{{route('add.cart',['id'=>$prodetail->id])}}">
                                <i class="flaticon-shop"></i>
                                Add to cart
                            </a>
                        </span>
                    </div>
                    <div class="single-product-categories">
                        <label>Categories:</label>
                        <span>{{$prodetail->product->name}}</span>
                    </div>
                </div>
            </div>
        </div>
        <section class="site-section py-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-details-tab-content">
                        <div class="p-details-tab">
                            <ul class="p-details-nav-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">Description</a></li>
                                <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Comment</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content review">
                            <div role="tabpanel" class="tab-pane active" id="more-info">
                                <p><?php echo $prodetail->detail; ?></p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="data">

                                <div class="pt-5">
                                    <h3 class="mb-5">{{$prodetail->comments()->count()}} Comments</h3>
                                </div>

                                <ul class="comment-list">
                                    @foreach($prodetail->comments as $comment)
                                    <li class="comment">
                                        <div class="comment-body">
                                            <h3>{{$comment->name}}</h3>
                                            <div class="meta">{{$comment->created_at}}</div>
                                            <div>
                                                {{$comment->content}}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="comment-form-wrap pt-5">
                                    <h3 class="mb-5">Leave a comment</h3>
                                    <form action="{{asset('detail_comment')}}" class="p-5 bg-light" method="POST">
                                        @csrf
                                        <input type="hidden" name="productDetails_id" value="{{$prodetail->id}}"/>
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Content</label>
                                            <textarea name="content" id="message" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Comment" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                
                

                            </div>
                        </div>

                    </div>
                </div>
            </div> 
        </section>
    </div>
</div>


<!-- Related Product Area Start -->
<div class="related-product-area">
    <h2 class="section-title">RELATED PRODUCTS</h2>
    <div class="container">
        <div class="row">
            <div class="related-product indicator-style">
                @foreach ($prorelate as $item)
                <div class="col-md-3">
                    <div class="single-banner">
                        <div class="product-wrapper">
                            <a href="{{asset("single.html/$item->id")}}" class="single-banner-image-wrapper">
                                <img alt="" src="{{asset("$item->cover")}}">
                                <div class="price"><span>{{$item->price}}</span> Đ</div>
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
                            <a href="{{asset("single.html/$item->id")}}">{{$item->name}}</a>
                        </div>
                    </div>
                </div> 
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Related Product Area End -->

@endsection('content')