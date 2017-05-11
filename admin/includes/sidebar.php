<div id="sidebar" class="sidebar">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
      <li class="nav-profile">
        <div class="info">
          <?php $name = explode("@",$_SESSION['email']);
            echo $name[0];
            ?>
        </div>
      </li>
    </ul>
    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">
      <li class="<?php if($page_id == "dashboard") { echo "active"; } ?>">
        <a href="dashboard.php">
        <i class="fa fa-laptop"></i>
        <span>Dashboard</span>
        </a>
      </li>
      <li class="has-sub <?php if($page_id == "customers") { echo "active"; } ?>">
        <a href="#">
        <i class="fa fa-user"></i>
        <span>Customers</span>
        </a>
        <ul class="sub-menu">
          <li><a href="customer.php">Customer_Add</a></li>
          <li><a href="customer_manage.php">Customer_Manage</a></li>
          <li><a href="customer_type.php">Customer_Type</a></li>
        </ul>
      </li>
      <li class="has-sub <?php if($page_id == "booking") { echo "active"; } ?>">
        <a href="#">
        <i class="fa fa-table"></i>
        <span>Booking Entry</span>
        </a>
        <ul class="sub-menu">
          <li><a href="booking_bus.php">New Entry</a></li>
          <li><a href="booking_manage.php">Todays List</a></li>
        </ul>
      </li>
      <li class="has-sub <?php if($page_id == "group") { echo "active"; } ?>">
        <a href="group.php">
        <i class="fa fa-users"></i>
        <span>Group Management</span>
        </a>
      </li>
      <li class="has-sub <?php if($page_id == "account") { echo "active"; } ?>">
        <a href="#">
        <i class="fa fa-print"></i>
        <span>Report Management</span>
        </a>
        <ul class="sub-menu">
          <li><a href="advance.php">Reports by Category</a></li>
          <li><a href="advance_search.php">Search by Name</a></li>
        </ul>
      </li>
	  <li class="has-sub <?php if($page_id == "accountmanage") { echo "active"; } ?>">
        <a href="#">
        <i class="fa fa-dollar"></i>
        <span>Account Management</span>
        </a>
        <ul class="sub-menu">
          <li><a href="advance_manage.php">Advance Update</a></li>
          <li><a href="credit_manage.php">Credit Update</a></li>
        </ul>
      </li>
	  <li class="has-sub <?php if($page_id == "voucher") { echo "active"; } ?>">
        <a href="#">
        <i class="fa fa-edit (alias)"></i>
        <span>Voucher Management</span>
        </a>
        <ul class="sub-menu">
          <li><a href="voucher.php">Voucher Entry</a></li>
          <li><a href="voucher_manage.php">Voucher Manage</a></li>
        </ul>
      </li>
      <li class="has-sub <?php if($page_id == "vendor") { echo "active"; } ?>">
        <a href="vendor.php">
        <i class="fa fa-plus"></i>
        <span>Vendor Management</span>
        </a>
      </li>
	  
      <!-- begin sidebar minify button -->
      <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
      <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
  </div>
  <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
