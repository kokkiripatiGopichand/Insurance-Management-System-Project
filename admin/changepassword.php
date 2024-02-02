<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['aid'];
$cpassword=$_POST['currentpassword'];
$newpassword=$_POST['newpassword'];
$query=mysqli_query($con,"select ID from tblimsadmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tblimsadmin set Password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
 <meta name="description" content="Insurance Management System in PHP and MySQL">
    <meta name="author" content="Sarita Pandey">

    <title>Change Password</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/morris.js/morris.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword();
return false;
}
return true;
} 

</script>
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
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Change Password!</h2>
        </div>
       <!-- az-dashboard-header-right -->
      </div><!-- az-content-header -->
      <div class="az-content-body">
      

        <div class="row row-sm mg-b-20 mg-lg-b-0">
          <div class="col-md-12 col-xl-7">
            <div class="card card-table-two">
              <h6 class="card-title"> Fill the Info</h6>
              <hr />
              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
 <form method="post" action="" name="changepassword" onsubmit="return checkpass();">
  <?php
$adminid=$_SESSION['aid'];
$ret=mysqli_query($con,"select * from tblimsadmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
       
         <div class="d-flex flex-column wd-md-500 pd-30 pd-sm-40 bg-gray-200">
               <div class="form-group">
                  <label class="form-label">Current Password: <span class="tx-danger">*</span></label>
                  <input type="password" name="currentpassword" class="form-control wd-450" required= "true" value="">
                </div><br />
                <!-- form-group -->
               <div class="form-group">
                  <label class="form-label">New Password<span class="tx-danger">*</span></label>
                  <input type="password" name="newpassword" class="form-control wd-450" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Confirm Password<span class="tx-danger">*</span></label>
                  <input type="password" name="confirmpassword" class="form-control wd-450" value="">
                </div>
          <?php } ?>

            <div class="form-group" align="center">
              <button type="submit" name="submit" value="Change" class="btn btn-az-primary pd-x-20">Change</button>
            </div>
              </div><!-- d-flex -->
            
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