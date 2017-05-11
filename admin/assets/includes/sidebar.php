<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						
						<div class="info">
							<?php $name = explode("@",$_SESSION['email']);
							      echo $name[0];
						    ?>
							<small>Health Connect <?php if($_SESSION['admin_type'] == 1) { echo "Admin"; } else { echo "Sub Admin"; } ?></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					
					<li class="active">
						<a href="dashboard.php">
						   
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
						
					</li>
					
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>