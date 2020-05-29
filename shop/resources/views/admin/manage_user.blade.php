@extends('layouts.backend')

  @section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
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
                                        if ($user->status == 0)  $status = 'Inactive' ;

                                                 $status = 'Active'
                                    @endphp
                                <tr class="odd gradeX">
                                    <td class="center">1</td>
                                    <td class="center">{{$user->id}}</td>
                                    <td class="center">{{$user->name}}</td>
                                    <td class="center">{{$user->email}}</td>
                                    <td class="center">{{$user->phone}}</td>
                                    <td class="center">{{$user->address}}</td>
                                    <td class="center">{{$user->created_at}}</td>
                                    <td class="center"><?php echo $status?></td>
                                    <td class="center">
                                        <a href="edit-category.php?catid="><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <a href="manage-categories.php?del=<?php ;?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>


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
