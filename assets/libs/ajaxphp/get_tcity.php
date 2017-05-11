<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
include_once '../class.database.php';
include_once '../functions.php';
global $database, $db;

	$id=$_POST['id'];
		
	$qry="SELECT id,city_name from `".AZ_CITY."` WHERE id !=$id and status=1";
    
	$result = $database->query( $qry );
	?>
	<option value=" "> Choose To City</option>
	
	<?php
	while($row = $database->fetch_array( $result ))
	{
		?>
        	<option value="<?php echo $row['id']; ?>"><?php echo $row['city_name']; ?></option>
        <?php
	}

?>