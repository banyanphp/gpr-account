<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session= new Session();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Gpr Travels | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="assets/img/login-bg/bg-p.jpg" data-id="login-cover-image" alt="" />
                </div>
				</div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <!--<span class="logo"></span> -->Gpr Travels
                        <small>Accounts</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
				    <?php if($_SESSION["error"] != "") { ?>
					<div class="alert alert-danger fade in m-b-15">
								<?php echo $_SESSION["error"]; ?>
								<span class="close" data-dismiss="alert">&times;</span>
					</div>
				<?php } ?>
                    <form action="login_process.php" method="POST" class="margin-bottom-0" id="login" name="login">
                         <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" placeholder="Email Address" name="mail" id="mail"  />
							<span id="ErrorWarning" class="error" style="display:none">Invalide Email Id</span>
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control input-lg" placeholder="Password" name="password" id="password" onclick="search_func(this.value);"/>
                        </div>
                        <div class="form-group m-b-15">
						<select class="form-control input-lg" name="branch" id="branch" >
						  <option value="" >Choose Branch</option>
						  <?php
							global $database, $db;
							  $qry="SELECT DISTINCT id,branch from `".TBL_BRANCH."`";
							  $result = $database->query( $qry );
							  while($row = $database->fetch_array( $result ))
							{
							?>
						  <option value=<?php echo $row['id'];?> ><?php echo $row['branch']; ?></option>
						  <?php } ?>
						</select>
						</div>
                        <div class="login-buttons">
                            <a href="#" id="error1" type="" class="btn btn-success disabled btn-block btn-lg" style="display:none">Sign me in</a>
                            <button id="error" type="submit" class="btn btn-success btn-block btn-lg" style="display:block">Sign me in</button>
                        </div>
						<p class="text-center text-inverse">
                            &copy; Gpr All Right Reserved 2016
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
       
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script language="javascript">
	
function search_func(value)
{
	
            var mail  = $("#mail").val(); 
			$.ajax({
				
						url:"assets/libs/ajaxphp/patintreg.php",
						data: {'fn':'loginForm','mail_id':mail},
						type:'post',
						async: false,
						dataType:'json',						
						success:function (response) 
						{	
						
							console.log(response);
							if (response==0) {			
								$('#ErrorWarning').css('display','block');
								$('#error').css('display','none');									
								$('#error1').css('display','block');									
								
							}
							else {	
                                $('#ErrorWarning').css('display','none');
								$('#error1').css('display','none');
								$('#error').css('display','block');
								return true;							
							}
						},
						error:function(response){
							console.log(response);
						}
						});	
}
</script>
	<script type="text/javascript" src="assets/js/jquery-validation/jquery.validate.js"></script>
	<script>
        $().ready(function() {
        	$.validator.addMethod("alphabetOnly", function(value, element) {
                return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
            }, "Text must contain only alphabets.");
            
     		 $.validator.addMethod("numberOnly", function(value, element) {
                 return this.optional(element) || /^[0-9\-\s]+$/i.test(value);
             }, "Text must contain only letters, numbers, or dashes.");

             $.validator.addMethod("mobile", function(value, element) {
    				return this.optional(element) || /^[0-9\-\+\s]+$/i.test(value);
    			}, "Plese give the correct patten number");
				$.validator.addMethod("moc", function(value, element) {
    				return this.optional(element) || /^[a-z\-\+\s]+$/i.test(value);
    			}, "Plese give the correct patten number");
           
        	$("#login").validate({
				rules: {
					mail : {
						required:true
				            },
							password : {
						required:true
				            }
							
				      },
		      messages: {
		    	  mail: {
						required: "Enter The Email Id"
				        },
				password: {
						required: "Enter The Password"
				        }
			            }
		
        });
        });
   
        </script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
<?php unset($_SESSION['msg']);
      unset($_SESSION['error']);
?>