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

		<section id="resume" ng-app="its" ng-controller="jobSearchCtrl">

			<div class="row text-center">
					<div class="col-sm-12">
						<h1 style="font-size:38px;">find jobs</h1>
						<h4>There is no better place to start</h4>
						<!--div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="#" class="btn btn-primary">Sign In</a></p>
						</div-->
					</div>
			</div><br><br><br><br><br>


			<div class="container" ng-init="load()">

				<form name="searchform">
                    <div class="col-sm-12 well" style="margin-bottom:20px;">
              
                      
                      <div class="row col-sm-5"><selectize config='myConfig' class="search" options='myOptions' ng-model="search.options" required></selectize></div>
                      <div class="row col-sm-3"><selectize config='myConfig1' class="search" options='cities' ng-model="search.location"></selectize></div>
                      <div class="row col-sm-2"><selectize config='myConfig2' class="search" options='exp' ng-model="search.experience" required></selectize></div>
                      <div class="row col-sm-2"><selectize config='myConfig3' class="search" options='salary' ng-model="search.salary"></selectize></div>  
                      <div class="row" >
                        <button class="btn btn-primary" type="button" ng-click="searchJob(searchform.$valid)" style="line-height:2.3;width:120px;" ng-disabled="!search.options || !search.experience"><span class="glyphicon glyphicon-search"></span>Search</button>    
                      </div>
                    

                  </div><br><br>
                </form>
            </div>
			
			 <img src="" id="searchloader" >
					
					

					  

					  <div>

					    <!-- <div class="container">
					      <div class="panel panel-primary">
					        <div class="panel-body">
					        <div class="col-sm-3">
					          <strong><b>{{list_describer.start}}-{{list_describer.stop}} of {{result_obj.data.length}}</b></strong>
					        </div>
					        <div class="col-sm-6 text-center"> 
					          <h3 style="margin:4px;">jobs</h3>
					        </div>
					        <div class="col-sm-3" style="text-align: right;">
					          <label>show:</label>
					          <input type="text" ng-model="list_describer.start" class="listsetter">
					          -
					          <input type="text" ng-model="list_describer.stop" class="listsetter">
					        </div>  
					        </div>
					      </div>
					    </div> -->

					        

					        <div class="text-center" ng-if="result_obj.check==0">
					          <p><b>No match found...</b></p>
					        </div>
					
					

					<div class="jobresult">
					  <div class="container"  ng-repeat="x in result_obj.data | limitTo : list.stop : list.start" >

					        <div class="row">
					          <div class="col-sm-12">



					            <div class="jobs">
					              
					              <a href="job_details.php?id={{x.job_id}}"  class="featured applied">
					                <div class="row">
					                  <div class="col-lg-1 col-md-1 hidden-sm hidden-xs text-center">
					                    
					                      <img src='uploads/{{x.logo_name}}' class='img-responsive' ng-if="x.logo_name"><br>
					                      <h6 ng-if="!x.logo_name">{{x.company_name}}</h6>

					                     
					                  </div>
					                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 job-title">
					                    <h5>{{x.role_title}}</h5>
					                    <p><strong>{{x.department}}</strong></p><br>  
					                    <p>Posted <b>{{x.posted_on}}</b> </p>
					                  </div>
					                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 ">
					                    
					                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<strong style="text-transform:capitalize;" >  {{x.job_loc}}{{x.location_outside}}</strong></p>
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
					      <div class="container" ng-if="result_obj.check >= 20">
					      	<div class="col-sm-12">
					      		<br><span class="col-sm-4"><button class="btn btn-danger" ng-click="prev()" ng-if="list.start >= 20" style="float:left;">Previous</button></span>
					      		<span class="col-sm-4 text-center">{{list.start + 1}}-{{list.start + 20}} of {{result_obj.check}}</span>
					      		<span class="col-sm-4"><button class="btn btn-danger" ng-click="next()" ng-if="list.start < result_obj.check - 20" style="float:right;">Next</button></span>
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