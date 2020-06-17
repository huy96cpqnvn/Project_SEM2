@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\Message::all()->count();
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        <h4>Message Management</h4>
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Message
                    </div>
                    <button class="btn btn-warning float-left"  ">All  <span class="badge badge-secondary">{{$countAll}}</span></button>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('message_management.process')}}">
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
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Content</th>
                                        <th>Active </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($lsMessage as $mes)

                                    <tr class="odd gradeX">
                                        <td>{{$i}}</td>
                                        @php
                                        if (isset($search)){
                                        $mes->name =  Hightlight::show($search,$mes->name);
                                        $mes->email =  Hightlight::show($search,$mes->email);
                                        }

                                        @endphp
                                        <td>{!!$mes->name!!}</td>
                                        <td>{!!$mes->email!!}</td>
                                        <td>{{$mes->phone}}</td>
                                        <td>{{$mes->content}}</td>
                                        <td>
                                           
                                            <form method="POST" action="{{ route('mes_management.destroy', $mes->id) }}" onsubmit="confirm('Sure ?')">

                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
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
