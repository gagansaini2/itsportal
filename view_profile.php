<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee1.php"); 

$user_obj=new employee1();


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
	<body ng-app="its" ng-controller="viewprofile">

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section >

			<div class="container">
				<div class="col-sm-12 text-center">
						<h1>Your Profile</h1><br><br>
						
					</div>

			</div>
		
				 <div class="container">

		
		 	 


		 	  <div>

  
 
  <uib-accordion close-others="oneAtATime" >
  
    <div uib-accordion-group class="panel-default" is-open="status.isFirstOpen">
      <uib-accordion-heading>
       Personal Details <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.isFirstOpen, 'glyphicon-chevron-right': !status.isFirstOpen}"></i>

      </uib-accordion-heading>
      
      
      <div ng-if="changes.change1=='0'">
      <div class="col-sm-8">
      	<div class="col-sm-12">
      		<a style="float:right;" ng-click="edit1()">EDIT</a>
      	</div>
      	

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
      	<br><label>Facebook ID :</label>&nbsp;<span >{{info.personal.facebook_id}}</span>
      	<br><label>linkedin ID :</label>&nbsp;<span >{{info.personal.linkedin_id}}</span>
      	</div>
      	
      </div>
     	<div class="col-sm-4 text-center" >
     		 <img src="uploads/{{info.image.image_name}}" class="img-circle" id="img" width="200" height="200" ng-hide="info.pic">
     		  <img src="{{info.pic}}" class="img-circle" id="img" width="200" height="200" ng-if="info.pic">
  
     	</div>
      </div>



     <div ng-if="changes.change1=='1'">
     	<div class="col-sm-8">

     		 <div class="col-sm-12">

              <label>Name*</label>
            	<input type="text" class="form-control " name="name" placeholder="Name" ng-model="info.personal.name" ><br>  
			  
            </div>

            <div class="col-sm-12">

              <label>Email*</label>
            	<input type="text" class="form-control " name="email" placeholder="Email" ng-model="info.personal.email"><br>  
			  
            </div>

            <div class="col-sm-6">

              <label>Phone*</label>
            	<input type="text" class="form-control " name="phone" placeholder="Phone Numaber" ng-model="info.personal.phoneno">  
			  
            </div>

            <div class="col-sm-6">

              <label>Alternative Phone Number</label>
            	<input type="text" class="form-control " name="altphoneno" placeholder="Alternative Phone" ng-model="info.personal.altphoneno"><br>  
			  
            </div>

            <div class="col-sm-12">

              <label>Permanent Address*</label>
            	<input type="text" class="form-control " name="address" placeholder="Address" ng-model="info.personal.address">  
			  	<input type="text" class="form-control " name="zip" placeholder="ZIP" ng-model="info.personal.zip"> <br>
            </div>

          <div class="col-sm-12">

              <label>Current Location*</label>
            	  
			  	<select class="form-control" name="curentloc" ng-model="info.personal.current_loc" ng-options="x.city as x.city for x in cities">
                  <option value="">Select Location</option>
                </select><br>
            </div>

            
            <div class="col-sm-6">

              <label>DOB*</label>
            	<input type="text" class="form-control " name="dob" placeholder="DOB" ng-model="info.personal.age">  
			  
            </div>

            <div class="col-sm-6">

              <label>Gender*</label><br>
            	<input type="radio" name="gender" value="male" ng-model="info.personal.gender">&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="gender" value="female" ng-model="info.personal.gender" >&nbsp;Female
							             
			  
            </div>

            <div class="col-sm-12">

              <br><label>Marital Status*</label>
            	<select name="maritalStatus" class="form-control" ng-model="info.personal.martial_status">
                  <option value="" selected="">Select</option>
                  <option value="Unmarried">Single/unmarried</option>
                  <option value="Married">Married</option>
                </select>  <br>
			  
            </div>

           <div class="col-sm-12">

              <label>Preferred Location*</label>
            	
			  	<select class="form-control" name="preferloc" ng-model="info.personal.prefered_loc" ng-options="x.city as x.city for x in cities">
                 
                </select><br>
            </div> 

            <div class="col-sm-12">

              <label>Facebook ID</label>
            	<input type="text" class="form-control " name="facebook" placeholder="Facebook" ng-model="info.personal.facebook_id">  <br>
			  
            </div>

            <div class="col-sm-12">

              <label>Linkedin ID</label>
            	<input type="text" class="form-control " name="linkedin" placeholder="Linkedin" ng-model="info.personal.linkedin_id"> <br> 
			  
            </div>
            <div class="row text-center col-sm-12">
            	<button type="submit" class="btn btn-info" ng-click="save_personal()">Save Changes</button>
            	<button type="submit" class="btn btn-default" style="color:#72d2ff;" ng-click="changes.change1=0">cancel</button>
            </div>
            

           
     	</div>
     	<div class="col-sm-4 text-center" >
     		 <img src="uploads/{{info.image.image_name}}" class="img-circle" id="img" width="200" height="200" ng-hide="info.pic">
     		  <img src="{{info.pic}}" class="img-circle" id="img" width="200" height="200" ng-if="info.pic">
     		 
     		  <span class="btn btn-file">
				Add/edit Photo<input type="file" name="change" fileread="info.pic">
				</span>

     	</div>
     	</div>
     

    </div>

   
  </uib-accordion>

   <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open" >
      <uib-accordion-heading>
       Employment Details <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open, 'glyphicon-chevron-right': !status.open}"></i>
      </uib-accordion-heading>

       <div ng-if="changes.change2=='0'">
      <div class="col-sm-8">
      	<div class="col-sm-12">
      		<a style="float:right;" ng-click="edit2()">EDIT</a>
      	</div>
      	

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
      
      <div ng-if="changes.change2=='1'">	
      	<div class="form-group" ng-repeat="x in info.experince.empwork">
	      	
	      		<div class="col-sm-8">

	              <label>Company Name</label>
	            	<input type="text" class="form-control" name="compname" placeholder="Company Name" ng-model="x.company_name">  
				  
	            </div>
	            <div class="col-sm-8">

	              <label>Job Title</label>
	            	<input type="text" class="form-control" name="jobtitle" placeholder="Job Title" ng-model="x.job_title">  
				  
	            </div>
	             <div class="col-sm-8">

	              <label>Working Since</label>
	            	<input type="text" class="form-control" name="workingtime" placeholder="Working Time" ng-model="x.working_time">  
				  
	            </div>
	       <div class="row">
	        <div class="col-sm-8">
	          <hr class="dashed">
	        </div>
	      </div>
	   </div>
	   <div class="row">
        <div class="col-sm-8">
          <p><a ng-click="addexp1()">+ Add More Experience</a></p>

        </div>
      </div>
     

      	<div class="col-sm-8">

	      <label>Experience*</label>
	    	<select name="exyear"  class="form-control error" ng-model="info.experince.experience_yrs">
	            <option value="" selected="">Select</option>
	            <option value="0">Fresher</option>
	            <option value="1 years">1 years</option>
	            <option value="2 years">2 years</option>
	            <option value="3 years">3 years</option>
	            <option value="4 years">4 years</option>
	            <option value="5 years">5 years</option>
	            <option value="6 years">6 years</option>
	            <option value="7 years">7 years</option>
	            <option value="8 years">8 years</option>
	            <option value="9 years">9 years</option>
	            <option value="10 years">10 years</option>
	            <option value="11 years">11 years</option>
	            <option value="12 years">12 years</option>
	            <option value="13 years">13 years</option>
	            <option value="14 years">14 years</option>
	            <option value="15 years">15 years</option>
	            <option value="16 years">16 years</option>
	            <option value="17 years">17 years</option>
	            <option value="18 years">18 years</option>
	            <option value="19 years">19 years</option>
	            <option value="20 years">20 years</option>
	            <option value="21 years">21 years</option>
	            <option value="22 years">22 years</option>
	            <option value="23 years">23 years</option>
	            <option value="24 years">24 years</option>
	            <option value="25 years">25 years</option>
	            <option value="26 years">26 years</option>
	            <option value="27 years">27 years</option>
	            <option value="28 years">28 years</option>
	            <option value="29 years">29 years</option>
	            <option value="30 years">30 years</option>
	            <option value="31 years">30+ years</option>
	        </select><br> 
		  
	    </div>

	    <div class="col-sm-8">

	      <label>No. of Organisations Worked with</label>
	    	<select name="worknum" class="form-control error" ng-model="info.experince.company_worked">
	            <option value="" selected="">Select</option>
	            <option value="0">None</option>
	            <option value="1" label="1">1</option>
	            <option value="2" label="2">2</option>
	            <option value="3" label="3">3</option>
	            <option value="4" label="4">4</option>
	            <option value="5" label="5">5</option>
	            <option value="6" label="6">6</option>
	            <option value="7" label="7">7</option>
	            <option value="8" label="8">8</option>
	            <option value="8+" label="8+">8+</option>

	          </select><br>
		  
	    </div>

	    <div class="col-sm-8">

	      <label>Notice Period*</label>
	    	<select name="noticeperiod" id="noticeperiod" class="form-control" ng-model="info.experince.notice_period">
              <option value="">Select</option>
              <option value="Immediate">Immediate</option>
              <option value="<1 month"><1 month</option>
              <option value="1 month">1 month</option>
              <option value="2 months">2 months</option>
              <option value="3 months">3 months</option>
            </select><br>
		  
	    </div>

	    <div class="col-sm-8">

	      <label>Current/Last Annual Package*</label>
	    	<select name="anumsal" class="form-control" ng-model="info.experince.current_salary">

	            <option value="">Select</option>
	            <option value="<1 Lac">
	              <1 Lac</option>
	                <option value="1 Lacs">1 Lacs</option>
	                <option value="2 Lacs">2 Lacs</option>
	                <option value="3 Lacs">3 Lacs</option>
	                <option value="4 Lacs">4 Lacs</option>
	                <option value="5 Lacs">5 Lacs</option>
	                <option value="6 Lacs">6 Lacs</option>
	                <option value="7 Lacs">7 Lacs</option>
	                <option value="8 Lacs">8 Lacs</option>
	                <option value="9 Lacs">9 Lacs</option>
	                <option value="10 Lacs">10 Lacs</option>
	                <option value="11 Lacs">11 Lacs</option>
	                <option value="12 Lacs">12 Lacs</option>
	                <option value="13 Lacs">13 Lacs</option>
	                <option value="14 Lacs">14 Lacs</option>
	                <option value="15 Lacs">15 Lacs</option>
	                <option value="16 Lacs">16 Lacs</option>
	                <option value="17 Lacs">17 Lacs</option>
	                <option value="18 Lacs">18 Lacs</option>
	                <option value="19 Lacs">19 Lacs</option>
	                <option value="20 Lacs">20 Lacs</option>
	                <option value="21 Lacs">21 Lacs</option>
	                <option value="22 Lacs">22 Lacs</option>
	                <option value="23 Lacs">23 Lacs</option>
	                <option value="24 Lacs">24 Lacs</option>
	                <option value="25 Lacs">25 Lacs</option>
	                <option value="26 Lacs">26 Lacs</option>
	                <option value="27 Lacs">27 Lacs</option>
	                <option value="28 Lacs">28 Lacs</option>
	                <option value="29 Lacs">29 Lacs</option>
	                <option value="30 Lacs">30 Lacs</option>
	                <option value="31 Lacs">31 Lacs</option>
	                <option value="32 Lacs">32 Lacs</option>
	                <option value="33 Lacs">33 Lacs</option>
	                <option value="34 Lacs">34 Lacs</option>
	                <option value="35 Lacs">35 Lacs</option>
	                <option value="36 Lacs">36 Lacs</option>
	                <option value="37 Lacs">37 Lacs</option>
	                <option value="38 Lacs">38 Lacs</option>
	                <option value="39 Lacs">39 Lacs</option>
	                <option value="40 Lacs">40 Lacs</option>
	                <option value="41 Lacs">41 Lacs</option>
	                <option value="42 Lacs">42 Lacs</option>
	                <option value="43 Lacs">43 Lacs</option>
	                <option value="44 Lacs">44 Lacs</option>
	                <option value="45 Lacs">45 Lacs</option>
	                <option value="46 Lacs">46 Lacs</option>
	                <option value="47 Lacs">47 Lacs</option>
	                <option value="48 Lacs">48 Lacs</option>
	                <option value="49 Lacs">49 Lacs</option>
	                <option value="50 Lacs">50 Lacs</option>
	                <option value="50+ Lacs">50+ Lacs</option>


	          </select><br>
		  
	    </div>
	      <div class="row text-center col-sm-8">
            	<button type="submit" class="btn btn-info" ng-click="save_exp()">Save Changes</button>
            	<button type="submit" class="btn btn-default" style="color:#72d2ff;" ng-click="changes.change2=0">cancel</button>
            </div>
      </div>      
       
   	</div>
  </uib-accordion>

 <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open1" >
      <uib-accordion-heading>
       Education <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open1, 'glyphicon-chevron-right': !status.open1}"></i>
      </uib-accordion-heading>

       <div ng-if="changes.change3=='0'">
      <div class="col-sm-8">
      	<div class="col-sm-12">
      		<a style="float:right;" ng-click="edit3()">EDIT</a>
      	</div>
      	

      	<div class="col-sm-12" ng-repeat="x in info.edducation">
      	<label>{{x.qualification_type}} :</label>&nbsp;<span style="text-transform:capitalize;">{{x.course_name}}({{x.specialization}}) from {{x.university_name}} in {{x.passing_year}}</span>
      	<br>
      	</div>
      	
      	
      </div>
     	
      </div>

      <div  ng-if="changes.change3=='1'">
      	<div ng-repeat="x in info.edducation">
     		
     		<div class="col-sm-8">
		        <label>Qualification</label>
		        <select name="highestqualification" class="form-control" ng-model="x.qualification_type">
		          <option value="">Select your highest qualification</option>
		          <option value="Doctorate/Phd">Doctorate/Phd</option>
		          <option value="Masters">Postgraduate</option>
		          <option value="Undergraduate">Undergraduate</option>

		        </select>


		      </div>


		      
		        <div class="col-sm-8">
		          <label>Course</label>
		          <input type="text" class="form-control" name="course" placeholder="Enter Course" ng-model="x.course_name">
		         

		        </div>

		        <div class="col-sm-8">
		          <label>Specialization</label>
		          <input type="text" class="form-control" name="specialization" placeholder="Enter Specialization" ng-model="x.specialization">
		       

		        </div>

		        <div class="col-sm-8">
		          <label>University/College</label>
		          <input type="text" class="form-control" name="university" placeholder="Institute Name" ng-model="x.university_name">
		          
		        </div>

		        <div class="col-sm-8">
		          <label>City</label>
		          <input type="text" class="form-control" name="city" placeholder="City Name" ng-model="x.city_name">
		         
		        </div>
		        <div class="col-sm-8">

		          <div class="form-group" id="education-dates-group">
		            <label>Year of Passing</label>
		            <br>
		            <select name="year_passing" class="form-control" ng-model="x.passing_year">
		              <option value="">Select</option>
		              <option value="2016">2016</option>
		              <option value="2015">2015</option>
		              <option value="2014">2014</option>
		              <option value="2013">2013</option>
		              <option value="2012">2012</option>
		              <option value="2011">2011</option>
		              <option value="2010">2010</option>
		              <option value="2009">2009</option>
		              <option value="2008">2008</option>
		              <option value="2007">2007</option>
		              <option value="2006">2006</option>
		              <option value="2005">2005</option>
		              <option value="2004">2004</option>
		              <option value="2003">2003</option>
		              <option value="2002">2002</option>
		              <option value="2001">2001</option>
		              <option value="2000">2000</option>
		              <option value="1999">1999</option>
		              <option value="1998">1998</option>
		              <option value="1997">1997</option>
		              <option value="1996">1996</option>
		              <option value="1995">1995</option>
		              <option value="1994">1994</option>
		              <option value="1993">1993</option>
		              <option value="1992">1992</option>
		              <option value="1991">1991</option>
		              <option value="1990">1990</option>
		              <option value="1989">1989</option>
		              <option value="1988">1988</option>
		              <option value="1987">1987</option>
		              <option value="1986">1986</option>
		              <option value="1985">1985</option>
		              <option value="1984">1984</option>
		              <option value="1983">1983</option>
		              <option value="1982">1982</option>
		              <option value="1981">1981</option>
		              <option value="1980">1980</option>
		              <option value="1979">1979</option>
		              <option value="1978">1978</option>
		              <option value="1977">1977</option>
		              <option value="1976">1976</option>
		              <option value="1975">1975</option>
		              <option value="1974">1974</option>
		              <option value="1973">1973</option>
		              <option value="1972">1972</option>
		              <option value="1971">1971</option>
		              <option value="1970">1970</option>

		            </select>


		          </div>

		        </div>
		        <div class="row">
			        <div class="col-sm-8">
			          <hr class="dashed">
			        </div>
			     </div>
		</div> 

		<div class="row">
	        <div class="col-sm-8">
	          <p><a ng-click="addedu1()">+ Add Education</a></p>

	        </div>
	      </div>
	      <div class="row text-center col-sm-8">
            	<button type="submit" class="btn btn-info" ng-click="save_education()">Save Changes</button>
            	<button type="submit" class="btn btn-default" style="color:#72d2ff;" ng-click="changes.change3=0">cancel</button>
            </div>
	       </div>

       
    </div>
   
  </uib-accordion>

  <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open2">
      <uib-accordion-heading>
       Certifications <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open2, 'glyphicon-chevron-right': !status.open2}"></i>
      </uib-accordion-heading>



      	 <div ng-if="changes.change4=='0'">
	      <div class="col-sm-8">
	      	<div class="col-sm-12">
	      		<a style="float:right;" ng-click="edit4()">EDIT</a>
	      	</div>
	      	

	      	<div class="col-sm-12">
	      	<label>Certifications/Programs :</label>&nbsp;<span style="text-transform:capitalize;" ng-repeat="x in info.certificates">{{x.certificate_name}}, </span>
	      	<br>
	      	</div>
	      	
	      	
	      </div>
	     	
	      </div>

      <div ng-if="changes.change4=='1'">
     	 <div class="row col-sm-8" ng-repeat="x in info.certificates">
          <div class="col-sm-6">
          	<label>Certification Name</label>
            <input type="text" class="form-control" name="certificate" placeholder="Certification Name eg. CCNA" ng-model="x.certificate_name">
            
          </div>
        
        
          <div class="col-sm-6" >
          	<label>Certificate Number</label>
            <input type="text" class="form-control" name="certificatenum" placeholder="Certificate No." ng-model="x.certificate_number">

          </div>
        </div>
        <div class="row">
	        <div class="col-sm-8">
	         <br><p><a ng-click="addCert1()">+ Add certificate</a></p>

	        </div>
	    </div>
	     <div class="row text-center col-sm-8">
            	<button type="submit" class="btn btn-info" ng-click="save_certification()">Save Changes</button>
            	<button type="submit" class="btn btn-default" style="color:#72d2ff;" ng-click="changes.change4=0">cancel</button>
            </div>
      </div>      
	     
       
    </div>
   
  </uib-accordion>
  <uib-accordion close-others="oneAtATime">
  
    <div uib-accordion-group class="panel-default" is-open="status.open3">
      <uib-accordion-heading>
       Key Skills <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open3, 'glyphicon-chevron-right': !status.open3}"></i>
      </uib-accordion-heading>


       <div ng-if="changes.change5=='0'">
	      <div class="col-sm-8">
	      	<div class="col-sm-12">
	      		<a style="float:right;" ng-click="edit5()">EDIT</a>
	      	</div>
	      	

	      	<div class="col-sm-12">
	      	<label>Key Skills :</label>&nbsp;<span style="text-transform:capitalize;" ng-repeat="x in info.keyskills">{{x.keyskill_name}}, </span>
	      	<br>
	      	</div>
	      	
	      	
	      </div>
	     	
	      </div>




     <div ng-if="changes.change5=='1'">
      	 <div class="col-sm-8" >
	        <label >Key Skills</label>

	        <div class="row" ng-repeat="x in info.keyskills">
	        <div class="col-sm-7" >

	         <selectize config='myConfig' options='myOptions' ng-model="x.keyskill_name" ></selectize>

	        </div>
	         <div class="col-sm-5" >
	         	
	         	<input-stars max="5"  ng-attr-icon-full="{{ enableReadonly ? 'fa-cog' : 'fa-star fa-lg' }}" ng-model="x.key_rating"></input-stars>
	      
	       </div>
	        </div>
	    </div>

	     <div class="row">
          <div class="col-sm-8">
            <!-- <p><a id="add-more-skills">+ Add More skills</a></p> -->
            <br><p><a  ng-click="addskill1()">+ Add More skills</a></p>

          </div>
        </div>
        
	     <div class="row text-center col-sm-8">
            	<button type="submit" class="btn btn-info" ng-click="save_skills()">Save Changes</button>
            	<button type="submit" class="btn btn-default" style="color:#72d2ff;" ng-click="changes.change5=0">cancel</button>
            </div>
      </div>      
         


    </div>
   
  </uib-accordion>

  <uib-accordion close-others="oneAtATime" >
  
    <div uib-accordion-group class="panel-default" is-open="status.open4">
      <uib-accordion-heading>
       Other Details <i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': status.open4, 'glyphicon-chevron-right': !status.open4}"></i>
      </uib-accordion-heading>


       <div ng-if="changes.change6=='0'">
	      <div class="col-sm-8">
	      	<div class="col-sm-12">
	      		<a style="float:right;" ng-click="edit6()">EDIT</a>
	      	</div>
	      	

	      	<div class="col-sm-12">
	      	<label>Language Known :</label>&nbsp;<span style="text-transform:capitalize;" ng-repeat="x in info.others.languages_known">{{x}} </span>
	      	<br><label>Expected Salary :</label>&nbsp;<span style="text-transform:capitalize;">{{info.others.expected_salary}}</span>
	      	<br><label>Any Other Detail :</label>&nbsp;<span style="text-transform:capitalize;">{{info.others.anyother_detail}}</span>
	      	</div>
	      	
	      	
	      </div>
	     	
	      </div>

      <div ng-if="changes.change6=='1'">
     	<div class="col-sm-8">
     		<label>Language Known*</label>
     		 <selectize config='myConfig1' options='myOptions1' ng-model="info.others.languages_known"></selectize>
     	</div>	

     	<div class="col-sm-8">
     		<label>Expected Salary</label>
     		 <select class="form-control" name="expectedsalary" ng-model="info.others.expected_salary">

	            <option value="Select">Select</option>
	            <option value="<1 Lac">
	              <1 Lac</option>
	                <option value="1 Lacs">1 Lacs</option>
	                <option value="2 Lacs">2 Lacs</option>
	                <option value="3 Lacs">3 Lacs</option>
	                <option value="4 Lacs">4 Lacs</option>
	                <option value="5 Lacs">5 Lacs</option>
	                <option value="6 Lacs">6 Lacs</option>
	                <option value="7 Lacs">7 Lacs</option>
	                <option value="8 Lacs">8 Lacs</option>
	                <option value="9 Lacs">9 Lacs</option>
	                <option value="10 Lacs">10 Lacs</option>
	                <option value="11 Lacs">11 Lacs</option>
	                <option value="12 Lacs">12 Lacs</option>
	                <option value="13 Lacs">13 Lacs</option>
	                <option value="14 Lacs">14 Lacs</option>
	                <option value="15 Lacs">15 Lacs</option>
	                <option value="16 Lacs">16 Lacs</option>
	                <option value="17 Lacs">17 Lacs</option>
	                <option value="18 Lacs">18 Lacs</option>
	                <option value="19 Lacs">19 Lacs</option>
	                <option value="20 Lacs">20 Lacs</option>
	                <option value="21 Lacs">21 Lacs</option>
	                <option value="22 Lacs">22 Lacs</option>
	                <option value="23 Lacs">23 Lacs</option>
	                <option value="24 Lacs">24 Lacs</option>
	                <option value="25 Lacs">25 Lacs</option>
	                <option value="26 Lacs">26 Lacs</option>
	                <option value="27 Lacs">27 Lacs</option>
	                <option value="28 Lacs">28 Lacs</option>
	                <option value="29 Lacs">29 Lacs</option>
	                <option value="30 Lacs">30 Lacs</option>
	                <option value="31 Lacs">31 Lacs</option>
	                <option value="32 Lacs">32 Lacs</option>
	                <option value="33 Lacs">33 Lacs</option>
	                <option value="34 Lacs">34 Lacs</option>
	                <option value="35 Lacs">35 Lacs</option>
	                <option value="36 Lacs">36 Lacs</option>
	                <option value="37 Lacs">37 Lacs</option>
	                <option value="38 Lacs">38 Lacs</option>
	                <option value="39 Lacs">39 Lacs</option>
	                <option value="40 Lacs">40 Lacs</option>
	                <option value="41 Lacs">41 Lacs</option>
	                <option value="42 Lacs">42 Lacs</option>
	                <option value="43 Lacs">43 Lacs</option>
	                <option value="44 Lacs">44 Lacs</option>
	                <option value="45 Lacs">45 Lacs</option>
	                <option value="46 Lacs">46 Lacs</option>
	                <option value="47 Lacs">47 Lacs</option>
	                <option value="48 Lacs">48 Lacs</option>
	                <option value="49 Lacs">49 Lacs</option>
	                <option value="50 Lacs">50 Lacs</option>
	                <option value="50+ Lacs">50+ Lacs</option>


	          </select>
     	</div>	
     	<div class="col-sm-8">
     		<label>Any Other Detail</label>
     		<input type="text" class="form-control " name="Any other" placeholder="Email" ng-model="info.others.anyother_detail"><br>
     	</div>

     	 <div class="row text-center col-sm-8">
            	<button type="submit" class="btn btn-info" ng-click="save_others()">Save Changes</button>
            	<button type="submit" class="btn btn-default" style="color:#72d2ff;" ng-click="changes.change6=0">cancel</button>
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