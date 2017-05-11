<?php
session_start();
include_once 'assets/libs/class.authendicate.php' ;
    $fullname	= $_REQUEST['mail'];
	$password	= $_REQUEST['password'];
    //error_reporting(E_ALL);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//ini_set('display_errors', '1');
	$errors = array();
       // $_SESSION["success"]=false;
       //$_SESSION["error"]=true;
	if( $fullname == '' || $password == '' || empty( $fullname) || empty($password) )
	{
		
		//$_SESSION["msg"]= "User name or password cant be empty";
		header('Location:index.php');
		exit;
	}
        	//if they are no errors then process the login page
	else 
	{
            $has_user_been_found = Emp_Authendicate::authenticate( $fullname, $password );
			 //$errors["user_details"]=$has_user_been_found;
            if( $has_user_been_found )
		{
			
                include_once 'assets/libs/class.session.php';
               $session = new Session();
              
               $session->set_session($has_user_been_found);
              
              // if($has_user_been_found["isactive"]==1)
               //{
				  
               // $session->set_admin_permission();
                  
               //}
			   
                global $database, $db;
			
	$qry_update="UPDATE `".TBL_ADMIN."` SET `last_login`= NOW() WHERE `id`='".$has_user_been_found["id"]."' ";
	$result_upload = $database->query( $qry_update );
	   
                $errors["success"]=true;
                $errors["error"]=false;
           $_SESSION['Login']=2;
		   $sel = "select id,email from `".TBL_ADMIN."`  where `id`='".$has_user_been_found["id"]."'";
		  
			$result = $database->query( $sel );
			$row = $database->fetch_array( $result );
			 
			 $_SESSION['email']= $row['email'];
			 $_SESSION['adminid']= $row['id'];
		
		header('Location:dashboard.php');
		exit;
		//print_r($_SESSION['UsrPermission']);
                }
				else {
            	$_SESSION["error"]= "Invalid Credentials!!";
				header('Location:index.php');
                exit;
            }
          
        }
       //echo json_encode($errors);  
       ?>