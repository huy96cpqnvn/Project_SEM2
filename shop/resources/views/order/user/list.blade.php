@extends('layouts.backend')
@section('content')
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
                <div class="panel-heading">
                    Danh sách đơn đặt hàng
                </div>
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date Of Shipment</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 0;
use Illuminate\Support\Facades\Auth;
                                @endphp

                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{Auth::user()['name']}}</td>
                                        <td>{{Auth::user()['address']}}</td>
                                        <td>{{Auth::user()['phone']}}</td>
                                        <td>{{Auth::user()['email']}}</td>
                                        <td>{{Auth::user()['created_at']}}</td>
                                        <td>{{Auth::user()['totalprice']}} Vnd</td>

                                        <td>
                                            @php
                                    dd();
                                    @endphp
                                                <span style="color:#d35400;">Chưa xác nhận</span>

                                        </td>
                                        <td>note</td>

                                        <td>
                                            <a href="{!!url('admin/donhang/detail/'.$row->id)!!}" title="Chi tiết">Chi tiết  </a> &nbsp;
                                            <a href="{!!url('admin/donhang/delorder/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp

                                </tbody>
                            </table>
                        </div>
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection
