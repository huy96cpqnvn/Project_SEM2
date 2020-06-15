@extends('layouts.backend')

@section('content')
<div class="content-wrapper">
    <div class="content">							<!-- First Row  -->
        <div class="row">

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="media widget-media p-4 bg-white border">
                    <div class="icon rounded-circle mr-4 bg-primary">
                        <i class="mdi mdi-account-outline text-white "></i>
                    </div>
                    <div class="media-body align-self-center">
                        <h4 class="text-primary mb-2">{{$lsUser->count()}}</h4>
                        <p>Total Users</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="media widget-media p-4 bg-white border">
                    <div class="icon rounded-circle mr-4 bg-info">
                        <i class="mdi mdi-book-open-variant text-white "></i>
                    </div>
                    <div class="media-body align-self-center">
                        <h4 class="text-primary mb-2">{{$lsProduct->count()}}</h4>
                        <p>Total Products</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="media widget-media p-4 bg-white border">
                    <div class="icon rounded-circle bg-warning mr-4">
                        <i class="mdi mdi-book-open-outline text-white "></i>
                    </div>
                    <div class="media-body align-self-center">
                        <h4 class="text-primary mb-2">{{$lsNews->count()}}</h4>
                        <p>Total News</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="media widget-media p-4 bg-white border">
                    <div class="icon rounded-circle mr-4 bg-danger">
                        <i class="mdi mdi-cart-outline text-white "></i>
                    </div>
                    <div class="media-body align-self-center">
                        <h4 class="text-primary mb-2">{{$lsOrder->count()}}</h4>
                        <p>Total Sales</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- New Row  -->
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card card-table-border-none" data-scroll-height="580">
                    <div class="card-header justify-content-between">
                        <h2 class="d-inline-block">New Customers</h2>
                        <div>
                            <button class="text-black-50 mr-2 font-size-20">
                                <i class="mdi mdi-cached"></i>
                            </button>
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                                    <li class="dropdown-item"><a href="#">Action</a></li>
                                    <li class="dropdown-item"><a href="#">Another action</a></li>
                                    <li class="dropdown-item"><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 slim-scroll">
                        <table class="table ">
                            <thead>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Address</th>
                            </thead>
                            <tbody>
                                @foreach($lsLastestUser as $user)
                                <tr>
                                    <td >
                                        <div class="media">
                                            <div class="media-image mr-3 rounded-circle">
                                                <a href="user_management"><img class="rounded-circle w-45" src="{{asset($user->cover)}}" alt="customer image"></a>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <a href="user_management">
                                                    <h6 class="mt-0 text-dark font-weight-medium">{{$user->name}}</h6>
                                                </a>
                                                <small>{{$user->email}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td >{{$user->phone}}</td>
                                    <td class="text-dark d-none d-md-block">{{$user->address}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card card-table-border-none" data-scroll-height="580">
                    <div class="card-header justify-content-between">
                        <h2 class="d-inline-block">New Posts</h2>
                        <div>
                            <button class="text-black-50 mr-2 font-size-20">
                                <i class="mdi mdi-cached"></i>
                            </button>
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                                    <li class="dropdown-item"><a href="#">Action</a></li>
                                    <li class="dropdown-item"><a href="#">Another action</a></li>
                                    <li class="dropdown-item"><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 slim-scroll">
                        <table class="table">
                            <thead>
                            <th>News</th>
                            <th>Time</th>
                            </thead>
                            <tbody>
                                @foreach($lsLastestNews as $news)
                                <tr>
                                    <td >
                                        <div class="media">
                                            <div class="media-image mr-3 rounded-circle">
                                                <a href="news_management"><img class="rounded w-45" src="{{$news->cover}}" alt="news image"></a>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <a href="news_management">
                                                    <h6 class="mt-0 text-dark font-weight-medium">{{$news->title}}</h6>
                                                </a>
                                                <small>{{$news->category['name']}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-dark d-none d-md-block">{{date('d/M/Y', strtotime($news->created_at)) }}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection