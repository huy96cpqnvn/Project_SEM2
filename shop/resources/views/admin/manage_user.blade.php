@extends('layouts.backend')

  @section('content')
<!------MENU SECTION START-->
<?php //include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Reg Students</h4>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Reg Students
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
<!--                                --><?php //$sql = "SELECT * from tblstudents";
//                                $query = $dbh -> prepare($sql);
//                                $query->execute();
//                                $results=$query->fetchAll(PDO::FETCH_OBJ);
//                                $cnt=1;
//                                if($query->rowCount() > 0)
//                                {
//                                foreach($results as $result)
//                                {               ?>
                                <tr class="odd gradeX">
                                    <td class="center">1</td>
                                    <td class="center">2</td>
                                    <td class="center">2</td>
                                    <td class="center">3</td>
                                    <td class="center">4</td>
                                    <td class="center">5</td>
                                    <td class="center">6</td>
                                    <td class="center">7</td>
                                    <td class="center">
                                        <a href="reg-students.php?inid=7" onclick="return confirm('Are you sure you want to block this student?');" >
                                            <button class="btn btn-danger"> Inactive</button>
                                        <a href="reg-students.php?id=8" onclick="return confirm('Are you sure you want to active this student?');">
                                            <button class="btn btn-primary"> Active</button>


                                    </td>
                                </tr> <tr class="odd gradeX">
                                    <td class="center">1</td>
                                    <td class="center">2</td>
                                    <td class="center">2</td>
                                    <td class="center">3</td>
                                    <td class="center">4</td>
                                    <td class="center">5</td>
                                    <td class="center">6</td>
                                    <td class="center">7</td>
                                    <td class="center">
                                        <a href="reg-students.php?inid=7" onclick="return confirm('Are you sure you want to block this student?');" >
                                            <button class="btn btn-danger"> Inactive</button>
                                        <a href="reg-students.php?id=8" onclick="return confirm('Are you sure you want to active this student?');">
                                            <button class="btn btn-primary"> Active</button>


                                    </td>
                                </tr>

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
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- DATATABLE SCRIPTS  -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
  @endsection
