@extends('layouts.backend')
@section('content')

  <div><h2 style="color: red ;text-align: center">Đơn hàng của bạn đã được gửi đi <br>
            Vui lòng thanh toán  khi nhận hàng
      </h2></div>
    <div style="margin-left: 30px"><a href="{{url('order')}}"><button >Xem lịch sử mua hàng</button></a></div>
    <div style="margin-left: 30px"><a href="{{url('')}}"><button >Mua tiếp</button></a></div>
@endsection
