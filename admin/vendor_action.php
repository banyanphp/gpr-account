<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session = new Session();
$vendor_name = $_REQUEST['vendorname'];
$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];

if ($mode == "add")
	{
	global $database, $db;
	$qry_update = "INSERT INTO `" . TBL_VENDOR . "` (`vendor_name`, `created_by`) VALUES 
	
					                                          ('" . $vendor_name . "','" . $_SESSION['email'] . "');";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Insert successfully!.";
		redirect_to('vendor.php');
		}
	  else
		{
		$_SESSION["error"] = "Insert failed!.";
		redirect_to('vendor.php');
		}
	}

if ($_GET['mode'] == "status")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_VENDOR . "` SET status='" . $_GET['sid'] . "' WHERE id='" . $_GET['id'] . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('vendor.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('vendor.php');
		}
	}

if ($mode == "edit")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_VENDOR . "` SET vendor_name='" . $vendor_name . "' WHERE id='" . $id . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('vendor.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('vendor.php');
		}
	}

?>