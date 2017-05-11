<?php
error_reporting('0');
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'class.php';
session_start();
$session = new Session();
$mode=$_REQUEST['mode'];
$id=$_REQUEST['id'];
if($mode == "print")
	{
	$sel = "SELECT * from `".TBL_BOOKING."` WHERE id='".$id."'";
	  $result = $database->query($sel);
	  $row = $database->fetch_array($result);
	  $name= $row['customername'];
	}
	$sel_cr = "SELECT * from `".TBL_CUSTOMER."` WHERE customername='".$name."'";
	  $result_cr = $database->query($sel_cr);
	  $row_cr = $database->fetch_array($result_cr);
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<!--Menu-->
<link href="assets/nav/menu.css" rel="stylesheet" type="text/css">
<script src="assets/nav/script.js"></script>
<!--Menu-end-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Receipt</title>
</head>

<body>
<div id="dvContainer">
<table style="border:1px solid #e0e0e0;border-style: double;width:900px;">
  <tbody>
    <tr>
      <td>
        <table style="overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:900px">
          <tbody>
            <tr>
              <td colspan="6">
                <div id="m_-8301856412589471734printEmailDiv" style="display:none;background-color:#f1f1f1;width:98%;padding:10px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;overflow:hidden">
                  <a style="border-radius:5px;padding:5px 20px 6px;font-size:14px;color:#666;border:1px solid #ccc;background:rgb(255,255,255);background:-moz-linear-gradient(top,rgba(255,255,255,1) 0%,rgba(221,221,221,1) 100%);background:-webkit-linear-gradient(top,rgba(255,255,255,1) 0%,rgba(221,221,221,1) 100%);background:-o-linear-gradient(top,rgba(255,255,255,1) 0%,rgba(221,221,221,1) 100%);background:-ms-linear-gradient(top,rgba(255,255,255,1) 0%,rgba(221,221,221,1) 100%);background:linear-gradient(to bottom,rgba(255,255,255,1) 0%,rgba(221,221,221,1) 100%);text-decoration:none;float:right;margin-right:20px" href="#" target="_blank" data-saferedirecturl="#">
                  print Receipt
                  </a>
                </div>
              </td>
            </tr>
            <tr>
              <td style="margin:0 20px 0 0;padding:0 15px 0 0;width:30%">
                <div style="display:inline-block;margin:0 0 8px 0"><img style="padding:10px" src="assets/img/gprbuslogo1.png" alt="gprbus" ></div>
              </td>
              <td style="font-size:30px;margin:0;padding:3px;width:1%"></td>
              <td colspan="3">
              </td>
              <td style="width:35%;padding:0;margin:0;text-align:right">
                <p style="font-weight:bold;margin:0 0 5px;padding:0"><span style="color:#0099d3;">GPR Travels</span></p>
                <p style="margin:0;padding:0"><span style="color:#0099d3;">Agent Contact No. 9788665444</span></p>
                
              </td>
            </tr>
            <tr>
              <td colspan="6">
                <hr style="border-top:0px solid #ccc">
              </td>
            </tr>
            <tr style="height:60px;overflow:hidden;margin-top:20px;padding:0 0 5px">
              <td colspan="4" style="border-bottom:1px solid #ffcc00;width:50%">
                <div style="font-size:22px">
                  <span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span><?php echo $row['particulars']; ?></span></span>
                  <span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin-right:10px;margin-left:10px">
                  <span><span><?php echo $row['created_dt']; ?></span></span>
                </div>
				<div>
				<span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span>Email_ID</span></span>
				<span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span>&nbsp; &nbsp; &nbsp; 	&nbsp;</span></span>
				<span>
				<span ><?php echo $row_cr['email']; ?></span></span>
				<span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span ></span></span></div>
				<div>
				<span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span>Contact No </span></span>
				<span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span>&nbsp; &nbsp; &nbsp; 	&nbsp;</span></span>
				<span>
				<span style="color:#0099d3;"><?php echo $row_cr['mobile_no']; ?></span></span>
				<span style="display:-moz-inline-stack;display:inline-block;zoom:1;margin:0 0 7px 0;font-weight:bold;padding:0"><span ></span></span></div>
              </td>
              <td colspan="2" style="border-bottom:1px solid #ffcc00;width:15%;text-align:right">
                <p style="font-size:12px;font-weight:bold;margin:0;padding:0">Receipt # :&nbsp; &nbsp; &nbsp;<span><b>GPRBK</b><?php echo $id; ?></span>
                </p>
              </td>
            </tr>
          </tbody>
        </table>
        <table style="overflow:visible;text-align:left;font-variant:normal;font-weight:normal;font-size:14px;background-color:fff;line-height:20px;font-family:Asap,sans-serif;color:#333;padding:0;font-style:normal;width:900px">
          <tbody>
            <tr style="margin:0;padding:0;">
              <td style="width:20%;font-size:14px;margin:0;padding:10px;vertical-align:middle;border-bottom:1px solid #ffcc00;">
                <p style="font-weight:bold;margin:0 0 5px;padding:0;text-transform:capitalize"><span id="m_-8301856412589471734LbTravels">Customer Name </span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><span id="m_-8301856412589471734LbBusType"><?php echo $row['customername']; ?></span></span>
              </td>
              <td style="width:20%;font-size:14px;margin:0;padding:10px;border-bottom:1px solid #ffcc00;vertical-align:middle">
                <p style="font-weight:700;margin:0 0 5px;padding:0"> <span id="m_-8301856412589471734LbRepTime">PNR NO</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row['pnrno']; ?></span>
              </td>
              <td style="width:30%;font-size:14px;margin:0;padding:10px;border-bottom:1px solid #ffcc00;vertical-align:middle">
                <p style="font-weight:700;margin:0 0 5px;padding:0"><span id="m_-8301856412589471734LbDepTime">Customer Type</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row['ctype']; ?></span>
              </td>
			  <td style="width:30%;font-size:14px;margin:0;padding:10px;border-bottom:1px solid #ffcc00;vertical-align:middle">
                <p style="font-weight:700;margin:0 0 5px;padding:0"><span id="m_-8301856412589471734LbDepTime">Vehicle Type</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row['btype']; ?></span>
              </td>
			  <td style="width:35%;font-size:14px;margin:0;padding:10px;border-bottom:1px solid #ffcc00;vertical-align:middle">
                <p style="font-weight:700;margin:0 0 5px;padding:0"><span id="m_-8301856412589471734LbDepTime">Customer_Id</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row_cr['id']; ?></span>
              </td>
              </td>
            </tr>
            <tr style="margin:0;padding:0">
              <td style="font-size:14px;margin:0;padding:10px;border-bottom:1px solid #e0e0e0;vertical-align:top">
                <p style="font-weight:700;margin:0 0 5px;padding:0;text-decoration: underline;">Customer Address </p>
				<span style="font-size:12px;color:#999;margin:0;padding:0;"><?php echo $row_cr['address']; ?></span>
				<br><p style="font-weight:700;margin:10px 0 5px;padding:0">Customer No </p>
				<span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row_cr['number']; ?></span>
				<br>
				
              </td>
              <td style="font-size:14px;margin:0;padding:10px;border-bottom:1px solid #e0e0e0;vertical-align:top">
                <p style="font-weight:700;margin:0 0 5px;padding:0"><span style="text-decoration: underline;">Remarks</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row['remarks']; ?></span><br>
				<p style="font-weight:700;margin:10px 0 5px;padding:0"><span id="m_-8301856412589471734LbBPLocation">Ticket Amount(Rs.)</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row['tcktamount']; ?></span>
				<br>
				<p style="font-weight:700;margin:10px 0 5px;padding:0"><span>&nbsp;&nbsp;</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0">&nbsp;&nbsp;</span>
				<br>
				<p style="font-weight:700;margin:10px 0 5px;padding:0"><span id="m_-8301856412589471734LbBPLocation">&nbsp;&nbsp;</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0">&nbsp;&nbsp;</span>
              </td>
              <td style="font-size:14px;margin:0;padding:10px;border-bottom:1px solid #e0e0e0;vertical-align:top">
                <p style="font-weight:700;margin:0 0 5px;padding:0"><span style="text-decoration: underline;">Booked By</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $_SESSION['email']; ?></span><br>
              </td>
              <td style="font-size:14px;margin:0;padding:10px;border-bottom:1px solid #e0e0e0;vertical-align:middle">
                <p style="font-weight:700;margin:0 0 5px;padding:0"><span style="text-decoration: underline;">Pincode</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0"><?php echo $row_cr['pincode']; ?></span>
				<p style="font-weight:700;margin:10px 0 5px;padding:0"><span id="m_-8301856412589471734LbBPLocation">&nbsp;</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0">&nbsp;</span>
				<br>
				<p style="font-weight:700;margin:10px 0 5px;padding:0"><span>&nbsp;&nbsp;</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0">&nbsp;&nbsp;</span>
				<br>
				<p style="font-weight:700;margin:10px 0 5px;padding:0"><span id="m_-8301856412589471734LbBPLocation">&nbsp;&nbsp;</span></p>
                <span style="font-size:12px;color:#999;margin:0;padding:0">&nbsp;&nbsp;</span>
              </td>
            </tr>
          </tbody>
        </table>
		<input type="button" value="Confirm Print" class="btn btn-info" id="btnPrint" style="cursor: pointer;margin-left:40%;color: #fff;background-color: #00ACAC;border-color: #2e6da4;padding: 5px;border-radius: 13px;font-family: verdana;">
		</div>
</body>
</html>