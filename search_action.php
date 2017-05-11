<?php
error_reporting('0');
include_once 'assets/libs/class.database.php';

include_once 'assets/libs/class.session.php';

include_once 'assets/libs/functions.php';

include_once 'assets/libs/tables.config.php';

include_once 'class.php';

session_start();
$session = new Session();
/*foreach($_POST['mincheck'] as $customertype)
{

// echo 'checked: '.$customertype.'';

}

if(isset($_POST['mincheck'])){
$customertype = $_POST['mincheck'];

// echo $invite;

}*/
$customertype = implode(', ', $_POST['mincheck']);
$customername = $_REQUEST['customername'];
$pnrno = $_REQUEST['pnrno'];
$particulars = $_REQUEST['particulars'];
$remarks = $_REQUEST['remarks'];
$mode = $_REQUEST['mode'];
$btype = $_REQUEST['btype'];
$gtype = $_REQUEST['gtype'];
$vtype = $_REQUEST['vtype'];
$tcktamount = $_REQUEST['tcktamount'];
$id = $_REQUEST['id'];
$date = date("Y-m-d");
$advance = account::advance('customername');

if ($mode == "add")
	{
	global $database, $db;
	$qry_update = "INSERT INTO `" . TBL_BOOKING . "` (`customername`,`ctype`, `btype`, `pnrno`, `tcktamount`, `particulars`, `remarks`, `created_dt`, `created_by`) VALUES ('" . $customername . "','" . $customertype . "','" . $btype . "','" . $pnrno . "','" . $tcktamount . "','" . $particulars . "','" . $remarks . "','" . $date . "','" . $_SESSION['EMAIL'] . "');";

	// print_r($qry_update);
	// exit;

	$result_upload = $database->query($qry_update);
	if ($result_upload)
		{
		$id = $database->insert_id($qry_update);
		if ($btype = "Bus")
			{
			$sql = "UPDATE  `" . TBL_BOOKING . "` SET gtype='" . $gtype . "' WHERE id='" . $id . "';";

			// $sql = "UPDATE  `" . TBL_ADVANCE . "` SET adv='" . $advance ."'-'". $tcktamount . "' WHERE customername='" . $customername . "';";

			$upload = $database->query($sql);
			}

		if ($upload)
			{
			$id = $database->insert_id($sql);
			if ($gtype = "Gpr")
				{
				$sql = "UPDATE  `" . TBL_BOOKING . "` SET vtype='" . $vtype . "' WHERE customername='" . $customername . "';";

				// print_r($sql);
				// exit;

				$upload = $database->query($sql);
				}
			}
		}

	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Insert successfully!.";
		redirect_to('booking_manage.php');
		}
	  else
		{
		$_SESSION["error"] = "Insert failed!.";
		redirect_to('booking_manage.php');
		}
	}

if ($mode == "edit")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_BOOKING . "` SET customername='" . $customername . "',btype='" . $btype . "',pnrno='" . $pnrno . "',particulars='" . $particulars . "',remarks='" . $remarks . "',tcktamount='" . $tcktamount . "' WHERE id='" . $id . "';";

	// print_r($qry_update);
	// exit;

	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('booking_manage.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('booking_manage.php');
		}
	}

if ($_GET['mode'] == "status")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_BOOKING . "` SET status='" . $_GET['sid'] . "' WHERE id='" . $_GET['id'] . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('booking_manage.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('booking_manage.php');
		}
	}

?>