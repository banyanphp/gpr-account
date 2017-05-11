<?php

error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once 'class.database.php';
include_once 'functions.php';
    
	$country = $_REQUEST['country'];
	
	if( !empty($country) )
	{
		$action = $_REQUEST['action'];
		
		/* if( allow_country_state == 1 )
			$states = $_REQUEST['states']; */
			
		if($action == 'state' )
		{
			//$countryid=$_REQUEST['country'];
			  global $database, $db;
              $qry="SELECT * from `".TBL_STATES."` where countryISO2FK ='".$country."'";
              //echo $qry;
              $result = $database->query( $qry );
              $row = $database->fetch_array( $result );
              $arr = array();
              
               
              
              
				if( $row )
				{
					$select_state = '<select class="form-control" onchange="getCountryCity()" name="udf5" id="txt_countryStatesFK">';
					$select_state .= '<option value="">Select State</option>';
					while($row = $database->fetch_array( $result ))
	              	{
		              	$arr[] = $row ;
		              	$select_state .= '<option value="'.$row['code'].'">'.$row['name'].'</option>';
              		} 
					$select_state .= '</select>';
				}
				else
				{
					$select_state .= '<input type="text" class="form-control" id="txt_countryStatesFK" name="udf5" />';
				}
				
				echo $select_state;
		}
		elseif($action == 'city')
		{
			/**
			 *if the request is for city then do this
				*/
			$country = $_REQUEST['country'];
			$state = $_REQUEST['states'];
			
			global $database, $db;
              $qry1="SELECT * from `".TBL_CITY."` where statesCodeFK ='".$state."' AND countryISO2FK='".$country."'";
              //echo $qry;
              $result1 = $database->query( $qry1 );
              $row1 = $database->fetch_array( $result1 );
              $arr = array();
				if( $row1 )
				{
					$select_city = '<select class="form-control" name="udf4" id="txt_city">';
					$select_city .= '<option value="">Select city</option>';
					while($row1 = $database->fetch_array( $result1 ))
	              	{
		              	$arr[] = $row1 ;
		              	$select_state .= '<option value="'.$row1['code'].'">'.$row1['name'].'</option>';
              		}
              		$select_city .= $select_state ;
					$select_city .= '</select>';
				}
				else
				{
					$select_city .= '<input type="text" class="form-control" id="txt_city" name="udf4" />';
				}
				
				echo $select_city;
		}
		
	}
?>