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
                                        <th>Trạng thái</th>
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
                                               {{$row->status}}
                                            </td>
                                            <td>
{{--                                                <a href="{!!url('admin/donhang/deldetail/'.$row->id,$oder['status'])!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>--}}
                                                <a href=""  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
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
                        <button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>

                        <div style="float: left">
                            <a  href="{{asset('order')}}" class="btn btn-dark" >Quay Về </a>

                        </div>

                </form>


                    <form action="" method="get">
                        @csrf
                        {{-- <select name="selectStatus" id="" class="dropdown" >
                            <option value="3">Đang Chuyển Hàng</option>
                            <option value="4">Đã Thanh Toán</option>
                            <option value="5">Bị Từ Chối</option>

                        </select> --}}
                        <button type="submit" class="btn btn-secondary" value="3" name="selectStatus">Đang Chuyển Hàng</button>
                        <button type="submit" class="btn btn-success" value="4" name="selectStatus">Đã Thanh Toán</button>
                        <button type="submit" class="btn btn-danger" value="5" name="selectStatus">Bị Từ Chối</button>
                    </form>



            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
    <!-- =====================================main content - noi dung chinh trong chu -->
@endsection
