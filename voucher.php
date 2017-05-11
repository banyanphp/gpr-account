<?php
  $page_id = "voucher";
  error_reporting('0');
  include_once 'assets/libs/class.database.php';
  include_once 'assets/libs/class.session.php';
  include_once 'assets/libs/functions.php';
  include_once 'assets/libs/tables.config.php';
  $session= new Session();
  session_start();
  if($_SESSION['Login'] != 1)  
  {
  	header('Location:index.php');
  		exit;
  }
  $date = date("Y-m-d");
  ?>
<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="en" class="ie8">
  <![endif]-->
  <!--[if !IE]><!-->
  <html lang="en">
    <!--<![endif]-->
    <head>
      <meta charset="utf-8" />
      <title>CREDIT UPDATE | GPR</title>
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
      <link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
      <!-- ================== END PAGE LEVEL STYLE ================== -->
      <!-- ================== BEGIN BASE JS ================== -->
      <script src="assets/plugins/pace/pace.min.js"></script>
      <!-- ================== END BASE JS ================== -->
    </head>
    <body>
      <!-- begin #page-loader -->
      <div id="page-loader" class="fade in"><span class="spinner"></span>
      </div>
      <!-- end #page-loader -->
      <!-- begin #page-container -->
      <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <?php
          include "includes/header.php";
          ?>
        <!-- end #header -->
        <!-- begin #sidebar -->
        <?php include "includes/sidebar.php"; ?>
        <!-- end #sidebar -->
        <!-- begin #content -->
        <!-- begin #content -->
        <div id="content" class="content">
          <!-- begin breadcrumb -->
          <ol class="breadcrumb pull-right">
            <li><a href="dashboard.php">Dashboard</a>
            </li>
            <li class="active">Voucher Update</li>
          </ol>
          <!-- end breadcrumb -->
          <!-- begin page-header -->
          <h1 class="page-header">Voucher Update</h1>
          <!-- end page-header -->
          <?php
            if ($_SESSION["msg"] != "") {
            ?>
          <div class="alert alert-success fade in m-b-15"">
            <strong>Success!</strong>
            <?php
              echo $_SESSION["msg"];
              ?>
            <span class="close" data-dismiss="alert">&times;</span>
          </div>
          <?php
            } else if ($_SESSION["erroe"] != "") {
            ?>
          <div class="alert alert-danger fade in m-b-15">
            <strong>Success!</strong>
            <?php
              echo $_SESSION["error"];
              ?>
            <span class="close" data-dismiss="alert">&times;</span>
          </div>
          <?php
            }
            ?>
          <!-- begin row -->
          <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
              <!-- begin panel -->
              <div class="panel panel-inverse">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-edit (alias)"></i> Voucher Update</h4>
                </div>
                <div class="panel-body">
                  <form action="voucher_action.php" method="post" name="voucher" id="voucher">
                    <!-- begin row -->
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="userid" value="<?php echo $_SESSION['email']; ?>" id="userid" placeholder="User_ID">
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="amounttowards" value="" id="amounttowards" placeholder="Amount Towards" >
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="date" value="<?php
                          echo $date;
                          ?>" id="date" placeholder="Date">
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="towards" value="" id="towards" placeholder="Reason of the Pay" required>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <div>
                      <input type="hidden" class="form-control" name="mode" id="mode" value="add" required>
                    </div>
                    <button class="btn btn-success">Add</button></br>
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
                return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
            }, 'Please enter a valid email address.');
        
        
            $("#voucher").validate({
                rules: {
        userid: {
                        required: true
                    },
        amounttowards: {
                        required: true,
						numberOnly:true
                    },
        date: {
                        required: true
                    },
        towards: {
                        required: true
                    }
        
        
                },
                messages: {
        userid: {
                        required: "Plese enter userid"
                    },
        amounttowards: {
                        required: "Plese enter amount towards"
                    },
        date: {
                        required: "Plese enter date"
                    },
        towards: {
                        required: "Plese enter reason of this voucher"
                    }
                }
            });
        });
      </script>
      <script>
        $( function() {
          $( "#date" ).datepicker();
        } );
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
      <script src="assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/js/table-manage-default.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
      <!-- ================== END PAGE LEVEL JS ================== -->
      <script>
        $(document).ready(function() {
            App.init();
            TableManageDefault.init();
        });
      </script>
    </body>
  </html>
  <?php
    unset($_SESSION['msg']);
    unset($_SESSION['error']);
    ?>
