<?php
  error_reporting(E_ALL ^ E_NOTICE);
  include_once 'assets/libs/class.database.php';
  include_once 'assets/libs/class.session.php';
  include_once 'assets/libs/functions.php';
  include_once 'assets/libs/tables.config.php';
  session_start();
  $session = new Session();
  $userid = $_REQUEST['userid'];
  $amttowards = $_REQUEST['amounttowards'];
  $mode = $_REQUEST['mode'];
  $date = date("Y-m-d");
  $reason = $_REQUEST['towards'];
  $id = $_REQUEST['id'];
  if ($mode == "add"){
  global $database, $db;
  $qry_update = "INSERT INTO `" . TBL_VOUCHER . "` (`userid`, `amttowards`, `date`, `reason`) VALUES 
  	
  					                                          ('" . $userid . "','" . $amttowards . "','" . $date . "','" . $reason . "');";
  $result_upload = $database->query($qry_update);
  
  if ($result_upload > 0)
  	{
  	$_SESSION["msg"] = "Insert successfully!.";
  	redirect_to('voucher_manage.php');
  	}
    else
  	{
  	$_SESSION["error"] = "Insert failed!.";
  	redirect_to('voucher_manage.php');
  	}
  }
	if ($_GET['mode'] == "status")
	{
	global $database, $db;
	$qry_update = "UPDATE  `" . TBL_VOUCHER . "` SET status='" . $_GET['sid'] . "' WHERE id='" . $_GET['id'] . "';";
	$result_upload = $database->query($qry_update);
	if ($result_upload > 0)
		{
		$_SESSION["msg"] = "Upadate successfully!.";
		redirect_to('voucher_manage2.php');
		}
	  else
		{
		$_SESSION["error"] = "Upadate failed!.";
		redirect_to('voucher_manage2_manage.php');
		}
	}
  
  ?>
