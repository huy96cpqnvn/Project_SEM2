@extends('layouts.frontend')
@section('content')

<div class="online-banner-area _confirm">
  <div class="container">
      <div class="banner-title text-center">
          <h2>Đơn hàng của bạn đã được gửi đi Vui lòng thanh toán  khi nhận hàng</h2>
      </div>
      <div class="row">
          <div class="banner-list">
              <div class="col-md-12 col-sm-12">
                    <a href="{{route('order.user',\Illuminate\Support\Facades\Auth::user()['id'])}}"><button class="btn btn-primary pull-right" >Xem lịch sử mua hàng</button></a>
                    <a href="{{url('')}}"><button class="btn btn-primary pull-right" style="margin-right: 15px;">Mua tiếp</button></a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
