@extends('layouts.frontend')
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
                                @php
use Illuminate\Support\Facades\Auth;
                                @endphp

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
                                Danh sách đơn đặt hàng
                            </div>
                            <a href="" title="Chi tiết">Chi tiết  </a> &nbsp;
                            <a href=""  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
                        </div>
{{--                        {!! $data->render() !!}--}}
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection
