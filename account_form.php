<?php
  $page_id = "accountmanage";
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
  global $database, $db;
  $sel     = "SELECT * from `" . TBL_ADVANCE . "` Where customername='" . $_GET['customername'] . "'";
  $result  = $database->query($sel);
  $row     = $database->fetch_array($result);
  $advdate = $row['created_dt'];
  $seltckt    = "SELECT SUM(tcktamount) from `" . TBL_BOOKING . "` Where customername='" . $_GET['customername'] . "' AND created_dt>='" . $advdate . "'";
  $resulttckt = $database->query($seltckt);
  $rowtckt = $database->fetch_array($resulttckt);
  //Value Declaration
  $tckt    = $rowtckt['SUM(tcktamount)'];
  $advance = $row['adv'];
  $adv     = $advance - $tckt;
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
      <title>ADVANCE UPDATE | GPR</title>
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
            <li class="active">Advance Update</li>
          </ol>
          <!-- end breadcrumb -->
          <!-- begin page-header -->
          <h1 class="page-header">Advance Update</h1>
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
                  <h4 class="panel-title"><i class="fa fa-inr"></i> Advance Update</h4>
                </div>
                <div class="panel-body">
                  <form action="advance_update.php" method="post" name="advancecustomer" id="advancecustomer">
                    <!-- begin row -->
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="customername" value="<?php
                          echo $row['customername'];
                          ?>" id="customername" placeholder="CUSTOMER NAME">
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="amount" value="<?php
                          echo $adv;
                          ?>" id="amount" placeholder="AMOUNT" disabled>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="towards" value="<?php
                          echo $row['type'];
                          ?>" id="towards" placeholder="TOWARDS" disabled>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
					<!-- begin row -->  
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="towards" value="" id="towards" placeholder="Amt" required>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <div>
                      <input type="hidden" class="form-control" name="mode" id="mode" value="add" required>
                    </div>
                    <button class="btn btn-success">Update</button></br>
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
        
        
            $("#report").validate({
                rules: {
        customername: {
                        required: true
                    },
        btype:{
        required:true
        },
        pnrno: {
                        required: true,
        alphanumeric:true
                    },
        particulars: {
                        required: true
                    },
        tcktamount: {
                        required: true
                    },
        remarks: {
                        required: true
                    }
        
        
                },
                messages: {
        customername: {
                        required: "Plese Enter Customername"
                    },
        btype:{
        required:"Please Select Transport Type"
        },
        pnrno: {
                        required: "Plese Enter Pnr"
                    },
        particulars: {
                        required: "Plese Enter Particulars"
                    },
        tcktamount: {
                        required: "Plese Enter Ticket Amount"
                    },
        remarks: {
                        required: "Plese Enter remarks"
                    }
                }
            });
        });
        
        function gets(id) {
            if (id == "Bus") {
                $('#bus').show();
            } else {
                $('#bus').hide();
            }
        
        
        }
        function getss(id) {
        if (id == "Gpr") {
                $('#vendor').show();
            } else {
                $('#vendor').hide();
            }
        
        }
      </script>
      <script>
        $('#create').submit(function() { // catch the form's submit event
          $.ajax({ // create an AJAX call...
          data: $(this).serialize(), // get the form data
          type: $(this).attr('method'), // GET or POST
          url: $(this).attr('action'), // the file to call
          success: function(response) { // on success..
           $('#created').html(response); // update the DIV
          }
        });
        return false; // cancel original event to prevent form submitting
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
