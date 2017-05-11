<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
	
	
		$slot_no = $row['slot_no']; 
		//echo $slot_no;
		$sql_ck_query = "SELECT DISTINCT date  from `".TBL_PATIENT_APPOINTMENT."` where doctor_id = '".$id."'";
		//echo $sql_ck_query;
		$result_ck = $database->query( $sql_ck_query );
		
		?>
			<script>
	
	
			var events = [
			
                <?php 
				while($row = $database->fetch_array( $count_ck ))
		{
			?>
			
				[
					'2/' + month + '/' + year,
					'Popover Title',
					'#',
					'#00acac',
					'Some contents here'
				],
				[
					'5/12/2100',
					'Tooltip with link',
					'http://www.seantheme.com/color-admin-v1.3',
					'#2d353c'
				],
				
			];
			

	</script>
			
			<?php
			
		}
//TBL_PATIENT_APPOINTMENT SELECT COUNT(1) AS entries, DATE(date) as date1 FROM healthconnect.tbl_patient_appointment where doctor_id='HCPTIQYRN' ;
?>