<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
		
	$stmt = "SELECT DISTINCT doctor_category from `".TBL_DOCTER."` as doc LEFT JOIN `".TBL_DOCTER_USER."` as docuse ON doc.healthconnect_id=docuse.healthconnect_id where postel_code=".$id."";
    
	$result = $database->query( $stmt );
	?>
	<option value=" "> Select Category</option>
	
	<?php
	while($row = $database->fetch_array( $result ))
	{
		?>
        	
			<option value="<?php echo $row['doctor_category']; ?>"><?php echo $row['doctor_category']; ?></option>
        <?php
	}

?>