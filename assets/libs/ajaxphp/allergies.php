<?php

error_reporting (E_ALL ^ E_NOTICE);
include_once '../class.database.php';
include_once '../class.session.php';
include_once '../functions.php';
include_once '../tables.config.php';
session_start();
$session= new Session();

global $database, $db;

	$allergies=$_POST['allergies'];
	$mode=$_POST['mode'];
	$id=$_POST['id'];
	$delete_id=$_POST['delete_id'];
	echo $mode;
	if($mode == "add")
	{
		 global $database, $db;
    $qry_update="INSERT INTO `".TBL_ALLERGIES."` (`healthconnect_id`, `alleriges`, `created_by`) VALUES 
	
					                                          ('".$id."','".$allergies."','".$_SESSION['email']."');";

   

    $result_upload = $database->query( $qry_update );
	
	if($result_upload >0)
	{ ?>
		                           <?php 
								global $database, $db;
								$stmt = "SELECT * from `".TBL_ALLERGIES."` WHERE 	healthconnect_id ='".$id."'";
								$result = $database->query( $stmt );
									$j=1;
									while($row = $database->fetch_array($result))
														
                                                        { ?>
									 <tr>
                                        
                                        <td>
										<?php echo $row['alleriges']; ?>
										</td>
										
                                      
										 <td><a  href="javascript:void(0);" onclick="allergiesdeletefun(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">Delete</a></td>
                                     </tr>
                                                          
                                                       
														<?php $j++; } ?>
														  <tr>
                                        
                                        <td>
										<div class="col-md-6">
                                            <div><input type="text"  class="form-control" name="allergies" id="allergies"></div>
										 </div>
										</td>
                                      
										 <td>
										 <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="id">
										 <a  href="javascript:void(0);" onclick="allergiesfun();" class="btn btn-sm btn-success">Add</a></td>
                                     </tr>
									
	<?php }
	else
	{
?>
		                              <tr>
                                        
                                        <td>
										<div class="col-md-6">
                                            <div><input type="text"  class="form-control" name="allergies" id="allergies"></div>
										 </div>
										</td>
                                      
										 <td><a  href="javascript:void(0);" onclick="allergiesfun();" class="btn btn-sm btn-success">Add</a></td>
                                     </tr>
	<?php 
	}
	
	
	
	}else
    {
		 $qry_delete="DELETE FROM `".TBL_ALLERGIES."` WHERE id ='".$delete_id."'";
      
         $result_delete = $database->query( $qry_delete );
	
	     if($result_delete >0)
		 { ?>
			  <?php 
								global $database, $db;
								$stmt = "SELECT * from `".TBL_ALLERGIES."` WHERE 	healthconnect_id ='".$id."'";
								echo $stmt;
								$result = $database->query( $stmt );
									$j=1;
									while($row = $database->fetch_array($result))
														
                                                        { ?>
									 <tr>
                                        
                                        <td>
										 
										<?php echo $row['alleriges']; ?>
										</td>
										
                                      
										 <td><a  href="javascript:void(0);" onclick="allergiesdeletefun(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">Delete</a></td>
                                     </tr>
                                                          
                                                       
														<?php $j++; } ?>
														  <tr>
                                        
                                        <td>
										<div class="col-md-6">
                                            <div><input type="text"  class="form-control" name="allergies" id="allergies"></div>
										 </div>
										</td>
                                      
										 <td>
										 <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="id">
										 <a  href="javascript:void(0);" onclick="allergiesfun();" class="btn btn-sm btn-success">Add</a></td>
                                     </tr>
		<?php } else { ?>
		       <tr>
                                        
                                        <td>
										<div class="col-md-6">
                                            <div><input type="text"  class="form-control" name="allergies" id="allergies"></div>
										 </div>
										</td>
                                      
										 <td><a  href="javascript:void(0);" onclick="allergiesfun();" class="btn btn-sm btn-success">Add</a></td>
                                     </tr>
	
		
	<?php }	

	}
		
	
?>