<?php

error_reporting (E_ALL ^ E_NOTICE);
include_once '../class.database.php';
include_once '../class.session.php';
include_once '../functions.php';
include_once '../tables.config.php';
session_start();
$session= new Session();

global $database, $db;

	$observation=$_POST['observation'];
	$last_id=$_POST['last_id'];
	

	
		
		
		 global $database, $db;
		 
		
		 
    global $database, $db;
    $qry_update="UPDATE `".TBL_OBSERVATION."` SET observation='".$observation."', created_by='".$_SESSION['healthconnect_id']."', created_dt=now()  WHERE id='".$last_id."';";

    $result_upload = $database->query( $qry_update );




if($result_upload >0)
{ ?>
   	<div class="row"> 
									<div class="form-group">
										
										<label class="col-md-2 control-label">Observation</label>
										<div class="col-md-6">
											<p id="observation"><?php echo $observation; ?></p>
										</div> 
									</div> 
                                </div> 
								
								
								 <div class="form-group">
                                    <label class="col-md-9 control-label"></label>
                                    <div class="col-md-9">
                                        <a href="javascript:void(0);" onclick="submitfun(<?php echo $last_id; ?>);" class="btn btn-sm btn-success" style="float: right;margin-right: 11%;">Edit</a>
										
    
                                    </div>
                                </div>
<?php }
else
{ ?>

  	<div class="row"> 
									<div class="form-group">
										
										<label class="col-md-2 control-label">Observation</label>
										<div class="col-md-6">
											<textarea rows="10" name="observation" class="form-control" id="observation" ><?php echo $observation; ?></textarea>
										</div> 
									</div> 
                                </div> 
								
								
								 <div class="form-group">
                                    <label class="col-md-9 control-label"></label>
                                     <div class="col-md-9">
                                        <a href="javascript:void(0);" onclick="observationeditfun(<?php echo $last_id; ?>);" class="btn btn-sm btn-success" style="float: right;margin-right: 11%;">Submit</a>
										
    
                                    </div>
                                </div>
<?php }

	
?>