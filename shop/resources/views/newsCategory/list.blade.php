@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\NewsCategory::all()->count();
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @if(session()->has('success'))
        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        @endif
        @include('template.header',['link'=>"newscate_management/create",'title'=>'NewsCategory Management'])
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Category
                    </div>
                    <button class="btn btn-warning float-left"  ">All  <span class="badge badge-secondary">{{$countAll}}</span></button>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('newscate_management.process')}}">
                            @csrf
                            {{--{{$countActive}}--}}
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
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($lsCategory as $cate)
                                    <tr class="odd gradeX">
                                        <td>{{$i}}</td>
                                        @php
                                        if (isset($search)){
                                        $cate->name =  Hightlight::show($search,$cate->name);
                                        }

                                        @endphp
                                        <td>{!!$cate->name!!}</td>
                                        <td>{{$cate->created_at}}</td>


                                        <td class="center">
                                            <a href="{{route('newscate_management.edit',$cate->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                                <form action="{{route('newscate_management.destroy',$cate->id)}}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?');">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('newscate_management.destroy',$cate->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

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
{{--                {{$lsCategory->links()}}--}}
                <!--End Advanced Tables -->
            </div>
        </div>

    </div>
</div>

<!-- CORE JQUERY  -->
@endsection


