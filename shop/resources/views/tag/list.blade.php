@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\Tag::all()->count();
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @if(session()->has('success'))
        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        @endif
        @include('template.header',['link'=>"tag_management/create",'title'=>'Tags Management'])
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Tag
                    </div>
                    <button class="btn btn-warning float-left"  ">All  <span class="badge badge-secondary">{{$countAll}}</span></button>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('tag_management.process')}}">
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
                                    @foreach($lsTag as $tag)
                                    <tr class="odd gradeX">
                                        <td>{{$tag->id}}</td>
                                        @php
                                        if (isset($search)){
                                        $tag->name =  Hightlight::show($search,$tag->name);
                                        }

                                        @endphp
                                        <td>{!!$tag->name!!}</td>
                                        <td>{{$tag->created_at}}</td>


                                        <td class="center">
                                            <a href="{{route('tag_management.edit',$tag->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                                <form action="{{route('tag_management.destroy',$tag->id)}}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?');">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('tag_management.destroy',$tag->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

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



