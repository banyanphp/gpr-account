<?php

error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

if(isset($_POST['fn']) && $_POST['fn'] == 'loginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_PATIENT_USER."` where email='".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}	

if(isset($_POST['fn']) && $_POST['fn'] == 'docterloginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_DOCTER_USER."` where email='".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}
if(isset($_POST['fn']) && $_POST['fn'] == 'clinicloginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_CLINIC_USER."` where email='".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}	
if(isset($_POST['fn']) && $_POST['fn'] == 'insureceloginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_INSURANCE_USER."` where email='".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}	
if(isset($_POST['fn']) && $_POST['fn'] == 'labloginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_LABORATORY_USER."` where email='".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}	
if(isset($_POST['fn']) && $_POST['fn'] == 'pharmacyloginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_PHARMACY_USER."` where email='".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}
if(isset($_POST['fn']) && $_POST['fn'] == 'adminloginForm'){
	$mail =$_POST['mail_id'];
    $qry="SELECT email from `".TBL_ADMIN."` where email like '".$mail."'";	
	$result = $database->query( $qry );
	$row = $database->fetch_array( $result );
	$num = $database->num_rows( $result );
	echo json_encode($num);
}	

	    
?>