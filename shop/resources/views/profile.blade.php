@extends('layouts.backend')

@section('content')

        <div class="bg-white border rounded">

            <div class="container">
                <div class="row my-2">
                    <div class="col-lg-8 order-lg-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                            </li>
                        </ul>
                        <div class="tab-content py-4">
                            <div class="tab-pane active" id="profile">
                                <h4 class="mb-3 text-dark">User Profile</h4>
                                <div class="row">
                                    <div class="col-md-6 text-dark">
                                        <h5 class="text-primary font-weight-medium pt-4 mb-2">Name</h5>
                                        <p><span class="mdi mdi-account"></span> {{ Auth::user()['name']}}</p>

                                        <h5 class="text-primary font-weight-medium pt-4 mb-2">Email</h5>
                                        <p><span class="mdi mdi-email"></span> {{ Auth::user()['email']}}</p>

                                        <h5 class="text-primary font-weight-medium pt-4 mb-2">Phone</h5>
                                        <p><span class="mdi mdi-phone"></span> {{ Auth::user()['phone']}}</p>

                                        <h5 class="text-primary font-weight-medium pt-4 mb-2">Address</h5>
                                        <p><span class="mdi mdi-home"></span> {{ Auth::user()['address']}}</p>

                                    </div>

                                </div>
                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="edit">

                                @php
                                use App\User;
                                $user = auth()->user();
                                @endphp


                                <form class="form-horizontal" action="{{route('profile.update',$user->id)}}" method="post" id="contact_form" enctype="multipart/form-data">
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
                                                <div class="col-md-4 col-lg-8 inputGroupContainer">
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
                                                <div class="col-md-4 col-lg-8 inputGroupContainer">

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

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <label class="control-label pull-right"><h4>Phone </h4></label>
                                                </div>
                                                <div class="col-md-4 col-lg-8 inputGroupContainer">

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
                                                <div class="col-md-4 col-lg-8 inputGroupContainer">

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
                                    <label class="control-label pull-right"><h4>Avatar</h4></label>
                                </div>
                                <div class="col-md-4 col-lg-8 inputGroupContainer">

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
                    <div class="col-lg-4 order-lg-1 text-center">
                        <img src="{{ Auth::user()['cover']}}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                        <h6 class="mt-2 text-dark">{{ Auth::user()['name']}}</h6>
                    </div>
                </div>
            </div>


        </div>




@endsection
