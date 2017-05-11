<?php 
  $page_id="booking" ; 
  error_reporting(0); 
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
  global $database, $db;  
  if($_GET['mode'] == "edit") { 
  $sel_booking="SELECT * from `".TBL_BOOKING."` Where id='".$_GET['id']."'"; 
  $result_booking = $database->query($sel_booking); 
  $row_booking = $database->fetch_array($result_booking); } 
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
      <title>BUS BOOKING | GPR</title>
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
            <li><a href="dashboard.php">Dashboard</a>
            </li>
            <li class="active">Booking Entry</li>
          </ol>
          <!-- end breadcrumb -->
          <!-- begin page-header -->
          <h1 class="page-header">Booking Entry</h1>
          <!-- end page-header -->
          <?php if($_SESSION[ "msg"] !="" ) { ?>
          <div class="alert alert-success fade in m-b-15"">
            <strong>Success!</strong>
            <?php echo $_SESSION[ "msg"]; ?>
            <span class="close" data-dismiss="alert">&times;</span>
          </div>
          <?php } else if($_SESSION[ "erroe"] !="" ) { ?>
          <div class="alert alert-danger fade in m-b-15">
            <strong>Success!</strong>
            <?php echo $_SESSION[ "error"]; ?>
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
                  <h4 class="panel-title"><i class="fa fa-table"></i> Booking Entry</h4>
                </div>
                <div class="panel-body">
                  <form action="booking_action.php" method="post" name="report" id="report">
                    <!-- begin row -->
                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="radio-inline">
                          <input type="radio" name="ctype" name="ctype" value="Walkin"/>
                          Walkin Customer
                          </label>
                          <label class="radio-inline">
                          <input type="radio" name="ctype" name="ctype" onclick="check(this.value)" value="Advance" />
                          Advanced Customer
                          </label>
                          <label class="radio-inline">
                          <input type="radio" name="ctype" name="ctype" onclick="check(this.value)" value="Credit" />
                          Credit Customer
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->
                    <div class="row">
                      <div class="search-box">
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="customername" value="" autocomplete="off" placeholder="CUSTOMERNAME" Onchange="getcustomer(this.value)">
                          <div class="result"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="btype" id="btype" Onchange="gets(this.value)">
                          <option value="">Choose Type</option>
                          <option value="Bus">Bus</option>
                          <option value="Train">Train</option>
                          <option value="Flight">Flight</option>
                        </select>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->  
                    <div class="row">
                      <div id="bus" style="display:none">
                        <div class="col-md-6">
                          <select class="form-control" name="gtype" id="gtype" Onchange="getss(this.value)">
                            <option value="">Choose Group</option>
                            <option value="Gpr">GPR</option>
                            <option value="Ganapathy">GANAPATHY</option>
                          </select>
                        </div>
                      </div>
                      <div id="vendor" style="display:none">
                        <div class="col-md-6">
                          <select class="form-control" name="vtype" id="vtype">
                            <option value="">Choose Vendor</option>
                            <option value="Redbus">Redbus</option>
                            <option value="Ticketgoose">Ticket Goose</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->
                    <div class="row">
                      <div class="col-md-6">
                        <div>
                          <input type="text" class="form-control" name="pnrno" value="" id="pnrno" placeholder="PNR NO" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div>
                          <input type="text" class="form-control" name="particulars" value="" id="particulars" placeholder="PARTICULARS" required>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->
                    <div class="row">
                      <div class="col-md-6">
                        <div>
                          <input type="text" class="form-control" name="tcktamount" value="" id="tcktamount" placeholder="TICKET AMOUNT" required>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <!-- begin row -->
                    <div class="row">
                      <div class="col-md-12">
                        <textarea class="form-control" placeholder="REMARKS" name="remarks" id="remarks" rows="5"></textarea>
                      </div>
                    </div>
                    <!-- end row -->
                    <div class="clearfix">
                      <br>
                    </div>
                    <?php if($_GET[ 'mode']=="edit" ) { ?>
                    <div>
                      <input type="hidden" class="form-control" name="mode" id="mode" value="edit" required>
                    </div>
                    <div>
                      <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $_GET['id']; ?>" required>
                    </div>
                    <button class="btn btn-success">Update</button>
                    </br>
                    <?php } else { ?>
                    <div>
                      <input type="hidden" class="form-control" name="mode" id="mode" value="add" required>
                    </div>
                    <button class="btn btn-success">Add</button>
                    </br>
                    <?php } ?>
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
      <script type="text/javascript">
        $(document).ready(function() {
        $("input[type='radio']").change(function() {
        var selection = $(this).val();
        if (selection == "Advance") {
            /* alert("advance button Selected: " + selection); */
        
            $('.search-box input[type="text"]').on("keyup input", function() {
        
                /* Get input value on change */
        
                var inputVal = $(this).val();
        
                var resultDropdown = $(this).siblings(".result");
        
                if (inputVal.length) {
        
                    $.get("customer_dt.php", {
                        term: inputVal
                    }).done(function(data) {
        
                        // Display the returned data in browser
        
                        resultDropdown.html(data);
        
                    });
                }
            });
        
        } else if (selection == "Credit") {
            $('.search-box input[type="text"]').on("keyup input", function() {
        
                /* Get input value on change */
        
                var inputVal = $(this).val();
        
                var resultDropdown = $(this).siblings(".result");
        
                if (inputVal.length) {
        
                    $.get("customer_dt2.php", {
                        term: inputVal
                    }).done(function(data) {
        
                        // Display the returned data in browser
        
                        resultDropdown.html(data);
        
                    });
                }
            });
        } else {
        
            resultDropdown.hide();
        
        }
        
        });
        
        
        // Set search input value on click of result item
        
        $(document).on("click", ".result p", function() {
        
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        
        $(this).parent(".result").empty();
        
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
    unset($_SESSION[ 'msg']); 
    unset($_SESSION[ 'error']); 
    ?>
