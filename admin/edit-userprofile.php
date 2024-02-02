<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
     $eid=$_GET['userid'];
     $FName=$_POST['fullname'];
    $ContactNo=$_POST['contactnumber'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
     
   $query=mysqli_query($con, "update tbluser set FullName='$FName',  ContactNo='$ContactNo',  Email='$email', Gender='$gender' where ID='$eid'");
    if ($query) {
    $msg="User detail has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
 <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Sarita Pandey">

    <title>Insurance Management System |  Update User Detail</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/morris.js/morris.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

  </head>
  <body class="az-body az-body-sidebar">
      <!-- -sidebar -->
<?php include_once('includes/sidebar.php');?>
  <!-- -sidebar -->
    <div class="az-content az-content-dashboard-two">
     
     <!-- -header -->
<?php include_once('includes/header.php');?>
  <!-- -header -->

      <div class="az-content-header d-block d-md-flex">
        <div>
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Edit User Detail !</h2>
        </div>
       <!-- az-dashboard-header-right -->
      </div><!-- az-content-header -->
      <div class="az-content-body">
      

        <div class="row row-sm mg-b-20 mg-lg-b-0">
          <div class="col-md-12 col-xl-7">
            <div class="card card-table-two">
              <h6 class="card-title"> Edit the Info</h6>
              <hr />
              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
 <form method="post" action="">
    <?php
 $cid=$_GET['userid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <div class="wd-sm-600">
              <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Full Name <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter your Full Name"  name="fullname" required="true" value="<?php  echo $row['FullName'];?>">
                </div></div><!-- form-group -->

<div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Contact Number <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter your Contact Number"  name="contactnumber" maxlength="10" pattern="[0-9]+" required="true" value="<?php  echo $row['ContactNo'];?>">
                </div></div>
                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Email <span class="tx-danger">*</span></label>
                  <input type="email" class="form-control" placeholder="Enter your Email"  name="email"  required="true" value="<?php  echo $row['Email'];?>">
                </div></div>

                <div class="d-md-flex mg-b-20">
                <div class="form-group mg-b-0">
                  <label class="form-label">Gender <span class="tx-danger">*</span></label>
                  <?php if($row['Gender']=="Male")
{?>
                      <input type="radio" id="gender" name="gender" value="Male" checked="true">Male

                     <input type="radio" name="gender" value="Female">Female
                   <?php }   if($row['Gender']=="Female") {?>
 <input type="radio" id="gender" name="gender" value="Male" >Male
  <input type="radio" name="gender" value="Female" checked="true">Female
                   <?php }?>
                </div></div>
                
                <?php } ?>
              <button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Submit</button>
            </div>
          </form>

            </div><!-- card-dashboard-five -->
          </div>
    
        </div><!-- row -->
      </div><!-- az-content-body -->
    <!-- footer -->
    <?php include_once('includes/footer.php');?>
    </div><!-- az-content -->


    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/ionicons/ionicons.js"></script>
    <script src="../lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../lib/raphael/raphael.min.js"></script>
    <script src="../lib/morris.js/morris.min.js"></script>
    <script src="../lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="../lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="../js/azia.js"></script>
    
  </body>
</html>
<?php }  ?>