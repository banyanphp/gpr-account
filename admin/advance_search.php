<?php 
  $page_id="account";
  error_reporting ('0');
  include_once 'assets/libs/class.database.php';
  include_once 'assets/libs/class.session.php';
  include_once 'assets/libs/functions.php';
  include_once 'assets/libs/tables.config.php';
  $session= new Session();
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
    <title>SEARCH | GPR</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/css/style.min.css" rel="stylesheet" />
    <link href="assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
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
      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="active">Search List</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header"> Search List</h1>
        <!-- end page-header -->
        <?php if($_SESSION["msg"] != "") { ?>
        <div class="alert alert-success fade in m-b-15">
          <strong>Success!</strong>
          <?php echo $_SESSION["msg"]; ?>
          <span class="close" data-dismiss="alert">&times;</span>
        </div>
        <?php } else if($_SESSION["erroe"] != "") { ?>
        <div class="alert alert-danger fade in m-b-15">
          <strong>Success!</strong>
          <?php echo $_SESSION["erroe"]; ?>
          <span class="close" data-dismiss="alert">&times;</span>
        </div>
        <?php } ?>
        <!-- begin row -->
        <div class="row">
          <!-- begin col-12 -->
          <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <!-- <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                  </div> -->
                <h4 class="panel-title"><i class="fa fa-search-plus"></i> Search</h4>
              </div>
              <div class="panel-body">
                <form action="form.php" id="search" method="GET">
                  <div class="col-md-6">
                    <div><input type="text" class="form-control" name="query" placeholder="Name" value="" required></div>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="datepicker-default" placeholder="Select Date" value="" />
                  </div>
                  <button  class="btn btn-success">Search</button></br>
                  <div class="clearfix">
                    <br>
                  </div>
                </form>
              </div>
            </div>
            <!-- end panel -->
          </div>
          <!-- end col-12 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end #content -->
      <!-- begin theme-panel -->
      <!-- end theme-panel -->
      <!-- begin scroll to top btn -->
      <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
      <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
      $().ready(function() {
      	$.validator.addMethod("alphabetOnly", function(value, element) {
              return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
          }, "Text must contain only alphabets.");
          
      $.validator.addMethod("numberOnly", function(value, element) {
               return this.optional(element) || /^[0-9\-\s]+$/i.test(value);
           }, "Text must contain only numbers.");
      
           $.validator.addMethod("mobile", function(value, element) {
      return this.optional(element) || /^[0-9\-\+\s]+$/i.test(value);
      }, "Plese give the correct patten number");
      
      jQuery.validator.addMethod("laxEmail", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
      }, 'Please enter a valid email address.');
      
         
      	$("#search").validate({
      rules: {
      query : {
      required:true
              }
      
      
        },
      messages: {
       query: {
      required: "Plese Add Name"
          }
      }
      });
      });
      
    </script>
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
      	FormPlugins.init();
      });
    </script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
      $(document).ready(function() {
      	App.init();
      	TableManageDefault.init();
      });
    </script>
  </body>
</html>
<?php unset($_SESSION['msg']);
  unset($_SESSION['error']);
  ?>
