@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
use App\ProductDetail;
$countAll = \App\Comment::all()->count();
$countActive = \App\Comment::select()->where('status','=',1)->get()->count();
$countInActive = $countAll- $countActive;
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @if(session()->has('success'))
        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        @endif
        <h4>Comment Management</h4>
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Comment
                    </div>
                    <a class="btn btn-warning float-left"  href="{{route('comment.status',2)}}">All  <span class="badge badge-secondary">{{$countAll}}</span></a>
                    <a class="btn btn-success float-left" href="{{route('comment.status',1)}}">Active  <span class="badge badge-secondary">{{$countActive}}</span></a>
                    <a class="btn btn-danger float-left"  href="{{route('comment.status',0)}}">InActive  <span class="badge badge-secondary">{{$countInActive}}</span></a>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('comment_management.process')}}">
                            @csrf
                            {{--                            {{$countActive}}--}}
                            <input type="hidden" name="_method" value="put">
                            <div>
                                <label for="Search">Search:</label>
                                <input type="text" name="search" placeholder="Name or Email">
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Content</th>
                                        <th>ProductDetail_id</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($lsComment as $com)
                                    @php

                                    $status = '';
                                    if ($com->status == 0) {
                                    $status = 'Inactive' ;
                                    $class = 'danger';
                                    }else{
                                    $status = 'Active';
                                    $class = 'success';
                                    }

                                    @endphp
                                    <tr class="odd gradeX">
                                        <td>{{$i}}</td>

                                        @php
                                        if (isset($search)){
                                        $com->name =  Hightlight::show($search,$com->name);
                                        $com->email =  Hightlight::show($search,$com->email);
                                        }

                                        @endphp

                                        <td>{!!$com->name!!}</td>
                                        <td>{!!$com->email!!}</td>
                                        <td>{{$com->content}}</td>
                                        <td>{{$com->productDetails_id}}</td>
                                        <td>
                                            <form method="POST" action="{{route('comment_management.change',$com->id)}}"
                                                  onsubmit="confirm('Bạn có chắc muốn  thay đổi Status  ? ')">
                                                @csrf
                                                <input type="submit" value="{{$status}}" class="btn btn-{{$class}}"/>
                                            </form>
                                        </td>
                                        <td class="center">
                                                <form action="{{route('comment_management.destroy',$com->id)}}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?');">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('comment_management.destroy',$com->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

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





