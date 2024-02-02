  <div class="az-sidebar">
      <div class="az-sidebar-header">
        <a href="#" class="az-logo">I<span>M</span>S | Admin</a>
      </div><!-- az-sidebar-header -->
      <div class="az-sidebar-loggedin">
        <div class="az-img-user online"><img src="../img/user.png" alt=""></div>
        <div class="media-body">
              
                      <?php
$adminid=$_SESSION['aid'];
$ret=mysqli_query($con,"select AdminName from tblimsadmin where ID='$adminid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
                  <span><?php echo $name; ?></span>
          <span>Admin</span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
            <li class="nav-item show">
            <a href="dashboard.php" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Dashboard</a>
          </li>
          <li class="nav-item show">
            <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Insurance Category</a>
            <nav class="nav-sub">
              <a href="add-category.php" class="nav-sub-link">Add Category</a>
              <a href="manage-categories.php" class="nav-sub-link">Manage Categories</a>

            </nav>
          </li><!-- nav-item -->
          
<li class="nav-item show">
            <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Insurance SubCategory</a>
            <nav class="nav-sub">
              <a href="add-subcategory.php" class="nav-sub-link">Add SubCategory</a>
              <a href="manage-subcategories.php" class="nav-sub-link">Manage SubCategories</a>

            </nav>
<li class="nav-item show">
            <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Insurance Policy</a>
            <nav class="nav-sub">
              <a href="policyform.php" class="nav-sub-link">Add Policy</a>
              <a href="manage-policyform.php" class="nav-sub-link">Manage Policy</a>

            </nav>

          </li>

          <li class="nav-item show">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>User Details</a>
            <nav class="nav-sub">
              <a href="user-detail.php" class="nav-sub-link">All Users</a>
              
            </nav>

          </li>

<li class="nav-item show">
            <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Policy Holders (Apply by users)</a>
            <nav class="nav-sub">
              <a href="pending-policy.php" class="nav-sub-link">Pending Policy</a>
            <a href="approve-policy.php" class="nav-sub-link">Approved Policy</a>
            <a href="disapprove-policy.php" class="nav-sub-link">Disapproved Policy</a>

            </nav>

          </li>

          <li class="nav-item show">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Ticket</a>
            <nav class="nav-sub">
              <a href="unresolved-tickets.php" class="nav-sub-link">UnResolved Tickets</a>
              <a href="resolved-tickets.php" class="nav-sub-link">Resolved Tickets</a>
            </nav>

          </li>


        </ul><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div>