@extends('layouts.backend')

@section('content')
    <!------MENU SECTION START-->
    <?php //include('includes/header.php');?>
    @php
        $countAll = \App\ProductDetail::all()->count();
        $countActive = \App\ProductDetail::select()->where('status','=',1)->get()->count();
        $countInActive = $countAll- $countActive;
    @endphp
    <div class="content-wrapper" style="padding-top: 50px">
        <div class="container">
            @if(session()->has('success'))
                <div class="flash-message">
                    <p class="alert alert-success">{{Session::get('success')}}</p>
                </div>
            @endif
            @include('template.header',['link'=>'proDetail_management/create','title'=>'ProductDetail Management'])
            <div class="row" style="padding-top: 15px">
                <div class="col-md-12">
                    <!-- Advanced Tables -->

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Reg Users
                        </div>
                        <a class="btn btn-warning float-left"  href="{{route('producdetail.status',2)}}">All  <span class="badge badge-secondary">{{$countAll}}</span></a>
                        <a class="btn btn-success float-left" href="{{route('producdetail.status',1)}}">Active  <span class="badge badge-secondary">{{$countActive}}</span></a>
                        <a class="btn btn-danger float-left"  href="{{route('producdetail.status',0)}}">InActive  <span class="badge badge-secondary">{{$countInActive}}</span></a>
                        <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                            <form method="get" action="{{route('admin_userController.process')}}">
                                @csrf
                                {{--                            {{$countActive}}--}}
                                <input type="hidden" name="_method" value="put">
                                <div>
                                    <label for="Search">Search:</label>
                                    <input type="text" name="search">
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Review  </th>
                                        <th>Product </th>
                                        <th>Author </th>
                                        <th>Languge </th>
                                        <th>Publisher</th>
                                        <th>Discount</th>
                                        <th>Type</th>
                                        <th>Satus</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($lsProductDetail as $prd)
                                        @php

                                            $status = '';
                                            if ($prd->status == 0) {
                                                 $status = 'Inactive' ;
                                                 $class = 'danger';
                                            }else{
                                            $status = 'Active';
                                            $class = 'success';
                                            }

                                        @endphp
                                        <tr class="odd gradeX">
                                            <td>{{$prd->id}}</td>
                                            <td>{{$prd->name}}</td>
                                            <td>{{$prd->review}}</td>
                                            <td>{{$prd->product['name']}}</td>
                                            <td>{{$prd->author['name']}}</td>
                                            <td>{{$prd->language['name']}}</td>
                                            <td>{{$prd->publisher['name']}}</td>
                                            <td>{{$prd->discount['discount']}}</td>
                                            <td>
                                            <span id="type_{{$prd->id}}">
                                                {{$prd->type == 1 ? 'Hàng mới về' : 'Hàng sẵn có'}}
                                            </span>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('proDetail_management.change',$prd->id)}}"
                                                      onsubmit="confirm('Bạn có chắc muốn  thay đổi Status  ? ')">
                                                    @csrf
                                                    <input type="submit" value="{{$status}}" class="btn btn-{{$class}}"/>
                                                </form>
                                            </td>
                                            <td class="center">
                                                <a href="{{route('proDetail_management.edit',$prd->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                                    <form action="{{route('proDetail_management.destroy',$prd->id)}}" method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete?');">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('proDetail_management.destroy',$prd->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

                                                        {{--                                                     <input type="submit" value="Delete" class="btn btn-danger "><i class="fas fa-trash-alt"></i></input>--}}
                                                    </form>
                                            </td>
                                            <td><a href="{{route('add.cart',['id'=>$prd->id])}}"><span class="input-group-text" id="inputGroup-sizing-lg">
                        <i class="mdi mdi-cart-plus"></i>
                    </span></a></td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>



        </div>
    </div>

    <!-- CORE JQUERY  -->
@endsection
