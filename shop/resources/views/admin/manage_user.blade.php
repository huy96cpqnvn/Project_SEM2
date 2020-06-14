@extends('layouts.backend')

  @section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
          use App\Helpers\Hightlight;
          use App\User;

          $countAll = User::all()->count();
          $countActive = User::select()->where('status','=',1)->get()->count();
          $countInActive = $countAll- $countActive;

@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @include('template.header',['link'=>route('user_management.add'),'title'=>'Manage Reg Users'])
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
                                <input type="text" name="search" placeholder="email or name"/>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email id </th>
                                    <th>Mobile Number</th>
                                    <th>Adress </th>
                                    <th>Created_at </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $i = 1;

                                @endphp
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
                                    <td class="center">{{$i}}</td>
                                    @php
                                        $email = '';
                                        if (isset($search)){
                                        $email =  Hightlight::show($search,$user->email);
                                        $name =  Hightlight::show($search,$user->name);
                                      }


                                    @endphp
                                    <td class="center">{!! $name !!}</td>
                                    <td class="center">{!!$email!!}</td>
                                    <td class="center">{{$user->phone}}</td>
                                    <td class="center">{{$user->address}}</td>
                                    <td class="center">{{$user->created_at}}</td>
                                    <td>
                                        <form method="POST" action="{{route('user_management.change',$user->id)}}"
                                              onsubmit="confirm('Bạn có chắc muốn  thay đổi Status  ? ')">
                                            @csrf
                                            <input type="submit" value="{{$status}}" class="btn btn-{{$class}}"/>
                                        </form>
                                    </td>
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
