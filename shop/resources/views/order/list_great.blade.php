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
                                @endphp
                                @foreach($data as $row)
                                    @if(count($row->OrderDetail) !=0)

                                        <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{!!$row->user['name']!!}</td>
                                        <td>{!!$row->user['address']!!}</td>
                                        <td>{!!$row->user['phone']!!}</td>
                                        <td>{!!$row->user['email']!!}</td>
                                        <td>{!!$row->created_at!!}</td>
                                        <td>{!!$row->totalprice!!} Vnd</td>
                                        <td>
                                            @if($row->status ==0)
                                                <span style="color:#d35400;">Chưa xác nhận</span>
                                            @elseif($row->status ==1)
                                                <span style="color:#27ae60;"> Đã xác nhận</span>
                                            @elseif($row->status ==3)
                                                <span style="color:#27ae60;"> Đang chuyển hàng</span>
                                            @elseif($row->status ==4)
                                                <span style="color:#27ae60;"> Đã thanh toán </span>
                                            @elseif($row->status ==5)
                                                <span style="color:#27ae60;">Bị từ chối</span>
                                            @endif
                                        </td>
                                        <td>{!!$row->note!!}</td>

                                        <td>
                                            <a href="{{url('admin/donhang/detail/'.$row->id)}}" title="Chi tiết">Chi tiết  </a> &nbsp;
                                            @if($row->status ==0)
                                            <a href="{!!url('admin/donhang/delorder/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
                                            @endif
                                        </td>
                                    </tr>

                                        @php
                                    $i++;
                                    @endphp
                                    @else
                                        <?php
                                        $row->delete();

                                        ?>
                                    @endif
                                @endforeach

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
