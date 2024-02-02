<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $catid=$_POST['category'];
    $subcat=$_POST['subcategory'];
    
    $polname=$_POST['policyname'];
    $sumass=$_POST['sumassured'];
    $pri=$_POST['premium'];
    $tenure=$_POST['tenure'];
     
    $query=mysqli_query($con, "insert into tblpolicy(CategoryId, SubcategoryId, PolicyName, Sumassured, Premium,Tenure) value('$catid','$subcat','$polname','$sumass','$pri','$tenure')");
    if ($query) {
    $msg="Policy form has been summitted.";
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
  }  ?> </p>
         <div class="d-flex flex-column wd-md-500 pd-30 pd-sm-40 bg-gray-200">
               <div class="form-group">
                  <label class="form-label">Category <span class="tx-danger">*</span></label>
                  <select name="category" id="category" onChange="getSubCat(this.value)" class="form-control wd-450" required="true">
                    <option value="">Select Category</option>
                    <?php $query=mysqli_query($con,"select * from category");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['CategoryName'];?></option>
                  <?php } ?>
                                </select>
                </div>
                <!-- form-group -->
              
               <div class="form-group">
                  <label class="form-label">Sub Category Name: <span class="tx-danger">*</span></label>
                  <select name="subcategory" id="subcategory" class="form-control wd-450" required="true">
                    <option value="">Select Sub Category</option>
              
                  </select>
                  </div>
<div class="form-group">
                  <label class="form-label">Policy Name: <span class="tx-danger">*</span></label>
                  <input type="text" name="policyname" class="form-control wd-450" required="true">
                </div>
                
<div class="form-group">
                  <label class="form-label">Sum Assured: <span class="tx-danger">*</span></label>
                  <input type="text" name="sumassured" class="form-control wd-450" required="true">
                </div>

                <div class="form-group">
                  <label class="form-label">Premium: <span class="tx-danger">*</span></label>
                  <input type="text" name="premium" class="form-control wd-450" required="true">
                </div>
<div class="form-group">
                  <label class="form-label">Tenure: <span class="tx-danger">*</span></label>
                  <input type="text" name="tenure" class="form-control wd-450" required="true">
                </div>

                
            

            <div class="form-group" align="center">
              <button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Submit</button>
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
