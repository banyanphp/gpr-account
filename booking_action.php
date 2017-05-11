<?php
error_reporting('0');
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'class.php';
session_start();
$session = new Session();
//$customertype = implode(', ', $_POST['mincheck']);
$customertype = $_REQUEST['ctype'];
$customername = $_REQUEST['customername'];
$pnrno = $_REQUEST['pnrno'];
$particulars = $_REQUEST['particulars'];
$remarks = $_REQUEST['remarks'];
$mode = $_REQUEST['mode'];
$btype = $_REQUEST['btype'];
$gtype = $_REQUEST['gtype'];
$vtype = $_POST['vtype'];
$tcktamount = $_REQUEST['tcktamount'];
$id = $_REQUEST['id'];
$date = date("Y-m-d");
if ($mode == "add")
{
global $database, $db;
$qry_update = "INSERT INTO `" . TBL_BOOKING . "` (`customername`,`ctype`, `btype`, `pnrno`, `tcktamount`, `particulars`, `remarks`, `created_dt`, `created_by`, `branch_idfk`) VALUES ('" . $customername . "','" . $customertype . "','" . $btype . "','" . $pnrno . "','" . $tcktamount . "','" . $particulars . "','" . $remarks . "','" . $date . "','" . $_SESSION['EMAIL'] . "','". $_SESSION['branch'] ."');";
$result_upload = $database->query($qry_update);
if ($result_upload)
{
$id = $database->insert_id($qry_update);
if ($btype == "Bus")
{
$sql = "UPDATE  `" . TBL_BOOKING . "` SET gtype='" . $gtype . "' WHERE id='" . $id . "'";
/* $sql = "UPDATE  `" . TBL_ADVANCE . "` SET adv='" . $advance ."'-'". $tcktamount . "' WHERE customername='" . $customername . "';"; */
$upload = $database->query($sql);
}
if ($gtype == "Gpr")
{
$sql = "UPDATE  `" . TBL_BOOKING . "` SET vtype='" . $vtype . "' WHERE id='" . $id . "'";
$upload = $database->query($sql);
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
