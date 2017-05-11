<?php

error_reporting (E_ALL ^ E_NOTICE);
include_once '../class.database.php';
include_once '../class.session.php';
include_once '../functions.php';
include_once '../tables.config.php';
session_start();
$session= new Session();

global $database, $db;

	$comments=$_POST['comments'];
	$last_id=$_POST['last_id'];
	$id=$_POST['id'];
	
	
	
	if($last_id == "")
	{
	
		
		
		 global $database, $db;
		 
		
		 
    global $database, $db;
    $qry_update="INSERT INTO `".TBL_DOCTOR_TESTLIST."` (`appiontment_idfk`, `comments`, `created_by`) VALUES 
	
					                                          ('".$_SESSION['apid']."','".$comments."','".$_SESSION['healthconnect_id']."');";

    $result_upload = $database->query( $qry_update );
    $last_id=$database->insert_id();




if($result_upload >0)
{ ?>
                                <div class="row"> 
									<div class="form-group">
										
										<label class="col-md-2 control-label">Lab Comments</label>
										<div class="col-md-6">
											<?php echo $comments; ?>
										</div> 
									</div> 
                                </div> 
								
								
								 <div class="form-group">
                                    <label class="col-md-9 control-label"></label>
                                    <div class="col-md-9">
                                        <a href="javascript:void(0);" onclick="testlist('<?php echo $last_id; ?>');" class="btn btn-sm btn-success" style="float: right;margin-right: 11%;">Edit</a>
										
    
                                    </div>
                                </div>
<?php }
else
{ ?>

                                <div class="row"> 
									<div class="form-group">
										
										<label class="col-md-2 control-label">Lab Comments</label>
										<div class="col-md-6">
											<textarea rows="10" name="comments" class="form-control" id="comments" ><?php echo $row['comments']; ?></textarea>
										</div> 
									</div> 
                                </div> 
								
								
								 <div class="form-group">
                                    <label class="col-md-9 control-label"></label>
                                    <div class="col-md-9">
                                        <a href="javascript:void(0);" onclick="testlist();" class="btn btn-sm btn-success" style="float: right;margin-right: 11%;">Submit</a>
										
    
                                    </div>
                                </div>
<?php }
	}
	else if($last_id != "")
	{
		

		$sel_observation ="SELECT * FROM `".TBL_DOCTOR_TESTLIST."` WHERE id = $last_id";
		
		$result_sel = $database->query( $sel_observation );
		$row = $database->fetch_array ($result_sel);
		?>

                                <div class="row"> 
									<div class="form-group">
										
										<label class="col-md-2 control-label">Lab Comments</label>
										<div class="col-md-6">
											<textarea rows="10" name="comments" class="form-control" id="comments" ><?php echo $row['comments']; ?></textarea>
										</div> 
									</div> 
                                </div> 
								
								
								 <div class="form-group">
                                    <label class="col-md-9 control-label"></label>
                                    <div class="col-md-9">
                                        <a href="javascript:void(0);" onclick="testlistedit(<?php echo $last_id; ?>);" class="btn btn-sm btn-success" style="float: right;margin-right: 11%;">Submit</a>
										
    
                                    </div>
                                </div>
								<?php 
	}
?>