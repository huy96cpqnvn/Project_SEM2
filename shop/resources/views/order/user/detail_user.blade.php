@php
    use App\Order;
@endphp
@extends('layouts.frontend')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Chi tiết đơn hàng </li>

            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">

                <form action="" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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




                        <div class="panel-body" style="font-size: 12px;">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Review</th>
                                        <th>Số lượng </th>
                                        <th>Giá bán</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($datas as $data)
                                    @foreach($data as $row)
                                        <tr>

                                                <td>{{$i}}</td>
                                            <td> <img  src="{{asset($row->cover)}}"  alt="iphone" width="50" height="40"></td>
                                            <td>{!!$row->name!!}</td>
                                            <td>{!!$row->review!!}</td>
                                            <td>{!! $row->orderAmount!!} </td>
                                            <td>{!! number_format($row->price) !!} Vnđ</td>
                                            <td>
{{--                                                <a href="{!!url('admin/donhang/deldetail/'.$row->id,$oder['status'])!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>--}}
                                                @if($orderStatus == 'Chưa xác nhận')
                                                <a href="{{url('user/donhang/detail/'.$row->id)}}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $i++;

                                        @endphp


                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        <div style="float: left">
                            <a  href="{{URL::previous()}}" class="btn btn-info" >Quay Về </a>

                        </div>

                </form>






            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection
