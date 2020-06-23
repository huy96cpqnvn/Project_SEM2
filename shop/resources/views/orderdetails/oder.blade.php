@extends('layouts.backend')
@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="panel-title">
      <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span>
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> Đặt hàng</a>
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">{!!$slug!!}</a>
    </h3>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success">
            <div class="panel-body">
            <legend class="text-left">Xác nhận thông tin đơn hàng</legend>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>SL</th>
                      <th>Giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $row)
                    <tr>
                      <td>{!!$row->id!!}</td>
                      <td><img src="{{asset($row->options['img'])}}" alt="dell" width="80" height="50"></td>
                      <td>{!!$row->name!!}</td>
                      <td class="text-center">
                          <span>{!!$row->qty!!}</span>
                      </td>
                      <td>{!!$row->price!!} Vnd</td>
                      <td>{!!$row->qty * $row->price!!} Vnd</td>
                    </tr>

                  @endforeach
                    <tr>
                      <td colspan="3"><strong>Tổng cộng :</strong> </td>
                      <td>{!!Cart::count()!!}</td>
                      <td colspan="2" style="color:red;">{!!Cart::subtotal();!!} Vnd</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              {{-- form thong tin khach hang dat hang           --}}

              @if ($_GET['paymethod'] =='cod' )
              <form action="{{route('order.confirm')}}" method="get" role="form">
                <legend class="text-left">Xác nhận thông tin khách hàng :</legend>
               @csrf
                  <input type="hidden" name="_method" value="put" />
                <div class="form-group">
                  <label for="">
                    - Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
                    - Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
                    - Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
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
                    - Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
                    - Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
                    - Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
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
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
      <!-- panel inffo 1 -->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Sản phẩm tương tự</h3>
        </div>
        <div class="panel-body no-padding">
        <?php
          $books = DB::table('products')
              ->join('categories', 'products.category_id', '=', 'categories.id')
              ->join('product_details', 'product_details.product_id', '=', 'products.id')
//              ->where('products.category_id','=','categories.id')
              ->select('products.*','product_details.*')
              ->orderBy('products.created_at', 'desc')
              ->get();


            ?>
        @foreach($books as $row)
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <div class="thumbnail mobile">
              <div class="bt">
                <div class="image-m pull-left">
{{--                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">--}}
                  <img class="img-responsive" src="{{asset($row->cover)}}" alt="{!!$row->name!!}">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>

                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="#" title="Chi tiết">
                  <span class="label label-info">Ưu đãi khi mua</span>


                <span class="btn label-warning"><strong>{!!number_format($row->price)!!}</strong>Vnd </span>
                <a href="{{route('add.cart',['id'=>$row->id])}}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
        @endforeach

        </div>
      </div>



     <!-- fan pages myweb -->
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Fans Pages</h3>
      </div>
      <div class="panel-body">
        Hãy <a href="#" title="">Like</a> facebook của Chúng tôi để cập nhật tin mới nhất
      </div>
    </div> <!-- /fan pages myweb -->
  </div>
</div>
<!-- ===================================================================================/news ============================== -->
@endsection
