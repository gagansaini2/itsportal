<?php include('include/common_includes.php');  ?>
<?php 
require_once("class/class.employee.php"); 
require_once("class/class.jobs.php");

$user_obj1=new employee();
$job_obj=new jobs();

 ?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Jobseek - Job Board Responsive HTML Template">
		<meta name="author" content="Coffeecream Themes, info@coffeecream.eu">
		<title>its</title>
		<link rel="shortcut icon" href="images/favicon.png">

		<!-- Main Stylesheet -->
		<link href="css/style.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section id="resume">

			<div class="modal fade" id="abc" data-backdrop="static" role="dialog">
			    <div class="modal-dialog" style="margin-top:200px;">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header  text-center">
			          
			          <h3 class="modal-title">You have successfully applied to this job.</h3>
			        </div>
			       
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default"><a href="jobslist.php">See More Jobs</a></button>

			         
			        </div>
			      </div>
			      
			    </div>
			  </div>



			<div ng-app="its" ng-controller="login">
				<div class="modal fade" id="forgot" >
							    <div class="modal-dialog" style="margin-top:200px;">
							    
							      <!-- Modal content-->
							     

							      <div class="modal-content" style="text-align:left;">
							        <div class="modal-header ">
							          
							          <h3 class="modal-title">Enter your Email</h3>
							        </div>
							        
							         <div class="modal-body">
							          <label>Email</label>
							          <input type="email" class="form-control" ng-model="login.email" required><br>
							          <h6 id="recovrmsg" style="display: none;">A recovery password has been send to your email</h6>
							          <span id="idregnot" style="display: none;color:red;">This is not a registered username</span>
							        </div>
							      
							       
							        <div class="modal-footer">
							          <button type="button" class="btn btn-primary" ng-disabled="!login.email" ng-click="forget()">submit</button>

							        </div>
							      </div>
							      
							    </div>
							  </div>
							  


			 <div class="modal fade" id="loginModal"  role="dialog">
			    <div class="modal-dialog" style="margin-top:200px;">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header  text-center" style="background:#14B1D0;">
			          
			          <h3 class="modal-title" style="color:#f7fcfc;">Login</h3>
			        </div>
			        <form>
			        <div class="modal-body text-center" style="background:#f4f4f4;">

			        	<p class="text-center" id="loginerr" style="display:none;">Invalid username or password, please try again</p>
			        	
			        		<div style="padding:15%; padding-top: 50px;padding-bottom:50px;">
			          		<input type="Email" class="form-control" placeholder="Enter your Email ID" ng-model="loginpan.username"><br>
			          		<input type="password" class="form-control" placeholder="Enter your Password" ng-model="loginpan.password"><br><br>

			          		<button type="submit" class="btn btn-primary" ng-disabled="!loginpan.username|| !loginpan.password" ng-click="signin()">Login</button><br><br>
			          		<a ng-click="panelforgot()">Forgot Password?</a>
			          		</div>
			          		
			        </div>
			       </form>
			        
			      </div>
			      
			    </div>
			  </div> 
			</div>


			<?php
				extract($_REQUEST);			
				$job_obj->get_job_details($id);
				
				 ?>



		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		<?php include('include/footer.php'); ?>

	</body>
</html>