<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee1.php"); 
require_once("class/class.jobs.php"); 

$user_obj=new employee1();
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
		<title>ITS Recruitment</title>
		<link rel="shortcut icon" href="images/favicon.png">
		<link rel="stylesheet" href="js/bower_components/selectize/dist/css/selectize.default.css ">
		<!-- <link rel="stylesheet" type="text/css" href="js\bower_components\bootstrap\dist\css\bootstrap.min.css"> -->
		<!-- Main Stylesheet -->
		<!-- <link href="css/style.css" rel="stylesheet"> -->

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		


	</head>
	<body ng-app="its" ng-controller="applicantprof">

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section >

			<div class="container">
				<div class="col-sm-12 text-center">
						<h1>Candidate Profile</h1><br><br>
						
					</div>

			</div>
		
				 <div class="container">

		
		 	 


		 	  <div>

  
 
  <uib-accordion close-others="oneAtATime" >
  
    <div uib-accordion-group class="panel-default" is-open="status.isFirstOpen">
      <uib-accordion-heading>
       Personal Details <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.isFirstOpen, 'glyphicon-chevron-right': !status.isFirstOpen}"></i>

      </uib-accordion-heading>
      
      
      <div>
      <div class="col-sm-8">
      	

      	<div class="col-sm-6">
      	<label>Name :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.name}}</span>
      	<br><label>Date of Birth :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.age}}</span>
      	<br><label>Gender :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.gender}}</span>
      	<br><label>Current Location :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.current_loc}}</span>
      	<br><label>Permanent Address :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.address}}</span>
      	<br><label>ZIP :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.zip}}</span>
      	<br><label>Preferred Location :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.prefered_loc}}</span>
      	<br><label>Marital Status :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.martial_status}}</span>
      	</div>
      	<div class="col-sm-6">
      	<label>Email :</label>&nbsp;<span>{{info.personal.email}}</span>
      	<br><label>Phone :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.phoneno}}</span>
      	<br><label>Alt Phone :</label>&nbsp;<span style="text-transform:capitalize;">{{info.personal.altphoneno}}</span>
        <br><label>Facebook ID :</label>&nbsp;<span ><a href="{{info.personal.facebook_id}}">{{info.personal.facebook_id}}</a></span>
        <br><label>linkedin ID :</label>&nbsp;<span ><a href="{{info.personal.linkedin_id}}">{{info.personal.linkedin_id}}</a></span>
      	
      	</div>
      	
      </div>
     	<div class="col-sm-4 text-center" >
     		 <img src="uploads/{{info.image.image_name}}" class="img-circle" id="img" width="200" height="200" ng-hide="info.pic">
     		  <img src="{{info.pic}}" class="img-circle" id="img" width="200" height="200" ng-if="info.pic">
  
     	</div>
      </div>



     
     

    </div>

   
  </uib-accordion>

   <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open" >
      <uib-accordion-heading>
       Employment Details <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open, 'glyphicon-chevron-right': !status.open}"></i>
      </uib-accordion-heading>

       <div>
      <div class="col-sm-8">
      	
      	

      	<div class="col-sm-6">
      	<label>Experience :</label>&nbsp;<span style="text-transform:capitalize;">{{info.experince.experience_yrs}}</span>
      	<br><label>No. of Organisations Worked with :</label>&nbsp;<span style="text-transform:capitalize;">{{info.experince.company_worked}}</span>
      	
      	</div>
      	<div class="col-sm-6">
      	<label>Notice Period :</label>&nbsp;<span style="text-transform:capitalize;">{{info.experince.notice_period}}</span>
      	<br><label>Current/Last Annual Package :</label>&nbsp;<span style="text-transform:capitalize;">{{info.experince.current_salary}}</span>
      	
      	
      	</div>
      	<div class="col-sm-12">
      		<br><h6>Previous Employment(s)/Job Title(s)</h6>
      	</div>
      	

      	<div class="col-sm-12" ng-repeat="x in info.experince.empwork">

      		<br><label>Company Name :</label>&nbsp;<span style="text-transform:capitalize;">{{x.company_name}}</span>
      		<br><label>Job Title :</label>&nbsp;<span style="text-transform:capitalize;">{{x.job_title}}</span>
      		<br><label>Working Since :</label>&nbsp;<span style="text-transform:capitalize;">{{x.working_time}}</span>

      		 <div class="row">
	        <div class="col-sm-8">
	          <hr class="dashed">
	        </div>
	      </div>
      	</div>

      </div>
     	
      </div>
      
      
       
   	</div>

  </uib-accordion>

 <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open1" >
      <uib-accordion-heading>
       Education <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open1, 'glyphicon-chevron-right': !status.open1}"></i>
      </uib-accordion-heading>

       <div>
      <div class="col-sm-8">
      	

      	<div class="col-sm-12" ng-repeat="x in info.edducation">
      	<label>{{x.qualification_type}} :</label>&nbsp;<span style="text-transform:capitalize;">{{x.course_name}}({{x.specialization}}) from {{x.university_name}} in {{x.passing_year}}</span>
      	<br>
      	</div>
      	
      	
      </div>
     	
      </div>

      
       
    </div>
   
  </uib-accordion>

  <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open2">
      <uib-accordion-heading>
       Certifications <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open2, 'glyphicon-chevron-right': !status.open2}"></i>
      </uib-accordion-heading>



      	 <div>
	      <div class="col-sm-8">
	      	
	      	

	      	<div class="col-sm-12">
	      	<label>Certifications/Programs :</label>&nbsp;<span style="text-transform:capitalize;" ng-repeat="x in info.certificates">{{x.certificate_name}}, </span>
	      	<br>
	      	</div>
	      	
	      	
	      </div>
	     	
	      </div>

     
       
    </div>
   
  </uib-accordion>
  <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open3">
      <uib-accordion-heading>
       Key Skills <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open3, 'glyphicon-chevron-right': !status.open3}"></i>
      </uib-accordion-heading>


       <div>
	      <div class="col-sm-8">
	      	
	      	

	      	<div class="col-sm-12">
          
	      	<label>Key Skills :</label>&nbsp;
          <div style="text-transform:capitalize;" ng-repeat="x in info.keyskills">

            <div class="col-sm-4 text-center">{{x.keyskill_name}}</div> 
            <div class="col-sm-6"><input-stars max="5" ng-attr-readonly="true" ng-model="x.key_rating" ></input-stars></div>

          </div>
	      	<br>
	      	</div>
	      	
	      	
	      </div>
	     	
	      </div>



    </div>
   
  </uib-accordion>

  <uib-accordion close-others="oneAtATime" >
  
    <div uib-accordion-group class="panel-default" is-open="status.open4">
      <uib-accordion-heading>
       Other Details <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open4, 'glyphicon-chevron-right': !status.open4}"></i>
      </uib-accordion-heading>


       <div>
	      <div class="col-sm-8">
	      	

	      	<div class="col-sm-12">
	      	<label>Language Known :</label>&nbsp;<span style="text-transform:capitalize;" ng-repeat="x in info.others.languages_known">{{x}} </span>
	      	<br><label>Expected Salary :</label>&nbsp;<span style="text-transform:capitalize;">{{info.others.expected_salary}}</span>
	      	<br><label>Any Other Detail :</label>&nbsp;<span style="text-transform:capitalize;">{{info.others.anyother_detail}}</span>
	      	</div>
	      	
	      	
	      </div>
	     	
	      </div>

      

    </div>
   
  </uib-accordion>




</div>

		 </div>



		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		 <?php include('include/footer.php'); ?> 

	</body>
</html>