<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employer.php"); 
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
			
				<div class="container">
					<div class="jumbotron text-center"style="margin-top:0px;">
						<h1 style="font-size:34px;">Tell us about you</h1>
						<h4>you are </h4><br><br><br>
						<div class="row">
							<div class="col-sm-6 ">

								<a href="signup-employer.php"><img src="images/1466098131_1.png" ><div><h4><b>COMPANY PROFESSIONAL</b></h4></div></a>
								<!-- <p class="help-block">I have at least 1 month of work experience</p> -->
							</div>
							<div class="col-sm-6 ">

							<!-- 	<a href="emp_prof1.php"><img src="images/1466102498_avatar-03.png" id="emptype"><div></div><h4><b>FRESHER</b></h4></div></a> -->
							<a href="signup-recruiter.php"><img src="images/Recruiter-Blog.jpg" class="img-circle" style="height: 150px;width: 150px;" ><div><h4><b>RECRUITER</b></h4></div></a>

								<!-- <p class="help-block">I have just graduated/I haven't worked after graduation</p> -->
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

