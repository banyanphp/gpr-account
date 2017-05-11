<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session = new Session();
$customer_name = $_REQUEST['customername'];
$mode = $_REQUEST['mode'];
$id = $_REQUEST['id'];

if ($mode == "add")
	{
	global $database, $db;
	$qry_update = "INSERT INTO `" . TBL_CUSTOMERTYP . "` (`customer_name`, `created_by`) VALUES 
	
					                                          ('" . $customer_name . "','" . $_SESSION['email'] . "');";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Insert successfully!.";
		redirect_to('customer_type.php');
		}
	  else
		{
		$_SESSION["error"] = "Insert failed!.";
		redirect_to('customer_type.php');
		}
	}

if ($_GET['mode'] == "status")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_CUSTOMERTYP . "` SET status='" . $_GET['sid'] . "' WHERE id='" . $_GET['id'] . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('customer_type.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('customer_type.php');
		}
	}

if ($mode == "edit")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_CUSTOMERTYP . "` SET customer_name='" . $customer_name . "' WHERE id='" . $id . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('customer_type.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('customer_type.php');
		}
	}

?>