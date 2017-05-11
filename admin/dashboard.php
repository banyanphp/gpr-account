<?php 
  $page_id="dashboard";
  error_reporting (0);
  include_once 'assets/libs/class.database.php';
  include_once 'assets/libs/class.session.php';
  include_once 'assets/libs/functions.php';
  include_once 'assets/libs/tables.config.php';
  session_start();
  if($_SESSION['Login'] != 2) 
  {
  	header('Location:index.php');
  		exit;
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
  <!--<![endif]-->
  <head>
    <meta charset="utf-8" />
    <title>DASHBOARD | GPR</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/css/style.min.css" rel="stylesheet" />
    <link href="assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
  </head>
  <body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
      <!-- begin #header -->
      <?php include "includes/header.php"; ?>
      <!-- end #header -->
      <!-- begin #sidebar -->
      <?php include "includes/sidebar2.php"; ?>
      <!-- end #sidebar -->
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li><a href="javascript:;">Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Dashboard</h1>
        <!-- end page-header -->
        <!-- begin row -->
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
              <div class="stats-icon"><i class="fa fa-user"></i></div>
              <div class="stats-info">
                <h4>NUMBER OF CUSTOMERS</h4>
                <?php
                  $sel="SELECT * from `".TBL_CUSTOMER."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="customer_manage.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
              <div class="stats-icon"><i class="fa fa-users"></i></div>
              <div class="stats-info">
                <h4>NUMBER OF GROUPS</h4>
                <?php
                  $sel="SELECT * from `".TBL_GROUP."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="group.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
              <div class="stats-icon"><i class="fa fa-plus"></i></div>
              <div class="stats-info">
                <h4>NUMBER OF VENDORS</h4>
                <?php
                  $sel="SELECT * from `".TBL_VENDOR."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="vendor.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-grey">
              <div class="stats-icon"><i class="fa fa-table"></i></div>
              <div class="stats-info">
                <h4>NUMBER OF BOOKINGS</h4>
                <?php
                  $sel="SELECT * from `".TBL_BOOKING."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="vendor.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-orange">
              <div class="stats-icon"><i class="fa fa-inr"></i></div>
              <div class="stats-info">
                <h4>ADVANCE MAINTAINANCE</h4>
                <?php
                  $sel="SELECT * from `".TBL_ADVANCE."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="advance_manage.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-violet">
              <div class="stats-icon"><i class="fa fa-dollar"></i></div>
              <div class="stats-info">
                <h4>CREDIT MAINTAINANCE</h4>
                <?php
                  $sel="SELECT * from `".TBL_CREDIT."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="credit_manage.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
              <div class="stats-icon"><i class="fa fa-dollar"></i></div>
              <div class="stats-info">
                <h4>VOUCHER MAINTAINANCE</h4>
                <?php
                  $sel="SELECT * from `".TBL_VOUCHER."` ORDER BY date  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="voucher_manage2.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
              <div class="stats-icon"><i class="fa fa-dollar"></i></div>
              <div class="stats-info">
                <h4>EMPLOYEE MAINTAINANCE</h4>
                <?php
                  $sel="SELECT * from `".TBL_ADMIN."` ORDER BY created_dt  DESC";
                  	
                  	$result = $database->query( $sel );
                  	$num = $database->num_rows( $result );
                  	?>
                <p><?php echo $num; ?></p>
              </div>
              <div class="stats-link">
                <a href="employee_manage.php">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end #content -->
      <!-- begin scroll to top btn -->
      <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
      <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/plugins/masked-input/masked-input.min.js"></script>
    <script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/plugins/password-indicator/js/password-indicator.js"></script>
    <script src="assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
    <script src="assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="assets/js/form-plugins.demo.min.js"></script>
    <script src="assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
      $(document).ready(function() {
      	App.init();
      	Dashboard.init();
      });
    </script>
  </body>
</html>