<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
		
	$stmt = "SELECT doc.healthconnect_id as docid,first_name,meddile_name,last_name from `".TBL_DOCTER."` as doc LEFT JOIN `".TBL_DOCTER_USER."` as docuse ON doc.healthconnect_id=docuse.healthconnect_id where doctor_category='".$id."'";
    
	$result = $database->query( $stmt );
	?>
	<option value=" "> Select Doctor Name</option>
	
	<?php
	while($row = $database->fetch_array( $result ))
	{
		?>
        	<option value="<?php echo $row['docid']; ?>"><?php echo $row['first_name']." ".$row['meddile_name']." ".$row['last_name']; ?></option>
        <?php
	}

?>