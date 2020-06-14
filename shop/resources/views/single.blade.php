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
                    <p>{{$prodetail->detail}}</p>
                    <div class="single-product-price">
                        <h2>{{$prodetail->price}} Đ</h2>
                    </div>
                    <div class="product-attributes clearfix">
                        <span class="pull-left" id="quantity-wanted-p">
                            {{-- @foreach(Cart::content() as $row)
                            <span>{!!$row->qty!!}</span>
                            @endforeach --}}
                        </span>
                        <span>
                            <a class="cart-btn btn-default" href="{{route('add.cart',['id'=>$prodetail->id])}}">
                                <i class="flaticon-shop"></i>
                                Add to cart
                            </a>
                        </span>
                    </div>
                    <div class="add-to-wishlist">
                        <a class="wish-btn" href="cart.html">
                            <i class="fa fa-heart-o"></i>
                            ADD TO WISHLIST
                        </a>
                    </div>
                    <div class="single-product-categories">
                        <label>Categories:</label>
                        <span>e-book, biological, business</span>
                    </div>
                    <div class="social-share">
                        <label>Share: </label>
                        <ul class="social-share-icon">
                            <li><a href="#"><i class="flaticon-social"></i></a></li>
                            <li><a href="#"><i class="flaticon-social-1"></i></a></li>
                            <li><a href="#"><i class="flaticon-social-2"></i></a></li>
                        </ul> 
                    </div>
                    <div id="product-comments-block-extra">
                        <ul class="comments-advices">
                            <li>
                                <a href="#" class="open-comment-form">Write a review</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="p-details-tab-content">
                    <div class="p-details-tab">
                        <ul class="p-details-nav-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">Description</a></li>
                            <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Review</a></li>
                            <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Tab</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content review">
                        <div role="tabpanel" class="tab-pane active" id="more-info">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="data">
                            <table class="table-data-sheet">
                                <tbody>
                                    <tr class="odd">
                                        <td>Compositions</td>
                                        <td>Cotton</td>
                                    </tr>
                                    <tr class="even">
                                        <td>Styles</td>
                                        <td>Casual</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Properties</td>
                                        <td>Short Sleeve</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            <div id="product-comments-block-tab">
                                <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection('content')