<?php
error_reporting('0');
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session = new Session();
$customername = $_REQUEST['customername'];
$number = $_REQUEST['number'];
$mobile = $_REQUEST['mobile'];
$address = $_REQUEST['address'];
$type = $_REQUEST['type'];
$mode = $_REQUEST['mode'];
$email = $_REQUEST['email'];
$pincode = $_REQUEST['pincode'];
$advance = $_REQUEST['advancepaid'];
$crlimit = $_REQUEST['climit'];
$id = $_REQUEST['id'];
$date = date("Y-m-d");
if ($mode == "add")
	{
	global $database, $db;
	$qry_update = "INSERT INTO `" . TBL_CUSTOMER . "` (`customername`, `ctype_idfk`, `email`, `number`, `mobile_no`, `address`, `pincode`, `created_by`) VALUES ('" . $customername . "','" . $type . "','" . $email . "','" . $number . "','" . $mobile . "','" . $address . "','" . $pincode . "','" . $_SESSION['email'] . "');";
	$result_upload = $database->query($qry_update);
	if ($result_upload)
		{
		if ($type == "Advance")
			{
			$id = $database->insert_id($qry_update);
			$sql = "INSERT INTO `" . TBL_ADVANCE . "`(`customername`,`customerid`, `type`, `adv`) VALUES ('" . $customername . "','" . $id . "','" . $type . "','" . $advance . "')";
			$sqli = "INSERT INTO `" . TBL_ADVANCEUP . "`(`customername`,`customerid`, `type`, `adv`, `date`) VALUES ('" . $customername . "','" . $id . "','" . $type . "','" . $advance . "','" . $date . "')";
			$upload = $database->query($sql);
			$upload = $database->query($sqli);
			}
		elseif ($type == "Credit")
			{
			$id = $database->insert_id($qry_update);
			$sql = "INSERT INTO `" . TBL_CREDIT . "`(`customername`,`customerid`, `type`, `crlimit`) VALUES ('" . $customername . "','" . $id . "','" . $type . "','" . $crlimit . "')";
			$sqli = "INSERT INTO `" . TBL_CREDITUP . "`(`customername`,`customerid`, `type`, `crlimit`, `date`) VALUES ('" . $customername . "','" . $id . "','" . $type . "','" . $crlimit . "','" . $date . "')";
			$upload = $database->query($sql);
			$upload = $database->query($sqli);
			}
		}

	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Insert successfully!.";
		redirect_to('customer_manage.php');
		}
	  else
		{
		$_SESSION["error"] = "Insert failed!.";
		redirect_to('customer_manage.php');
		}
	}

?>