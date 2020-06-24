@extends('layouts.frontend')
@section('content')

<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>SHOPPING CART</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                        <li>Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Cart Area Start -->
<div class="shopping-cart-area section-padding">
    <div class="container">
            {{-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (Session()->has('flash_level'))
            <div class="alert alert-success">
                <ul>
                    {!! Session::get('flash_massage') !!}
                </ul>
            </div>
        @endif --}}
        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-table-area table-responsive">
                    <table class="check_out_order">
                        <thead>
                            <tr>
                                <th class="product-edit">STT</th>
                                <th class="product-image">Ảnh</th>
                                <th class="t-product-name">Tên sản phẩm</th>
                                <th class="product-unit-price">Giá</th>
                                <th class="product-quantity">SL</th>
                                <th class="product-subtotal">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $row)
                                <tr>
                                    {{-- <td class="product-remove">
                                        <form method="post" action="{{route('order_detail.destroy',$row->id)}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button class="fa fa-remove"><i class="flaticon-delete"></i></button>
                                            
                                        </form>
                                    </td> --}}
                                    <td class="product-edit">
                                        <span>
                                            {!!$row->id!!}
                                        </span>
                                    </td>

                                    <td class="product-image">
                                        <img src="{{asset($row->options['img'])}}" alt="dell" width="80" height="50">
                                    </td>
                                    <td class="t-product-name">
                                        <span>
                                            {!!$row->name!!}
                                        </span>
                                    </td>
                                    <td class="product-unit-price">
                                            <span>{!!$row->price!!} Vnd</span>
                                    </td>
                                    <td class="product-quantity product-cart-details">
                                        <p>{!!$row->qty!!}</p>
                                    </td>
                                    <td class="product-quantity">
                                        <p>{!!$row->qty * $row->price!!} Vnd</p>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="product-unit-price">Tổng Cộng: </td>
                                <td class="product-unit-price">Số lượng: {!!Cart::count()!!}</td>
                                <td class="product-unit-price"s>Tổng tiền: {!!Cart::subtotal()!!} Vnd</td>
                            </tr>
                         </tbody>
                    </table>
                </div>	
                <div class="shopingcart-bottom-area col-md-12 col-lg-12">
                    @if ($_GET['paymethod'] =='cod' )
                    <form action="{{route('order.confirm')}}" method="get" role="form">
                      <h2 class="text-left">Xác nhận thông tin khách hàng :</h2>
                     @csrf
                        <input type="hidden" name="_method" value="put" />
                      <div class="form-group">
                        <label for="">
                            <p>Tên khách hàng : <strong>{{ Auth::user()->name }} </strong></p>
                            <p>Điện thoại: <strong> {{ Auth::user()->phone }}</strong></p>
                            <p>Địa chỉ: <strong> {{ Auth::user()->address }}</strong></p>
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="">Các ghi chú khác</label>
                        <textarea name="txtnote" id="inputtxtNote" class="form-control" rows="4" required="required">
                        </textarea>
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id}}"/>
                          <input type="hidden" name="totalPrice" value="{!!Cart::subtotal();!!}"/>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right"> Đặt hàng (COD)</button>
                    </form>
                    @else
                    <form action="https://sandbox.vnpayment.vn/tryitnow/Home/CreateOrder" method="Post" accept-charset="utf-8">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="">
                            <p>Tên khách hàng : <strong>{{ Auth::user()->name }} </strong></p>
                            <p>Điện thoại: <strong> {{ Auth::user()->phone }}</strong></p>
                            <p>Địa chỉ: <strong> {{ Auth::user()->address }}</strong></p>
                        </label>
                      </div>
                        <br>
                        {{\Gloudemans\Shoppingcart\Facades\Cart::destroy()}}
                      <button type="submit" class="btn btn-danger pull-left"> Thanh toán qua VNPAY  </button> &nbsp;
                    </form>
                    @endif
                </div>	                
            </div>
        </div>
    </div>
</div>


@endsection('content')