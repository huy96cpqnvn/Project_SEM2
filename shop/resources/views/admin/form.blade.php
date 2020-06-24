@extends('layouts.backend')

@section('content')
@include('template.error')
<div class="container white">
    <div class="row">
        <div class="container white percent100">
            <div class="col-lg-12">
                <div class="padder-t2">
                    <h1>Edit User</h1>
                    <div class="horiz-divider"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row padder-t padder-b">
        <div class="container white">
            <div class="col-lg-12">
                <!-- Form -->
                <form class="form-horizontal" action="{{route('user_management.update',$user->id)}}" method="post" id="contact_form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <fieldset>
                        <!-- Text input-->
                        <!-- Text input-->

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>User Name</h4></label>
                                </div>
                                <div class="col-md-4 col-lg-4 inputGroupContainer">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-account"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="lastname" name="name" class="form-control" placeholder="Username" value="{{$user->name}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>E-Mail</h4></label>
                                </div>
                                <div class="col-md-4 col-lg-4 inputGroupContainer">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-email"></i>
                                            </span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail Address" value="{{$user->email}}">
                                    </div>

                                </div>
                            </div>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4 col-lg-4">--}}
{{--                                    <label class="control-label pull-right"><h4>Password</h4></label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4 col-lg-4 inputGroupContainer">--}}

{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text">--}}
{{--                                                <i class="mdi mdi-shield-key"></i>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" id="pass" name="pass" class="form-control" placeholder="Password" value="{{$user->password}}">--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>Level</h4></label>
                                </div>
                                <div class="col-md-4 col-lg-4 inputGroupContainer">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-alpha-l-box"></i>
                                            </span>
                                        </div>

                                        <select name="level" id="" class="form-control">
                                            <option value="user">User</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>Phone </h4></label>
                                </div>
                                <div class="col-md-4 col-lg-4 inputGroupContainer">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{$user->phone}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>Address </h4></label>
                                </div>
                                <div class="col-md-4 col-lg-4 inputGroupContainer">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-home"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{$user->address}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>Status </h4></label>
                                </div>

                                <div class="col-md-4 col-lg-4 inputGroupContainer">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-alpha-s-box"></i>
                                            </span>
                                        </div>

                                        <select name="status" id="selectBox" class="form-control" onchange="changeFunction();">
                                            <option value="1"  >Active  </option>
                                            <option value="0"  >InActive</option>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label class="control-label pull-right"><h4>Avatar</h4></label>
                                </div>
                                <div class="col-md-4 col-lg-4 inputGroupContainer">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-google-photos"></i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" id="file" name="file" placeholder="Enter Image"/>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Text area -->

                        <!-- Success message -->
                        <!-- Button -->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 col-lg-4 control-label"></label>
                                <div class="col-md-4 col-lg-4">
                                    <button type="submit" class="btn btn-danger raised">Submit <i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
