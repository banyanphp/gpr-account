<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session= new Session();


$group_name=$_REQUEST['groupname'];
$mode=$_REQUEST['mode'];
$id=$_REQUEST['id'];

if($mode == "add")
	{
		 global $database, $db;
    $qry_update="INSERT INTO `".TBL_GROUP."` (`group_name`, `created_by`) VALUES 
	
					                                          ('".$group_name."','".$_SESSION['email']."');";

   

    $result_upload = $database->query( $qry_update );
	
	
	
	
            if($result_upload >0)
            {
				$_SESSION["msg"]="Insert successfully!.";
				redirect_to('group.php');
			}
			else
			{
				
				$_SESSION["error"]="Insert failed!.";
				redirect_to('group.php');
			}
	
	}
	
	if($_GET['mode'] == "status")
	{
		

		 global $database, $db;
    $qry_update="UPDATE  `".TBL_GROUP."` SET status='".$_GET['sid']."' WHERE id='".$_GET['id']."';";


   
    $result_upload = $database->query( $qry_update );
	
	
	
	
            if($result_upload >0)
            {
				$_SESSION["msg"]="Upadate successfully!.";
				redirect_to('group.php');
			}
			else
			{
				
				$_SESSION["error"]="Upadate failed!.";
				redirect_to('group.php');
			}
	
	}
	if($mode == "edit")
	{
		

		 global $database, $db;
    $qry_update="UPDATE  `".TBL_GROUP."` SET group_name='".$group_name."' WHERE id='".$id."';";

   
    $result_upload = $database->query( $qry_update );
	
	
	
	
            if($result_upload >0)
            {
				$_SESSION["msg"]="Upadate successfully!.";
				redirect_to('group.php');
			}
			else
			{
				
				$_SESSION["error"]="Upadate failed!.";
				redirect_to('group.php');
			}
	
	}
                                     			
?>