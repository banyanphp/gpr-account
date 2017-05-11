<?php

error_reporting (E_ALL ^ E_NOTICE);
include_once '../class.database.php';
include_once '../class.session.php';
include_once '../functions.php';
include_once '../tables.config.php';
session_start();
$session= new Session();

global $database, $db;

	$post_code=$_POST['post_code'];
	$doctor_category=$_POST['doctor_category'];
	$doctor_id=$_POST['doctor_name'];
	$slot_no=$_POST['slot_no'];
	$date=$_POST['date'];
		
		
		 global $database, $db;
		 
		 $slect_delete="SELECT s_no,status FROM `".TBL_PATIENT_APPOINTMENT."` WHERE  date = '".$date."' and doctor_id = '".$doctor_id."' and created_by = '".$_SESSION['healthconnect_id']."'  and status != 2";
		 $result_delete = $database->query( $slect_delete );	
		 $row_delete = $database->fetch_array( $result_delete );
		 
		$count_delete = $database->num_rows($result_delete);
		if($count_delete > 0)
		{
		 $qry_update1="DELETE FROM `".TBL_PATIENT_APPOINTMENT."` WHERE `s_no`='".$row_delete['s_no']."'";
		 $result_upload1 = $database->query( $qry_update1 );	
		
		}
			
			 
		
		
		 
		 
			$qry_update="INSERT INTO `".TBL_PATIENT_APPOINTMENT."` (`post_code`, `doctor_category`, `doctor_id`, `date`,`slot_no`, `created_dt`, `created_by`) VALUES 
			                                                       ('".$post_code."','".$doctor_category."','".$doctor_id."','".$date."','".$slot_no."',now(),'".$_SESSION['healthconnect_id']."');";
		 
             
		
			$result_upload = $database->query( $qry_update );	
			if($result_upload >0)
              {
				
				   $stmt = "SELECT slot_no ,slot from `".TBL_DOCTER_SLOT."` where healthconnect_id='".$doctor_id."'";
    
	$result = $database->query( $stmt );
	
	while($row = $database->fetch_array( $result ))
	{
		$slot_no = $row['slot_no']; 
		//echo $slot_no;
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
	?>
	<input type="hidden" name="status" id="status" value="1">
	<?php
			  }
	?>
	
            
		
