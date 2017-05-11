<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
		
	$stmt = "SELECT healthconnect_id,laboratory_name FROM `".TBL_LABORATORY."` WHERE postel_code  = '".$id."'";
   
	$result = $database->query( $stmt );
	?>
	<option value=" "> Select Laboratory</option>
	
	<?php
	while($row = $database->fetch_array( $result ))
	{
		?>
        	
			<option value="<?php echo $row['healthconnect_id']; ?>"><?php echo $row['laboratory_name']; ?></option>
        <?php
	}

?>