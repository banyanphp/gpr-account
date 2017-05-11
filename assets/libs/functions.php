<?php

//error_reporting(E_ALL);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//ini_set('display_errors', '1');
include_once 'class.session.php';
include_once 'class.database.php';
if($_SERVER["REQUEST_METHOD"]=="GET")
{
$mode=$_REQUEST["mode"];
}
 function redirect_to($url)
{
    
     header("Location: ".$url);
	// echo "window.location=\"$url\";";
}
 function redirect_to_byscript($url)
{
    
     header("Location: ".$url);
	 echo "<script> window.location=\"".$url."\"; </script>";
	 exit;
}
function log_out()
{
    session_start();
   
    	session_destroy();
    	unset($_SESSION);
    	header("Location: ../../index.php");
   
}
function getAll_activeCategory()
{
    global $database, $db;
    $qry="SELECT category_name FROM ".TBL_CATEGORY." where status='active';";
    $result = $database->query( $qry );
     return $database->db_result_to_array($result);
}
if($mode == "logout")
{
    log_out();
}
if($mode == "NewsFilterBy")
{
$CategoryName=$_REQUEST["CategoryName"];

global $database, $db;
            //$qry="SELECT newsid,news_category,title,language_code,news_content,status from `".TBL_NEWS."` ";
            $qry="SELECT  n.newsid,n.title,n.status,m.media_url,n.updated_dt 
				from `".TBL_NEWS."` n left join `".TBL_MEDIA."` m on m.news_id= n.newsid where n.news_category like '".$CategoryName."' group by n.newsid order by n.updated_dt;";
            $result = $database->query( $qry );
            //echo $qry;
            $news_data = array();
			$i=0;
			while($row = $database->fetch_array( $result )){
				$news_data[$i] = array("newsid"=>$row['newsid'],"news_category"=>$row['news_category'],
				"title"=>$row['title'],"updated_dt"=>$row['updated_dt'],"language_code"=>$row['language_code'],"news_status"=>$row['status'],"media_url"=>$row['media_url']);
				$img_res=$database->query( "select media_url from `".TBL_MEDIA."` where news_id = '".$row['newsid']."';");
                                $news_data[$i]["images"]=$database->db_result_to_array($img_res);
                                $i++;
			}
echo json_encode($news_data);
}
function default_permission()
{
    $per_arr=array(
        "system_settings", 
        "working_shift",
        "working_shift_add",
         "user_groups",
        "user_group_add",
        "user_permission",
        "user_permission_add"
            );
    return $per_arr;
}

//about_update




?>
