<?php
error_reporting('0');
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'class.php';
$session= new Session();
  session_start();
  if($_SESSION['Login'] != 2)  
  {
  	header('Location:index.php');
  		exit;
  }
global $database, $db;
$towards = $_REQUEST['towards'];
$customername = $_REQUEST['customername'];
$sel = "SELECT * from `" . TBL_ADVANCE . "` Where customername='" . $customername . "'";
$result = $database->query($sel);
$row = $database->fetch_array($result);
$advdate = $row['created_dt'];
$seltckt = "SELECT SUM(tcktamount) from `" . TBL_BOOKING . "` Where customername='" . $customername . "' AND created_dt>='" . $advdate . "'";
$resulttckt = $database->query($seltckt);
$rowtckt = $database->fetch_array($resulttckt);
$date = date("Y-m-d");

// Value Declaration

$tckt = $rowtckt['SUM(tcktamount)'];
$advance = $row['adv'];
$adv = $advance - $tckt;
$qry_update = "UPDATE  `" . TBL_ADVANCE . "` SET adv='" . $adv . "'+ '" . $towards . "',created_dt='" . $date . "' WHERE customername='" . $customername . "';";
$result_upload = $database->query($qry_update);

if ($result_upload > 0)
	{
	$_SESSION["msg"] = "Upadate successfully!.";
	redirect_to('advance_manage.php');
	}
  else
	{
	$_SESSION["error"] = "Upadate failed!.";
	redirect_to('booking_manage.php');
	}

?>