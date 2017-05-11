<?php 
  $page_id="customers";
  error_reporting ('0');
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
      <title>CUSTOMER | GPR</title>
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta content="" name="description" />
      <meta content="" name="author" />
      <!-- ================== BEGIN BASE CSS STYLE ================== -->
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,1200,700" rel="stylesheet">
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
      <div id="page-loader" class="fade in"><span class="spinner"></span></div>
      <!-- end #page-loader -->
      <!-- begin #page-container -->
      <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <?php include "includes/header.php"; ?>
        <!-- end #header -->
        <!-- begin #sidebar -->
        <?php include "includes/sidebar.php"; ?>
        <!-- end #sidebar -->
        <!-- begin #content -->
        <!-- begin #content -->
        <div id="content" class="content">
          <!-- begin breadcrumb -->
          <ol class="breadcrumb pull-right">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Customer Management</li>
          </ol>
          <!-- end breadcrumb -->
          <!-- begin page-header -->
          <h1 class="page-header">Customer Management</h1>
          <!-- end page-header -->
          <?php if($_SESSION["msg"] != "") { ?>
          <div class="alert alert-success fade in m-b-15">
            <strong>Success!</strong>
            <?php echo $_SESSION["msg"]; ?>
            <span class="close" data-dismiss="alert">&times;</span>
          </div>
          <?php } else if($_SESSION["erroe"] != "") { ?>
          <div class="alert alert-danger fade in m-b-15">
            <strong>Error!</strong>
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
                  <h4 class="panel-title"><img src="assets/icon/agent.png"> Customer Add</h4>
                </div>
                <div class="panel-body">
                  <form action="customer_action.php" method="post" name="customer" id="customer">
                    <div class="row">
                      <div class="col-md-12">
                        <div><input type="text" class="form-control" name="customername" id="customername" value = "" placeholder="Customer Name" required></div>
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <div><input type="text" class="form-control" name="number"  value = "" id="number" placeholder="Contact Number" required></div>
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" name="mobile" id="mobile" value="" class="form-control" placeholder="Mobile Number">
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <select class="form-control" name="type" id="type" Onchange="gets(this.value)">
                          <option value="" >Choose  Type</option>
                          <option value="Advance">Advance Customer</option>
                          <option value="Credit">Credit Customer</option>
                        </select>
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <textarea class="form-control" name="address" placeholder="Address" id="address" ></textarea>
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" name="email" id="email" value="" class="form-control" placeholder="Email">
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" name="pincode" id="pincode" value="" class="form-control" placeholder="Pincode">
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div class="row">
                      <div class="col-md-12">
                        <div id="credit" style="display:none">
                          <input type="text" name="climit" id="climit" value="" class="form-control" placeholder="Credit Limit">
                        </div>
                        <div id="advance" style="display:none">
                          <input type="text" name="advancepaid" id="advancepaid" value="" class="form-control" placeholder="Advance Paid">
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"><br></div>
                    <div><input type="hidden" class="form-control" name="mode" id="mode" value="add" required></div>
                    <button  class="btn btn-success">Add</button></br>
                  </form>
                </div>
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
           
        $.validator.addMethod("alphabnumeric", function(value, element) {
              
        return this.optional( element ) ||  /^[A-Za-z0-9\s]*$/.test(value) // consists of only these
        && /[a-z]/.test(value) // has a lowercase letter
        && /\d/.test(value) // has a digit;
        }, "Text must contain only alphabnumeric");
            
        $.validator.addMethod("numberOnly", function(value, element) {
                 return this.optional(element) || /^[0-9\-\s]+$/i.test(value);
             }, "Text must contain only numbers.");
        
             $.validator.addMethod("mobile", function(value, element) {
        return this.optional(element) || /^[0-9\-\+\s]+$/i.test(value);
        }, "Plese give the correct patten number");
        
        jQuery.validator.addMethod("laxEmail", function(value, element) {
        // allow any non-whitespace characters as the host part
        return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,123})$/.test( value );
        }, 'Please enter a valid email address.');
        
           
        	$("#customer").validate({
        rules: {
        customername : {
        required:true,
        alphabetOnly:true
                },
        number :{
        required:true,
        mobile:true,
		maxlength:12
        },
        mobile :{
        required:true,
        mobile:true,
		maxlength:12
        },
        type :{
        required:true
        },
        address :{
        required:true
        },
        email :{
        required:true,
        laxEmail:true
        },
        climit :{
        required:true
        },
        advancepaid :{
        required:true
        },
        pincode :{
         required:true,
         numberOnly:true,
         maxlength:10
        }
        
        
          },
        messages: {
         customername: {
        required: "Plese Enter Customer Name"
            },
        number :{
        required: "Please Enter Contact Number"
        },
        mobile :{
        required: "Please Enter Mobile Number"
        },
        type :{
        required: "Please Enter Customer Type"
        },
        address :{
        required: "Please Enter Address"
        },
        email :{
        required: "Please Enter Email Address"
        },
        climit :{
        required: "Please Enter Credit limit"
        },
        advancepaid :{
        required: "Please Enter Advancepaid"
        },
        pincode :{
        required: "Please Enter Pincode"
        }
        
        }
        });
        });
        
        function gets(id) {
        if (id == "Credit") {
         $('#credit').show();
         $('#advance').hide();
        }
        else if (id == "Advance") {
         $('#advance').show();
         $('#credit').hide();
        } 
        else {
         $('#advance').hide();
         $('#credit').hide();
        }
        }
        
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
  <?php unset($_SESSION['msg']);
    unset($_SESSION['error']);
    ?>
