@extends('layouts.backend')

  @section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
          use App\User;
          $countAll = User::all()->count();
          $countActive = User::select()->where('status','=',1)->get()->count();
          $countInActive = $countAll- $countActive;
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <div class="float-right"><a class="btn btn-primary float-right" href="{{route('user_management.add')}}">Thêm Mới</a>
                </div>
                <h4 class="header-line">Manage Reg Users</h4>
            </div>


        </div>
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Users
                    </div>
                    <a class="btn btn-warning float-left"  href="{{route('user_management.status',2)}}">All  <span class="badge badge-secondary">{{$countAll}}</span></a>
                    <a class="btn btn-success float-left" href="{{route('user_management.status',1)}}">Active  <span class="badge badge-secondary">{{$countActive}}</span></a>
                    <a class="btn btn-danger float-left"  href="{{route('user_management.status',0)}}">InActive  <span class="badge badge-secondary">{{$countInActive}}</span></a>
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
                                    <th>User Name</th>
                                    <th>Email id </th>
                                    <th>Mobile Number</th>
                                    <th>Adress </th>
                                    <th>Created_at </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @php

                                        $status = '';
                                        if ($user->status == 0) {
                                             $status = 'Inactive' ;
                                             $class = 'danger';
                                        }else{
                                        $status = 'Active';
                                        $class = 'success';
                                        }

                                    @endphp
                                <tr class="odd gradeX">
                                    <td class="center">{{$user->id}}</td>
                                    <td class="center">{{$user->name}}</td>
                                    <td class="center">{{$user->email}}</td>
                                    <td class="center">{{$user->phone}}</td>
                                    <td class="center">{{$user->address}}</td>
                                    <td class="center">{{$user->created_at}}</td>
                                    <td><a href="" class="btn btn-xs  btn-<?php echo $class?>"><?php echo $status ?></a></td>
                                    <td class="center">
                                         <a href="{{route('user_management.edit',$user->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                             <form action="{{route('user_management.destroy',$user->id)}}" method="POST"
                                             onsubmit="return confirm('Are you sure you want to delete?');">
                                                 @csrf
                                                 @method('delete')
                                                 <a href="{{route('user_management.edit',$user->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

{{--                                                     <input type="submit" value="Delete" class="btn btn-danger "><i class="fas fa-trash-alt"></i></input>--}}
                                             </form>
                                    </td>
                                </tr>
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

<!-- CONTENT-WRAPPER SECTION END-->
<!-- --><?php //include('includes/footer.php');?>
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY  -->
  @endsection
