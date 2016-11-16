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
	<body ng-app="its" ng-controller="login">

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section id="resume" ng-init="load()">


      <div id="changeModal" class="modal fade">
        <div class="modal-dialog" style="margin-top: 10%;">
          <div class="modal-content">
            <!-- dialog body -->
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              Changes has been updated
            </div>
            <!-- dialog buttons -->
            
          </div>
        </div>
      </div>
			
		  <div class="container">
        <div class="col-sm-6 col-sm-offset-3 panel panel-default ">
          <div class="row">
          <div class="panel-heading text-center">
            <h1>My Profile</h1>
          </div>

          <div class="panel-body">

            <div class="text-center">
              <h5>You are a </h5>
              <h3 style="margin-top:0px">{{prof.type}}</h3>


            </div>
            <form name="myprofile" class="form-group">
            <div>
              <label>Name :</label>
              <input type="text" class="form-control" ng-model="prof.name" required>
            </div>

            <div>
              <label>Email :</label>
              <input type="text" class="form-control" ng-model="prof.user" required>
            </div>

            <div>
              <label>Phone Number :</label>
              <input type="text" class="form-control" ng-model="prof.phoneno" required>
            </div>


            <div class="col-sm-12 text-right">
              <a ng-if="!prof.change" ng-click="prof.change=true">Change password</a>
              <a ng-if="prof.change==true" ng-click="prof.change=false">Undo</a>
            </div>

            <div ng-if="prof.change==true">
              
             <div>
              <label>Old Password :</label>
              <input type="password" class="form-control" ng-model="prof.pass" required>
               <span id="passerr" style="color: red; display:none;">Password is incorrect</span>
            </div>

             <div>
              <label>New Password :</label>
              <input type="password" class="form-control" ng-model="prof.newpass" ng-minlength="6" required>
            </div>

            <div>
              <label>Confirm Password :</label>
              <input type="password" class="form-control" ng-model="prof.confirmpass" required>
              <span id="confirmpasserr" style="color: red; display:none;">Password is not matched</span>
            </div>
          
            </form> 
            </div>

             <div class="col-sm-12 text-center">
                <br><button type="submit" class="btn btn-primary" ng-click="save_profile(myprofile.$valid)">Save changes</button>
            </div>
            
           </div>
          </div>
        </div>
      </div>



		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		<?php include('include/footer.php'); ?>

	</body>
</html>