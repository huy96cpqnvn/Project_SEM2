@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\News::all()->count();
$countActive = \App\News::select()->where('status','=',1)->get()->count();
$countInActive = $countAll- $countActive;
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @if(session()->has('success'))
        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        @endif
        @include('template.header',['link'=>'news_management/create','title'=>'News Management'])
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg News
                    </div>
                    <a class="btn btn-warning float-left"  href="{{route('news.status',2)}}">All  <span class="badge badge-secondary">{{$countAll}}</span></a>
                    <a class="btn btn-success float-left" href="{{route('news.status',1)}}">Active  <span class="badge badge-secondary">{{$countActive}}</span></a>
                    <a class="btn btn-danger float-left"  href="{{route('news.status',0)}}">InActive  <span class="badge badge-secondary">{{$countInActive}}</span></a>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('news_management.process')}}">
                            @csrf
                            {{--                            {{$countActive}}--}}
                            <input type="hidden" name="_method" value="put">
                            <div>
                                <label for="Search">Search:</label>
                                <input type="text" name="search" placeholder="Name">
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Summary</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($lsNews as $news)
                                    @php

                                    $status = '';
                                    if ($news->status == 0) {
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
                                        $news->title =  Hightlight::show($search,$news->title);
                                        }

                                        @endphp

                                        <td>{!!$news->title!!}</td>
                                        <td>{{$news->summary}}</td>
                                        <td>{{$news->category->name}}</td>
                                        <td>
                                            <form method="POST" action="{{route('news_management.change',$news->id)}}"
                                                  onsubmit="confirm('Bạn có chắc muốn  thay đổi Status  ? ')">
                                                @csrf
                                                <input type="submit" value="{{$status}}" class="btn btn-{{$class}}"/>
                                            </form>
                                        </td>
                                        <td class="center">
                                            <a href="{{route('news_management.edit',$news->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                                <form action="{{route('news_management.destroy',$news->id)}}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?');">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('news_management.destroy',$news->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

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





