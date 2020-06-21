@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\Language::all()->count();
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @include('template.header',['link'=>"language_management/create",'title'=>'Language Management'])
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Language
                    </div>
                    <button class="btn btn-warning float-left" >All  <span class="badge badge-secondary">{{$countAll}}</span></button>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('language_management.process')}}">
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
                                        <th>Name</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp

                                    @foreach($lsLanguage as $lang)
                                    <tr>
                                        <td>{{$i}}</td>
                                        @php
                                        if (isset($search)){
                                        $lang->name =  Hightlight::show($search,$lang->name);
                                        }

                                        @endphp
                                        <td>{!!$lang->name!!}</td>
                                        <td>
                                            <a class="button" href="{{route('language_management.edit',$lang->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button></a>
                                            <form method="POST" action="{{ route('language_management.destroy', $lang->id) }}" onsubmit="confirm('Sure ?')">

                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                {{--                                                                                                   <input type="submit" value="Delete" />--}}
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
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
