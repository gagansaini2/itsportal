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
	<body ng-app="its" ng-controller="jobSearchCtrl">

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section id="resume" ng-init="load()">
			
			

<div  ng-if="search_result" >

  <div class="container"  ng-repeat="x in search_result" >

        <div class="row">
          <div class="col-sm-12">



            <div class="jobs">
              
              <a href="job_details.php?id={{x.job_id}}"  class="featured applied">
                <div class="row">
                  <div class="col-lg-1 col-md-1 hidden-sm hidden-xs text-center">
                    
                      <img src='uploads/{{x.logo_name}}' class='img-responsive' ><br>
                      <h6>{{x.company_name}}</h6>

                     
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 job-title">
                    <h5>{{x.role_title}}</h5>
                    <p><strong>{{x.department}}</strong></p>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 ">
                    
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<strong style="text-transform:capitalize;" >  {{x.job_loc}}</strong></p>
                    <p><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;<strong>{{x.min_experience}} - {{x.max_experience}} years</strong></p>
                  </div>
                  <div class="col-lg-3 col-md-2 col-sm-2 hidden-xs job-type ">
                    <p class="job-salary"><strong><i class="fa fa-rupee"></i>&nbsp;{{x.min_remuneration}} - {{x.max_remuneration}} Lacs</strong></p>
                    <p class="badge full-time">{{x.job_type}}</p>
                  </div>
                  <div class="col-lg-2 visible-lg-block">

                    <p class="job-posted" ng-repeat="item in x.key_skills | limitTo : 4"><strong>{{item}}&nbsp;</strong></p>
                    
                  </div>
                  
                </div>
              </a>
              
              
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