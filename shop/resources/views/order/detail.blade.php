@php
    use App\Order;
@endphp
@extends('layouts.backend')
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
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>ID</th>
													<th>Họ-tên </th>
													<th>Địa chỉ</th>
													<th>Điện thoại</th>
													<th>Ngày đặt</th>
													<th>Tổng tiền</th>
													<th>Trạng thái đơn hàng</th>
												</tr>
											</thead>
											<tbody>
                                            @php
                                                use App\ProductDetail;if ($oder['status'] ==0){
                                                        $curentStatus ='Chưa xác nhận' ;
                                                        $class = 'warning';
                                                  }elseif ($oder['status'] ==1){
                                                        $curentStatus ='Đã xác nhận' ;
                                                        $class = 'info';
                                                  }elseif ($oder['status'] ==3){
                                                        $curentStatus ='Đang chuyển hàng ' ;
                                                        $class = 'secondary';
                                                  }elseif ($oder['status'] ==4){
                                                        $curentStatus ='Đã thanh toán ' ;
                                                        $class = 'success';

                                                  }elseif ($oder['status'] ==5){
                                                        $curentStatus ='Bị từ chối ' ;
                                                        $class = 'danger';
                                                  }
                                            @endphp

                                            @if( isset($data) && count($data) >0)
												<tr>
													<td>{!!$oder['id']!!}</td>
													<td>{!!$oder->user['name']!!}</td>
													<td>{!!$oder->user->address!!}</td>
													<td>{!!$oder->user->phone!!}</td>
													<td>{!!$oder->created_at!!}</td>
													<td>{!! number_format($oder->totalprice) !!} Vnđ</td>
                                                    <td>
                                                        <input type="button" class="btn btn-<?php echo$class ?>" value="{{$curentStatus}}"/>
                                                    </td>
												</tr>
											@else
											@php

												$order = Order::find($oder['id']);

											   $order->delete();
											@endphp
											@endif
											</tbody>
										</table>
									</div>
									<div style="float: center">

									</div>

								<div class="panel-body" style="font-size: 12px;">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>STT</th>
													<th>Hình ảnh</th>
													<th>Tên sản phẩm</th>
													<th>Review</th>
													<th> Số lượng </th>
													<th>Giá bán</th>
													<th>Trạng thái</th>
													<th>Thao tác</th>
												</tr>
											</thead>
											<tbody>
											@php
											$i = 0;
											@endphp
												@foreach($data as $row)

													<tr>
														<td>{{$i}}</td>
														<td> <img  src="{{asset($row->cover)}}"  alt="iphone" width="50" height="40"></td>
														<td>{!!$row->name!!}</td>
														<td>{!!$row->review!!}</td>
														<td>{!! $row->orderAmount!!} </td>
														<td>{!! number_format($row->price) !!} Vnđ</td>
														<td>
															@if($row->status ==1)
																<span style="color:blue;">Còn hàng</span>
															@else
																<span style="color:#27ae60;"> Tạm hết</span>
															@endif
														</td>
														<td>
															<a href="{!!url('admin/donhang/deldetail/'.$row->id,$oder['status'])!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">remove</span> </a>
														</td>
													</tr>
													@php
													$i++;

													@endphp

{{--												@if($oder['status'] ==4)--}}
{{--													@php--}}
{{--													$prodetai =  ProductDetail::find($row->id);--}}

{{--													if ( $prodetai != null){--}}
{{--													$prodetai['amount'] =  $prodetai['amount'] -   $row->orderAmount;--}}
{{--													$prodetai->save();--}}
{{--													}--}}
{{--													@endphp--}}
{{--												@endif--}}
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							@if($oder['status'] ==0)
							<button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>
							@else

							  <div style="float: left">
								  <a  href="{{asset('order')}}" class="btn btn-dark" >Quay Về </a>

							  </div>
							@endif
						</form>


				@if($oder['status'] !=0)
						<form action="{{route('changestatus.order',$oder['id'])}}" method="get">
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

				@endif

			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection
