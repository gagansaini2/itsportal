<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee.php"); 
//$user_obj1=new employee();

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
							  </div>
			

		

			<?php
				extract($_REQUEST);
					if($submit=='register'){
						$user_obj1->Login_form('server');
					}else{
						$user_obj1->Login_form('local');
					}
				

				 ?>



		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		<?php include('include/footer.php'); ?>

	</body>
</html>
<script >

	launch=function(){
		$("#forgot").modal('show');	
	}
	

</script>