 <div class="az-header">
        <div class="container-fluid">
          <div class="az-header-left">
            <a href="" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
          </div><!-- az-header-left -->
          
          <div class="az-header-right">

            <div class="dropdown az-profile-menu">
              <a href="" class="az-img-user"><img src="../img/user.png" alt=""></a>
              <div class="dropdown-menu">
                <div class="az-dropdown-header d-sm-none">
                  <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>
                <div class="az-header-profile">
                  <div class="az-img-user">
                    <img src="../img/user.png" alt="">
                  </div><!-- az-img-user -->
                
                      <?php
$adminid=$_SESSION['aid'];
$ret=mysqli_query($con,"select AdminName from tblimsadmin where ID='$adminid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
                  <span><?php echo $name; ?></span>
                   <span>Admin</span>
                </div><!-- az-header-profile -->

                <a href="adminprofile.php" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                <a href="changepassword.php" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Change Password</a>
                <a href="logout.php" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
              </div><!-- dropdown-menu -->
            </div>
          </div><!-- az-header-right -->
        </div><!-- container -->
      </div><!-- az-header -->