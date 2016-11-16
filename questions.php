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

		<section id="resume" ng-app="its" ng-controller="quesCtrl">
			
			<div class="container">
				<div class="col-sm-12 text-center">
						<h1>Questions</h1><br><br>
						
					</div>

			</div>
			<div class="container">
			
				<div id="text-carousel" class="carousel slide" data-ride="carousel" data-wrap="false" style="height:25em;">
				    <!-- Wrapper for slides -->
				    <div class="row">
				        <div class="col-xs-offset-2 col-xs-6">
				            <div class="carousel-inner" >
				                <div class="item active" style="margin:10em;">
				                    <div class="carousel-content">
				                        <div>
				                            <h3>Answer the Questions </h3>
				                        </div>
				                    </div>
				                </div>
				                <div class="item" ng-repeat="x in hola" style="margin:5em 0 2em 0;">
				                    <div class="carousel-content">
				                        <div>
				                           {{x}}
				                        </div>
				                    </div>
				                </div>
				                 <div class="item">
				                    <div class="carousel-content">
				                        <div>
				                            <p>end</p>
				                        </div>
				                    </div>
				                </div>
				               
				                
				            </div>
				        </div>
				    </div>
				    <!-- Controls --> <a class="left carousel-control" href="#text-carousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				 <a class="right carousel-control" href="#text-carousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>

				</div>
			</div>	









		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		<?php include('include/footer.php'); ?>

	</body>
</html>
<script>
	$('.carousel').carousel({
    interval: false
   
});
</script>