@extends('layouts.backend')

@section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
@php
use App\Helpers\Hightlight;
$countAll = \App\Subscribe::all()->count();
@endphp
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        @if(session()->has('success'))
        <div class="flash-message">
            <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        @endif
        @include('template.header',['link'=>"mail_management/create",'title'=>'Mail Management'])
        <div class="row" style="padding-top: 15px">
            <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel panel-default">

                    <div class="panel-heading">
                        Reg Mail
                    </div>
                    <button class="btn btn-warning float-left"  ">All  <span class="badge badge-secondary">{{$countAll}}</span></button>
                    <div class="float-right" style="padding-top: 15px ;padding-bottom: 15px" >
                        <form method="get" action="{{route('mail_management.process')}}">
                            @csrf
                            {{--{{$countActive}}--}}
                            <input type="hidden" name="_method" value="put">
                            <div>
                                <label for="Search">Search:</label>
                                <input type="text" name="search" placeholder="Email">
                            </div>
                        </form>
                    </div>


                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mail</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($lsMail as $mail)
                                    <tr class="odd gradeX">
                                        <td>{{$i}}</td>
                                        @php
                                        if (isset($search)){
                                        $mail->email =  Hightlight::show($search,$mail->email);
                                        }

                                        @endphp
                                        <td>{!!$mail->email!!}</td>
                                        <td>{{$mail->created_at}}</td>


                                        <td class="center">
                                            <a href="{{route('mail_management.edit',$mail->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                                <form action="{{route('mail_management.destroy',$mail->id)}}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete?');">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('mail_management.destroy',$mail->id)}}"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>

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





