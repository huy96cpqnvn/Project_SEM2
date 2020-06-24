@extends('layouts.frontend')
@section('content')

       <!-- Breadcrumbs Area Start -->
       <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                       <h2>My Account</h2> 
                       <ul class="breadcrumbs-list">
                            <li>
                                <a title="Return to Home" href="{{asset('/')}}">Home</a>
                            </li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- Breadcrumbs Area Start -->
    <!-- My Account Area Start -->
    <div class="my-account-area section-padding">
        <div class="container">
            <div class="section-title2">
                <h2>Procced to Checkout</h2>
                <p>Welcome to your account. Here you can manage all of your personal information and orders.</p>
            </div>
            <div class="row">
                <div class="addresses-lists">
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-building"></i>
                                           <span>Thông tin tài khoản</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                                <p class="form-row">
                                                    <span>Name</span>
                                                    <span class="mdi mdi-account"></span> {{ Auth::user()['name']}}
                                                </p>
                                                <p class="form-row">
                                                    <span>Email</span>
                                                    <span class="mdi mdi-email"></span> {{ Auth::user()['email']}}
                                                </p>
                                                <p class="form-row">
                                                    <span>Phone</span>
                                                    <span class="mdi mdi-phone"></span> {{ Auth::user()['phone']}}
                                                </p>
                                                <p class="form-row">
                                                    <span>Address</span>
                                                    <span class="mdi mdi-home"></span> {{ Auth::user()['address']}}
                                                </p>
                                        </div>											
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fa fa-list-ol"></i>
                                            <span>Thay đổi thông tin</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    @php
                                    use App\User;
                                    $user = auth()->user();
                                    @endphp
                                    <div class="panel-body">
                                        <div class="coupon-info">
                                            <div class="order-history">
                                                <form class="form-horizontal" action="{{route('profile.update',$user->id)}}" method="post" id="contact_form" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <fieldset>
                                                        <!-- Text input-->
                                                        <!-- Text input-->
                
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div>
                                                                    <label class="control-label pull-right"><h4>User Name</h4></label>
                                                                </div>
                                                                <div class="inputGroupContainer">
                                                                    <div class="input-group">
                                                                        <input type="text" id="lastname" name="name" class="form-control" placeholder="Username" value="{{$user->name}}">
                                                                    </div>
                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div>
                                                                    <label class="control-label pull-right"><h4>E-Mail</h4></label>
                                                                </div>
                                                                <div class="inputGroupContainer">
                
                                                                    <div class="input-group">

                                                                        <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail Address" value="{{$user->email}}">
                                                                    </div>
                
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div >
                                                                    <label class="control-label pull-right"><h4>Phone </h4></label>
                                                                </div>
                                                                <div class=inputGroupContainer">
                
                                                                    <div class="input-group">

                                                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{$user->phone}}">
                                                                    </div>
                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div>
                                                                    <label class="control-label pull-right"><h4>Address </h4></label>
                                                                </div>
                                                                <div class="inputGroupContainer">
                
                                                                    <div class="input-group">

                                                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" value="{{$user->address}}">
                                                                    </div>
                
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div>
                                                                    <label class="control-label pull-right"><h4>Avatar</h4></label>
                                                                </div>
                                                                <div class="inputGroupContainer">
                
                                                                    <div class="input-group">

                                                                        <input type="file" class="form-control" id="file" name="file" placeholder="Enter Image"/>
                                                                    </div>
                
                                                                </div>
                                                            </div>
                                                        </div>
                
                                                        <!-- Success message -->
                                                        <!-- Button -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label"></label>
                                                                <div>
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
                            </div>
                         </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-6">
                        <div class="myaccount-link-list">								
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <img src="{{ Auth::user()['cover']}}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                                        {{ Auth::user()['name']}}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Area End -->


@endsection('content')