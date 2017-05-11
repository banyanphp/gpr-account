<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
	$date=$_POST['date'];
		
	$stmt = "SELECT slot_no ,slot from `".TBL_DOCTER_SLOT."` where healthconnect_id='".$id."'";
   
	$result = $database->query( $stmt );
	
	while($row = $database->fetch_array( $result ))
	{
		$slot_no = $row['slot_no']; 
		
		$sql_ck_query = "SELECT slot_no,status  from `".TBL_PATIENT_APPOINTMENT."` where date = '".$date."' and slot_no = '".$slot_no."'";
		//echo $sql_ck_query;
		$result_ck = $database->query( $sql_ck_query );
		
		$row_ck = $database->fetch_array( $result_ck );
		$count_ck = $database->num_rows($result_ck);
	
		if($count_ck > 0 && $row_ck['status']==1)
		{
			
			?>
	<div class="col-md-2">
		
		<a href="javascript:void(0)" class="list-group-item text-ellipsis disabled" style="margin-bottom: 10px;">
											<span class="badge badge-danger "> <?php echo $row['slot'];?></span>
										</a> 
        	</div>
	<?php 
	}
	else if($count_ck > 0 && $row_ck['status']==0)
	{ ?>
     <div class="col-md-2">
		
		<a href="javascript:void(0)" class="list-group-item text-ellipsis disabled" style="margin-bottom: 10px;">
											<span class="badge badge-warning "> <?php echo $row['slot']; ?></span>
										</a> 
        	</div>
<?php }else
	{?>
<div class="col-md-2">
		
		<a  href="javascript:void(0);" onclick="submitfun('<?php echo $row['slot_no']; ?>');" class="list-group-item text-ellipsis" style="margin-bottom: 10px;">
											<span class="badge badge-success"> <?php echo $row['slot']; ?></span>
										</a> 
        	</div>
<?php 
}
	?>
		
		
		
		<?php
		
	}
//TBL_PATIENT_APPOINTMENT
?>