@extends('layouts.backend')

@section('content')
    @include('template.error')
    <div class="container white">
        <div class="row">
            <div class="container white percent100">
                <div class="col-lg-12">
                    <div class="padder-t2">
                        <h1>Add User</h1>
                        <div class="horiz-divider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row padder-t padder-b">
            <div class="container white">
                <div class="col-lg-12">
                    <!-- Form -->
                    <form class="form-horizontal" action="{{route('user_management.store')}}" method="post" id="contact_form">
                        @csrf
                        <input type="hidden" name="_method" value="post">
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
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="lastname" name="name" placeholder="User Name" class="form-control" type="text">
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
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input id="email" name="email" placeholder="E-Mail Address" class="form-control" type="email" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <label class="control-label pull-right"><h4>PassWord</h4></label>
                                    </div>
                                    <div class="col-md-4 col-lg-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input id="" name="pass" placeholder="PassWord" class="form-control" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div> <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <label class="control-label pull-right"><h4>level</h4></label>
                                    </div>
                                    <div class="col-md-4 col-lg-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <select name="level" id="" class="form-control">
                                                <option value="User">User</option>
                                            </select>
{{--                                            <input id="" name="level" placeholder="PassWord" class="form-control" type="text" >--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <label class="control-label pull-right"><h4>Phone #</h4></label>
                                    </div>
                                    <div class="col-md-4 col-lg-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input id="phone" name="phone" placeholder="Phone" class="form-control" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <label class="control-label pull-right"><h4>Adress </h4></label>
                                    </div>
                                    <div class="col-md-4 col-lg-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-adress"></i></span>
                                            <input id="address" name="address" placeholder="Adress" class="form-control" type="text" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <label class="control-label pull-right"><h4>Status </h4></label>
                                    </div>
                                    <select class="custom-select" name="status" id="selectBox" onchange="changeFunction();">
                                        <option value="1" class="btn btn-success" >Active  </option>
                                        <option value="0" class="btn btn-success" >InActive</option>


                                    </select>
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
