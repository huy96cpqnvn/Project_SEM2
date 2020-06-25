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
                        <li>Shopping Cart</li>
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
            @if (count($errors) > 0)
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
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-table-area table-responsive">
                    <table class="check_out_order">
                        <thead>
                            <tr>

                                <th class="product-remove">Xóa</th>
                                <th class="product-edit">STT</th>
                                <th class="product-image">Ảnh</th>
                                <th class="t-product-name">Tên sản phẩm</th>
                                <th class="product-unit-price">Giá</th>
                                <th class="product-quantity">SL</th>
                                <th class="product-subtotal">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 ; @endphp
                            @foreach(Cart::content() as  $key => $row)
                                <tr>
                                    <td class="product-remove">
                                        <form method="post" action="{{route('order_detail.destroy',$row->id)}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button class="fa fa-remove"><i class="flaticon-delete"></i></button>
                                            
                                        </form>
                                    </td>
                                    <td class="product-edit">
                                        <span>
                                            {{$i}}
                                        </span>
                                    </td>

                                    <td class="product-image">
                                        <img src="{{asset($row->options['img'])}}" alt="{{$row->name}}" width="80" height="50">
                                    </td>
                                    <td class="t-product-name">
                                        <span>
                                            {!!$row->name!!}
                                        </span>
                                    </td>
                                    <td class="product-unit-price">
                                            <span>{!! number_format($row->price) !!} Vnd</span>
                                    </td>
                                    <td class="product-quantity product-cart-details">
                                        <p>@if (($row->qty) >1)
                                            <a href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a>
                                        @else
                                            <a href="#"><span class="glyphicon glyphicon-minus"></span></a>
                                        @endif

                                            <form action="{!!url('order/update/'.$row->rowId.'/'.$row->qty.'-up')!!}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="put" />
                                                <button class="glyphicon glyphicon-plus-sign" >+</button>
                                            </form>
                                            <input type="text" class="qty text-center" value=" {!!$row->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" readonly="readonly">
                                            <form action="{!!url('order/update/'.$row->rowId.'/'.$row->qty.'-down')!!}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="put" />
                                                <button class="glyphicon glyphicon-plus-sign" >-</button>
                                            </form>
                                        </p>
                                    </td>
                                    <td class="product-quantity">
                                        <p>{!! number_format($row->qty * $row->price) !!} Vnd</p>
                                    </td>
                                </tr>
                                @php $i++ ; @endphp
                            @endforeach
                            <tr>
                                <td colspan="5" class="product-unit-price">Tổng Cộng: </td>
                                <td class="product-unit-price">{!!Cart::count()!!}</td>
                                <td class="product-unit-price">{!!Cart::subtotal()!!} Vnd</td>
                            </tr>
                            </tbody>
                    </table>
                </div>	
                <div class="shopingcart-bottom-area col-md-12 col-lg-12">
                    @php
                    use Illuminate\Support\Facades\Auth as Auth;
                    @endphp
                    @if(Cart::count() !=0)
                        @if (Auth::guest())
                            <div class="input-group">
                                <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                                    <option value="cod">COD (thanh toán khi nhận hàng)</option>
                                    <option value="paypal">Paypal (Thanh toán qua Paypal)</option>
                                </select>
                            </div>
                            <a class="btn btn-large btn-warning pull-left" href="{!!url('/login')!!}" >Tiến hàng thanh toán</a>
                        @else
                            <form action="{{route('getoder.get')}}" method="get" accept-charset="utf-8">
                                <div class="input-group">
                                    <label for="paymethod">Chọn phương thức thanh toán</label>
                                    <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                                        <option value="">Hãy chọn phương thức thanh toán</option>
                                        <option value="paypal">Thanh toán trực tuyến ( VNPAY  )</option>
                                        <option value="cod"> Thanh toán khi nhận hàng ( COD )</option>
                                    </select>
                                </div>
                                <hr>
                                <a href="{!!url('/')!!}" type="button" class="btn btn-large btn-primary pull-right">Tiếp tục mua hàng</a>
                                <button type="submit" class="btn btn-danger pull-left">Tiến hành thanh toán</button>
                                </form>
                        @endif
                    @endif
                </div>	                
            </div>
        </div>
    </div>
</div>
    <!-- Cart Area End -->

    <!-- ===================================================================================/news ============================== -->
@endsection
