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
                        <li>Chi tiết đơn hàng</li>
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
                                 <th class="product-edit">STT</th>
                                <th class="product-image">Ảnh</th>
                                <th class="t-product-name">Tên sản phẩm</th>
                                <th class="product-unit-price">Review</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 ; @endphp
                            @foreach($datas as $data)
                                @foreach ($data as $row)
                                    <tr>
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
                                                <span>{!!$row->review!!}</span>
                                        </td>
                                        <td class="product-quantity product-cart-details">
                                            <span>{!! $row->orderAmount!!}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <p>{!! number_format($row->price) !!} Vnđ</p>
                                        </td>
                                        <td> @if($orderStatus == 'Chưa xác nhận')
                                            <a href="{{url('user/donhang/detail/'.$row->id)}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
                                            @endif</td>
                                    </tr>
                                @endforeach
                                
                                @php $i++ ; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>	
                <div class="shopingcart-bottom-area col-md-12 col-lg-12">
                    <div style="float: left">
                        <a  href="{{route('order.user',\Illuminate\Support\Facades\Auth::user()['id'])}}" class="btn btn-info" >Quay Về </a>

                    </div>
                </div>	                
            </div>
        </div>
    </div>
</div>


@endsection('content')