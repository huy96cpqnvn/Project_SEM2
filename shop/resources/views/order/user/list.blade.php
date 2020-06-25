@extends('layouts.frontend')
@section('content')
    {{-- @php
        use Illuminate\Support\Facades\Auth as Auth;
    @endphp

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active"><h1 style="text-align: center;color: red">Đơn đặt hàng</h1></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
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
                    <div class="panel-body" style="font-size: 13px;">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{Auth::user()['name']}}</td>
                                        <td>{{Auth::user()['address']}}</td>
                                        <td>{{Auth::user()['phone']}}</td>
                                        <td>{{Auth::user()['email']}}</td>
                                    </tr>


                                </tbody>
                            </table>
                            <div class="panel-heading">
                               Lịch sử đặt hàng
                            </div>
                            @php
                            $i = 1;
                            @endphp
                            <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                             <tr>
                                 <th>STT</th>
                                 <th>Trạng thái</th>
                                 <th>Tổng tiền</th>
                                 <th>Ngày đặt</th>
                                 <th>Phương thức thanh toán</th>
                                 <th>Thao tác</th>
                             </tr>
                            </thead>
                                <tbody>
                                @foreach($orders as $order)

                                   // <?php

                                     //if($order['status'] == 0 ){
                                        // $status = 'Chưa xác nhận';
                                    // }elseif($order['status'] == 1 ){
                                       //  $status = 'Đã xác nhận';

                                     //}elseif($order['status'] == 3 ){
                                    //     $status = 'Đang chuyển hàng';
                                   //  }elseif($order['status'] == 4 ){
                                   //      $status = 'Đã thanh toán ';

                                    // }else($order['status'] == 5){
                                   //     $status = 'Bị từ chối'
                                    // }
                                    //?>
                                        @if(count($order->OrderDetail) !=0)


                                    <tr>
                                    <td>{{$i}}</td>
                                    <td> {{$status}}</td>
                                    <td> {{$order['totalprice']}}</td>
                                    <td> {{$order['created_at']}}</td>
                                    <td> {{$order['paymentMethod']}}</td>
                                    <td>
                                        <a href="{{url('order/user/detail/'.$order['id'].'/'.Auth::user()['id'].'/'.$status)}}" title="Chi tiết">Chi tiết  </a> &nbsp;
                                        @if($order['status'] ==0)
                                        <a href="{{route('user.delorder',$order['id'])}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
                                        @endif
                                    </td>

                                </tr>
                                    <?php $i++ ?>
                                        @endif
                                @endforeach


                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    @php
    use Illuminate\Support\Facades\Auth as Auth;
@endphp
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Lịch sử mua hàng</h2>
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{asset('/')}}">Home</a>
                        </li>
                        <li>Lịch sử mua hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area Start -->
<!-- Shop Area Start -->
<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">Thông tin khách hàng</h2>
                            <ul class="sidebar-menu" style="padding: 0 5px">
                                <li>
                                    <p>Name : <b>{{Auth::user()['name']}}</b></p>
                                </li>
                                <li>
                                    <p>Address : <b>{{Auth::user()['address']}}</b></p>
                                </li>
                                <li>
                                    <p>Phone : <b>{{Auth::user()['phone']}}</b></p>
                                </li>
                                <li>
                                    <p>Email : <b>{{Auth::user()['email']}}</b></p>
                                </li>
                            </ul>
                        </aside>
                     </div>
                 </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="wishlist-right-area table-responsive">
                    <h3>Lịch sử đặt hàng</h3>
                    @php
                        $i = 1;
                    @endphp
                    <table class="wish-list-table">
                        <thead>
                            <tr>
                                <th class="t-product-name">STT</th>
                                <th class="product-details-comment">Trạng thái</th>
                                <th class="product-price-cart">Tổng tiền</th>
                                <th class="w-product-remove">Ngày đặt</th>
                                <th>Phương thức thanh toán</th>
                                <th>Chi tiết/Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <?php

                                    if($order['status'] == 0 ){
                                        $status = 'Chưa xác nhận';
                                    }elseif($order['status'] == 1 ){
                                        $status = 'Đã xác nhận';

                                    }elseif($order['status'] == 3 ){
                                        $status = 'Đang chuyển hàng';

                                    }elseif($order['status'] == 4 ){
                                        $status = 'Đã thanh toán ';

                                    }else($order['status'] == 5){
                                        $status = 'Bị từ chối'
                                    }
                                ?>
                                @if(count($order->OrderDetail) !=0)
                                <tr>
                                    <td class="product-image">
                                        <span>{{$i}}</span>
                                    </td>
                                    <td class="product-details">
                                        <span>{{$status}}</span>
                                    </td>
                                    <td class="product-cart">
                                        <span>{{$order['totalprice']}} đ</span>
                                    </td>
                                    <td class="product-remove">
                                        <span>{{$order['created_at']}}</span>
                                    </td>
                                    <td>
                                        <span>{{$order['paymentMethod']}}</span>
                                    </td>
                                    <td>
                                        <a href="{{url('order/user/detail/'.$order['id'].'/'.Auth::user()['id'].'/'.$status)}}" title="Chi tiết">Chi tiết  </a> &nbsp;
                                        @if($order['status'] ==0)
                                        <a href="{{route('user.delorder',$order['id'])}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
                                        @endif
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                @else
                                    <?php
                                    $order->delete();
                                    ?>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
