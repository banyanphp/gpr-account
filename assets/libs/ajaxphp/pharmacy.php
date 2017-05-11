<?php

error_reporting (E_ALL ^ E_NOTICE);
include_once '../class.database.php';
include_once '../class.session.php';
include_once '../functions.php';
include_once '../tables.config.php';
session_start();
$session= new Session();

global $database, $db;

	$item=$_POST['item'];
	$qry=$_POST['qry'];
	$dosage=$_POST['dosage'];
	$appilcation=$_POST['application'];
	$mode=$_POST['mode'];
	$id=$_POST['id'];
	$delete_id=$_POST['delete_id'];
	echo $mode;
	if($mode == "add")
	{
		 global $database, $db;
    $qry_update="INSERT INTO `".TBL_DOCTOR_PRESCRIPTION."` (`appointment_idfk`, `healthconnect_id`, `item`, `qry`, `dosage`, `appilcation`, `created_by`) VALUES 
	
					                                          ('".$_SESSION['apid']."','".$id."','".$item."','".$qry."','".$dosage."','".$appilcation."','".$_SESSION['healthconnect_id']."');";

   

    $result_upload = $database->query( $qry_update );
	
	if($result_upload >0)
	{ ?>
		                           <?php 
								global $database, $db;
								$stmt = "SELECT * from `".TBL_DOCTOR_PRESCRIPTION."` WHERE 	appointment_idfk ='".$_SESSION['apid']."'";
								
								
								
								$result = $database->query( $stmt );
								
								
									$j=1;
									while($row = $database->fetch_array($result))
														
                                                        { ?>
									 <tr>
                                        
                                        <td>
										<?php echo $row['item']; ?>
										</td>
										<td>
										<?php echo $row['qry']; ?>
										</td>
										<td>
										<?php echo $row['dosage']; ?>
										</td>
										<td>
										<?php echo $row['appilcation']; ?>
										</td>
										
                                      
										 <td><a  href="javascript:void(0);" onclick="pharmacydelete(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">Delete</a></td>
                                     </tr>
                                                          
									                    
														<?php $j++; } ?>
                                    <tr>
                                        
                                    <tr>
                                        
                                        <td>
										<div class="col-md-12">
                                            <div><input type="text" class="form-control" name="item" id="item"></div>
										 </div></td>
										 <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="qry" id="qry"></div>
										 </div>
										</td>
                                       
									   <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="dosage" id="dosage"></div>
										 </div></td>
										
										 
										 
										 <td><div class="col-md-12">
                                            <div><textarea name="application" id="application" class="form-control"></textarea> </div>
										 </div></td> 
										 
										 <td>
										 <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="id">
										 <a  href="javascript:void(0);" onclick="pharmacyadd();" class="btn btn-sm btn-success">Add</a></td>
                                         
                                    </tr>
                                 
									
	<?php }
	else
	{
?>
		                               <tr>
                                        
                                        <td>
										<div class="col-md-12">
                                            <div><input type="text" class="form-control" name="item" id="item"></div>
										 </div></td>
										 <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="qry" id="qry"></div>
										 </div>
										</td>
                                       
									   <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="dosage" id="dosage"></div>
										 </div></td>
										
										 
										 
										 <td><div class="col-md-12">
                                            <div><textarea name="application" id="application" class="form-control"></textarea> </div>
										 </div></td> 
										 
										 <td>
										 <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="id">
										 <a  href="javascript:void(0);" onclick="pharmacyadd();" class="btn btn-sm btn-success">Add</a></td>
                                         
                                    </tr>
	<?php 
	}
	}else
    {
		 $qry_delete="DELETE FROM `".TBL_DOCTOR_PRESCRIPTION."` WHERE id ='".$delete_id."'";
      
         $result_delete = $database->query( $qry_delete );
	
	     if($result_delete >0)
		 { ?>
			   <?php 
								global $database, $db;
								$stmt = "SELECT * from `".TBL_DOCTOR_PRESCRIPTION."` WHERE 	appointment_idfk ='".$_SESSION['apid']."'";
								
								
								
								$result = $database->query( $stmt );
								
								
									$j=1;
									while($row = $database->fetch_array($result))
														
                                                        { ?>
									 <tr>
                                        
                                        <td>
										<?php echo $row['item']; ?>
										</td>
										<td>
										<?php echo $row['qry']; ?>
										</td>
										<td>
										<?php echo $row['dosage']; ?>
										</td>
										<td>
										<?php echo $row['appilcation']; ?>
										</td>
										
                                      
										 <td><a  href="javascript:void(0);" onclick="pharmacydelete(<?php echo $row['id']; ?>);" class="btn btn-sm btn-danger">Delete</a></td>
                                     </tr>
                                                          
									                    
														<?php $j++; } ?>
                                    <tr>
                                        
                                    <tr>
                                        
                                        <td>
										<div class="col-md-12">
                                            <div><input type="text" class="form-control" name="item" id="item"></div>
										 </div></td>
										 <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="qry" id="qry"></div>
										 </div>
										</td>
                                       
									   <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="dosage" id="dosage"></div>
										 </div></td>
										
										 
										 
										 <td><div class="col-md-12">
                                            <div><textarea name="application" id="application" class="form-control"></textarea> </div>
										 </div></td> 
										 
										 <td>
										 <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="id">
										 <a  href="javascript:void(0);" onclick="pharmacyadd();" class="btn btn-sm btn-success">Add</a></td>
                                         
                                    </tr>
		<?php } else { ?>
		       <tr>
                                        
                                        <td>
										<div class="col-md-12">
                                            <div><input type="text" class="form-control" name="item" id="item"></div>
										 </div></td>
										 <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="qry" id="qry"></div>
										 </div>
										</td>
                                       
									   <td><div class="col-md-12">
                                            <div><input type="text" class="form-control" name="dosage" id="dosage"></div>
										 </div></td>
										
										 
										 
										 <td><div class="col-md-12">
                                            <div><textarea name="application" id="application" class="form-control"></textarea> </div>
										 </div></td> 
										 
										 <td>
										 <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="id">
										 <a  href="javascript:void(0);" onclick="pharmacyadd();" class="btn btn-sm btn-success">Add</a></td>
                                         
                                    </tr>
	
		
	<?php }	

	}
		
	
?>