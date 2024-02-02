<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
     $sid=$_GET['polid'];
    $catid=$_POST['category'];
    $subcat=$_POST['subcategory'];
        $polname=$_POST['policyname'];
    $sumass=$_POST['sumassured'];
    $pri=$_POST['premium'];
    $tenure=$_POST['tenure'];
     
    $query=mysqli_query($con, "update  tblpolicy set CategoryId='$catid', SubcategoryId='$subcat', PolicyName='$polname', Sumassured='$sumass', Premium='$pri',Tenure='$tenure' where ID='$sid'");
    if ($query) {
    $msg="Policy form has been updated.";
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

    <title>Policy Form!!</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/morris.js/morris.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">
 <script>
function getSubCat(val) {
  $.ajax({
type:"POST",
url:"get-subcat.php",
data:'catid='+val,
success:function(data){
$("#subcategory").html(data);
}

  });


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
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Policy Form !</h2>
        </div>
       <!-- az-dashboard-header-right -->
      </div><!-- az-content-header -->
      <div class="az-content-body">
     

        <div class="row row-sm mg-b-20 mg-lg-b-0">
          <div class="col-md-12 col-xl-7">
            <div class="card card-table-two">
              <h6 class="card-title"> Fill the Info</h6>
            <form method="post">
        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?>
    
  </p>
  <?php 
  $sid=$_GET['polid'];
$ret=mysqli_query($con,"select category.CategoryName as catname,category.ID as catid,tblsubcategory.SubcategoryName as subcat,tblsubcategory.id as scatid, tblpolicy.PolicyName,tblpolicy.CreationDate as cdate,tblpolicy.ID,tblpolicy.Sumassured,tblpolicy.Premium,tblpolicy.Tenure  from tblpolicy inner join category on category.ID=tblpolicy.CategoryId inner join tblsubcategory on  tblsubcategory.id=tblpolicy.SubcategoryId where tblpolicy.id='$sid'" );
while ($row=mysqli_fetch_array($ret)) {
 
  ?> </p>



         <div class="d-flex flex-column wd-md-500 pd-30 pd-sm-40 bg-gray-200">
               <div class="form-group">
                  <label class="form-label">Category <span class="tx-danger">*</span></label>
                  <select name="category" id="category" required="true" class="form-control wd-450" onChange="getSubCat(this.value)" >
                    <option value="<?php echo $row['catid'];?>"><?php echo $row['catname'];?></option>
                    <?php $query=mysqli_query($con,"select * from category");
              while($rw=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $rw['ID'];?>"><?php echo $rw['CategoryName'];?></option>
                  <?php } ?>
                                </select>
                </div>
                <!-- form-group -->
              
               <div class="form-group">
                  <label class="form-label">Sub Category Name: <span class="tx-danger">*</span></label>
                  <select name="subcategory"  id="subcategory" class="form-control wd-450" required="true">
                    <option value="<?php echo $row['scatid'];?>"><?php echo $row['subcat'];?></option>
                
              
                  </select>
                  </div>
<div class="form-group">
                  <label class="form-label">Policy Name: <span class="tx-danger">*</span></label>
                  <input type="text" name="policyname" class="form-control wd-450" required="true" value="<?php echo $row['PolicyName'];?>">
                </div>
                
<div class="form-group">
                  <label class="form-label">Sum Assured: <span class="tx-danger">*</span></label>
                  <input type="text" name="sumassured" class="form-control wd-450" required="true" value="<?php echo $row['Sumassured'];?>">
                </div>

                <div class="form-group">
                  <label class="form-label">Premium: <span class="tx-danger">*</span></label>
                  <input type="text" name="premium" class="form-control wd-450" required="true" value="<?php echo $row['Premium'];?>">
                </div>
<div class="form-group">
                  <label class="form-label">Tenure: <span class="tx-danger">*</span></label>
                  <input type="text" name="tenure" class="form-control wd-450" required="true" value="<?php echo $row['Tenure'];?>">
                </div>

                <?php } ?>
            

            <div class="form-group" align="center">
              <button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Update</button>
            </div>
            </div></div>
              </div><!-- d-flex -->
            
          </form>

            </div><!-- card-dashboard-five -->
          </div>
    
       <!-- az-content-body -->
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
<?php  } ?>
