@extends('layouts.backend')

  @section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper" style="padding-top: 50px">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Reg Users</h4>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Reg Users
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>Email id </th>
                                    <th>Mobile Number</th>
                                    <th>Adress </th>
                                    <th>Created_at </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @php
                                        $status = '';
                                        if ($user->status == 0) {
                                             $status = 'Inactive' ;
                                             $class = 'danger';
                                        }else{
                                        $status = 'Active';
                                        $class = 'success';
                                        }

                                    @endphp
                                <tr class="odd gradeX">
                                    <td class="center">1</td>
                                    <td class="center">{{$user->id}}</td>
                                    <td class="center">{{$user->name}}</td>
                                    <td class="center">{{$user->email}}</td>
                                    <td class="center">{{$user->phone}}</td>
                                    <td class="center">{{$user->address}}</td>
                                    <td class="center">{{$user->created_at}}</td>
                                    <td><a href="" class="btn btn-<?php echo $class?>"><?php echo $status ?></a></td>
                                    <td class="center">
                                         <a href="{{route('user_management.edit',$user->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                             <form action="{{route('user_management.destroy',$user->id)}}" method="POST"
                                             onsubmit="return confirm('Are you sure you want to delete?');">
                                                 @csrf
                                                 @method('delete')
                                                 <input type="submit" value="Delete" class="btn btn-danger"/>
                                             </form>
                                    </td>
                                </tr>
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

<!-- CONTENT-WRAPPER SECTION END-->
<!-- --><?php //include('includes/footer.php');?>
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY  -->
  @endsection
