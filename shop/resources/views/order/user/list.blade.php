@extends('layouts.frontend')
@section('content')
    @php
        use Illuminate\Support\Facades\Auth as Auth;
    @endphp
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active"><h1 style="text-align: center;color: red">Đơn đặt hàng</h1></li>
            </ol>
        </div><!--/.row-->
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
                                        <td>


{{--                                                <span style="color:#d35400;">Chưa xác nhận</span>--}}

                                        </td>


{{--                                            <a href="{{url('admin/donhang/detail/'}}" title="Chi tiết">Chi tiết  </a> &nbsp;--}}
{{--                                            <a href="{{url('admin/donhang/delorder/'}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>--}}

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

                                    <tr>
                                    <td>{{$i}}</td>
                                    <td> {{$status}}</td>
                                    <td> {{$order['totalprice']}}</td>
                                    <td> {{$order['created_at']}}</td>
                                    <td> {{$order['paymentMethod']}}</td>
                                    <td>
                                        <a href="{{url('order/user/detail/'.$order['id'].'/'.Auth::user()['id'].'/'.$status)}}" title="Chi tiết">Chi tiết  </a> &nbsp;
                                        @if($order['status'] ==0)
                                        <a href=""  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
                                        @endif
                                    </td>

                                </tr>
                                    <?php $i++ ?>
                                @endforeach

                                </tbody>
                            </table>
                            </div>
                        </div>
{{--                        {!! $data->render() !!}--}}
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection
