<?php
error_reporting('0');
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session = new Session();
$employeename = $_REQUEST['employeename'];
$number = $_REQUEST['number'];
$mobile = $_REQUEST['mobile'];
$address = $_REQUEST['address'];
$type = $_REQUEST['type'];
$branch = $_REQUEST['branch'];
$mode = $_REQUEST['mode'];
$email = $_REQUEST['email'];
$pincode = $_REQUEST['pincode'];
$password = $_REQUEST['password'];
$date = date("Y-m-d");
if ($mode == "add")
	{
	global $database, $db;
	$qry_update = "INSERT INTO `" . TBL_ADMIN . "` (`employeename`, `type`, `branch_idfk`, `email`, `number`, `mobile_no`, `address`, `pincode`, `password`, `created_by`) VALUES ('" . $employeename . "','" . $type . "','" . $branch . "','" . $email . "','" . $number . "','" . $mobile . "','" . $address . "','" . $pincode . "','" . md5($password) . "','" . $_SESSION['email'] . "')";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Insert successfully!.";
		redirect_to('employee_manage.php');
		}
	  else
		{
		$_SESSION["error"] = "Insert failed!.";
		redirect_to('employee_manage.php');
		}
	}


if ($_GET['mode'] == "status")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_ADMIN . "` SET status='" . $_GET['sid'] . "' WHERE id='" . $_GET['id'] . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('employee_manage.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('employee_manage.php');
		}
	}

?>