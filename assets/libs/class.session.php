<?php

/* 
 * News Magazine
 * 
 */
class Session{
        private $EmpID=0;
		private $employerID=0;
		private $logged_in = false;
		private $username='';
		private $emailAddress='';
		private $accessLevel=0; //1=employee, 3= employer, 5=administrator of site
		private $message='';
function __construct()
		{
			//if ( session_id() == 0 ) {session_start();}
			if ( @ini_get('session.auto_start') == 1 || session_id() == '') session_start();
			
			$this->has_logged_in();
			
		}
public function set_session($uservalue)
{
    $_SESSION['MGZN_Login']=true;
    $_SESSION['MGZN_Userid']=$uservalue["userid"];
    $_SESSION['MGZN_isadmin']=$uservalue["isadmin"];
     $_SESSION['MGZN_username']=$uservalue["username"];
     $_SESSION['MGZN_name']=$uservalue["name"];
    
}
public function set_admin_permission()
{
    if(isset($_SESSION['MGZN_Login']))
    {
        if($_SESSION['MGZN_Login'] == 1)
        {
            global $db, $database;
			$sql = "SELECT employeename FROM ".TBL_ADMIN." WHERE  status='1' and TYPE='Employee'";
			$result = $db->query( $sql );
			//$_SESSION['MGZN_isadmin']=$sql;
			//$permission = array();
                        $permission=$database->db_result_to_array($result);
//			while ( $row = $database->db_result_to_object($result) ) 
//			{
//				//$permission[$row->permission_name]=$row->permission_name;
//				$permission[$row->permission_name]=1;
//			}			
			$_SESSION['UsrPermission']= $permission;
            //return $sql;
        }
    }
}
public function set_user_permission() {
    if(isset($_SESSION['MGZN_Login']))
    {
        if($_SESSION['MGZN_Login'] == 1)
        {
            global $db, $database;
			$sql = "SELECT permission_name FROM ".TBL_USER_PERMISSIONS." WHERE  status='1' and isadmin=0";
			$result = $db->query( $sql );
			$_SESSION['sql']=$sql;
			//$permission = array();
                        $permission=$database->db_result_to_array($result);
//			while ( $row = $database->db_result_to_object($result) ) 
//			{
//				//$permission[$row->permission_name]=$row->permission_name;
//				$permission[$row->permission_name]=1;
//			}			
			$_SESSION['UsrPermission']= $permission;
            
        }
    }
}

public function has_logged_in()
		{
		 /**
		 *  check to see if user logged in
		 */
			if(isset($_SESSION['MGZN_Login']) && isset($_SESSION['MGZN_isadmin']) )
			{
			  return TRUE;
			   
			   
			}
                        else{
                            
                            return false;
			}
		}
 public function session_deleteAll()
{
     session_destroy();
}

    public function check_permission_level($page_id) {
        $permission_level=false;
            foreach ($_SESSION["UsrPermission"] as $attr => $val) {
               //echo $val["permission_name"]."<br />";
                
             if($val["permission_name"] == $page_id)
             {
                    $permission_level=true;
                
             }
         }
         return $permission_level;
//        if (in_array($page_id, $_SESSION["UsrPermission"])) {
//    return true;
//}
//else
//{
//    return false;
//}
        
    }

 
}
