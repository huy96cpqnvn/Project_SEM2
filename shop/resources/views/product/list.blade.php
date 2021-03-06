@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\Product::all()->count();
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @include('template.header',['link'=>"product_management/create",'title'=>'Product Management'])
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Product
                    </div>
                    <button class="btn btn-warning float-left"  >All  <span class="badge badge-secondary">{{$countAll}}</span></button>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('product_management.process')}}">
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
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Category </th>
                                        <th>Created at </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($lsProduct as $pro)

                                    <tr class="odd gradeX">
                                        <td>{{$i}}</td>

                                        @php
                                        if (isset($search)){
                                        $pro->name =  Hightlight::show($search,$pro->name);
                                        }

                                        @endphp

                                        <td>{!!$pro->name!!}</td>
                                        <td>{{$pro->category['name']}}</td>
                                        <td>{{$pro->created_at}}</td>
                                        <td class="center">
                                            <a href="{{route('product_management.edit',$pro->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                                <form action="{{route('product_management.destroy',$pro->id)}}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?');">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('product_management.destroy',$pro->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

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
