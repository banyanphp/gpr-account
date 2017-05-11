<?php 
  $page_id="account";
  error_reporting (0);
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
<!--[if IE 8]> 
<html lang="en" class="ie8">
  <![endif]-->
  <!--[if !IE]><!-->
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
      <link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
      <!-- ================== END PAGE LEVEL STYLE ================== -->
      <!-- ================== BEGIN BASE JS ================== -->
      <script src="assets/plugins/pace/pace.min.js"></script>
	  
      <script type="text/javascript" src="print/jquery.min.js"></script>
      <script type="text/javascript">
        $("#btnPrint").live("click", function () {
             $('#btnPrint').hide();
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=800,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            location.reload();
        });
      </script>
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
          <li class="active">Search Result</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Search Result</h1>
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
                <h4 class="panel-title"><i class="fa fa-search-plus"></i> Search Result</h4>
              </div>
              <div class="panel-body">
                <div class="col-md-12" id="dvContainer">
                  <blockquote> 
                    <?php
                      $query = $_GET['query'];
                      global $database, $db;
                      $query = $_GET['query'];
                      $qry_adv = "SELECT `adv`,`customername` FROM `" . TBL_ADVANCE . "` WHERE customername='" . $query . "'";
                      $result_adv = $database->query($qry_adv);
                      $row_adv = $database->fetch_array($result_adv);
                      global $database, $db;
                      $query = $_GET['query'];
                      $qry_cr = "SELECT `customername`,`crlimit` FROM `" . TBL_CREDIT . "` WHERE customername='" . $query . "'";
                      $result_cr = $database->query($qry_cr);
                      $row_cr = $database->fetch_array($result_cr);
                      global $database, $db;
                      $qry = "SELECT SUM(tcktamount),`ctype` FROM `" . TBL_BOOKING . "` WHERE customername='" . $query . "'";
                      $result = $database->query($qry);
                      $row = $database->fetch_array($result);
                      $type = $row['ctype'];
                      
                      if ($type == "Advance")
                      	{
                      	$name = $row_adv['customername'];
                      	$advance = $row_adv['adv'];
                      	$ticket = $row['SUM(tcktamount)'];
                      	$result_a = ($advance - $ticket);
                      	$formattedN = number_format($advance, 2);
                      	$formattedNu = number_format($ticket, 2);
                      	$formattedNum = number_format($result_a, 2);
                      	if ($result_a > 0)
                      		{
                      echo ($name);
                      		echo "<br />";
                      		echo "Advance Paid : ".($formattedN);
                      		echo "<br />";
                      		echo "Ticket Purchased For : ".($formattedNu);
                      		echo "<br />";
                      		echo "Remaining Advance : ".($formattedNum);
                      		}elseif ($result_a < $advance)
                      {
							echo ($name);
                      		echo "<br />";
                      		echo "Advance Paid : ".($formattedN);
                      		echo "<br />";
                      		echo "Ticket Purchased For : ".($formattedNu);
                      		echo "<br />";
                      		echo "Remaining Advance : ".($formattedNum);
							echo "<br />";
							echo "Insufficient Balance Refill Immedietly";
                      }
                      	}
                      
                      elseif ($type == "Credit")
                      	{
                      	$name = $row_cr['customername'];
                      	$credit = $row_cr['crlimit'];
                      	$ticket = $row['SUM(tcktamount)'];
                      	$result_c = ($credit - $ticket);
                      	$format = number_format($result_c, 2);
                      	$formaty = number_format($credit, 2);
                      	$formatt = number_format($ticket, 2);
                      	if ($result_c > 0)
                      		{
                      		echo ($name);
                      		echo "<br />";
                      		echo "Credit Limit : ".($formaty);
                      		echo "<br />";
                      		echo "Ticket Purchased For : ".($formatt);
                      		echo "<br />";
                      		echo "Remaining Credit Limit : ".($format);
                      		}elseif ($result_a < $advance){echo ($name);
                      		echo "<br />";
                      		echo "Credit Limit : ".($formaty);
                      		echo "<br />";
                      		echo "Ticket Purchased For : ".($formatt);
                      		echo "<br />";
                      		echo "Remaining Credit Limit : ".($format);
                      echo "<br />";
                      echo "Insufficient Balance Refill Immedietly";
                      }
                      	}
                      
                      ?>
                  </blockquote>
				  <input type="button" value="Confirm Print" class="btn btn-info" id="btnPrint" style="cursor: pointer;margin-left:40%;color: #fff;background-color: #00ACAC;border-color: #2e6da4;padding: 5px;border-radius: 13px;font-family: verdana;">
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
      <script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
      <script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
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
