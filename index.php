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
<title>ITS Recruitment</title>

<link rel="shortcut icon" href="images/favicon.png">
<link href="css/style.css" rel="stylesheet">
</head>
<body >


<?php include('include/header.php'); ?>

<div id="slider" class="sl-slider-wrapper" ng-app="its" ng-controller="jobSearchCtrl">
  <div class="sl-slider">
    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
      <div class="sl-slide-inner">
        <div class="bg-img bg-img-1"></div>
        <div class="tint"></div>
        <div class="slide-content">
                      
               
                 <pre>{{JSON || search}}</pre>
                  
                    <div class="col-sm-12 well">
              
                      
                      <div class="row col-sm-5"><selectize config='myConfig' options='myOptions' ng-model="form.langs"></selectize></div>        
                      <!-- <input type="text" class="form-control search" name="x" placeholder="Skills, Companies" ng-model="search.any" style="width:30%;"> -->
                       <div class="row col-sm-3"><selectize config='myConfig1' options='cities' ng-model="search.location"></selectize></div>
                     <!--  <select class="form-control search" ng-model="search.location" ng-options="x.city as x.city for x in cities">
                        <option>Location <span class="caret"></span></option> 
                      </select> -->
                       <div class="row col-sm-2"><selectize config='myConfig2' options='exp' ng-model="search.experience"></selectize></div>
                     <!--  <select class="form-control search" ng-model="search.experience">
                        <option>Experience <span class="caret" ></span></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>

                      </select> -->
                       <div class="row col-sm-2"><selectize config='myConfig3' options='salary' ng-model="search.salary"></selectize></div>
                      <!-- <select class="form-control search" ng-model="search.salary">
                        <option>Salary <span class="caret" ></span></option> 
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
                        <option value="30+ Lacs">30+ Lacs</option>
                      </select> -->
                          
                         
                        
                      <div class="row" >
                        <button class="btn btn-primary" type="button" ng-click="searchJob()" style="line-height:2.3;width:120px;"><span class="glyphicon glyphicon-search"></span>Search</button>    
                      </div>
                    

                  </div>
         





        </div>
      </div>
    </div>
  
  </div>
</div>

<!-- ============ SLIDES END ============ --> 



<!-- <section  >
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>How does it work</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">

        <div>
            <select class="form-control" name="curentloc" ng-model="search.loc" ng-options="x.city as x.city for x in cities">
                  <option value="">Select Location</option>
        </select>
        </div>
        <div>
           <selectize config='myConfig' options='myOptions' ng-model="search.keyskills" ></selectize>
        </div>
        
          <button type="submit" class="btn btn-energized" ng-click="searchJob()">Search </button>
      </div>
     
    </div>
  </div>
</section> -->








<!-- ============ JOBS START ============ -->

<section id="jobs">
   <?php
        
        $job_obj->getjobs_home();

         ?>
</section>
<!-- <h2 class="inline"><a href="http://itsrecruitment.in/jobs.php">More Jobs</a></h2> -->

<!-- ============ JOBS END ============ --> 

<!-- ============ STATS START ============ -->

<!-- <section id="stats" class="parallax text-center">
  <div class="tint"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1>ITS Recruitment</h1>
        <h4>How many people we’ve helped</h4>
      </div>
    </div>
    <div class="row" id="counter">
      <div class="counter">
        <div class="number">4,329</div>
        <div class="description">Members</div>
      </div>
      <div class="counter">
        <div class="number">894</div>
        <div class="description">Jobs</div>
      </div>
      <div class="counter">
        <div class="number">1,482</div>
        <div class="description">Resumes</div>
      </div>
      <div class="counter">
        <div class="number">83</div>
        <div class="description">Companies</div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p><a class="link-register btn btn-primary">Join Us</a></p>
      </div>
    </div>
  </div>
</section> -->

<!-- ============ STATS END ============ --> 

<!-- ============ HOW DOES IT WORK START ============ -->

<section id="how">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>How does it work</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <p>ITS recruitment is an international recruitment agency in India, specializing in the permanent recruitment, contract staffing and placement consultancy, recruitment process outsourcing (RPO) and managed offshore services for IT&T sectors across all verticals. ITS is having a proven track record and having excellent team of Technical consultant who are actively involved in Technical screening for candidates.</p>
        <p>ITS recruitment successfully recruiting for many reputed Indian and International firms. The company has been promoted by a senior IT & Recruitment professionals with over two decades of rich global experience working on training and recruitment with some of the top technology companies and having worked in the United States, Japan, South Africa, Europe and the Middle East. With our extensive recruitment and training delivery expertise, proven delivery track record and having core IT professionals in our recruitment team, we understand your business better than our competitors do. And that is the reason when it comes to IT placement, companies worldwide rely on us. </p>
        <p>ITS with blend of Recruitment and Training – we offer a unique product that is Recruitment complimented with training. On every recruitment you will get an voucher which you can reimbursed for training with ITS and any of our partner</p>
        <p><a href="about.php" class="btn btn-primary">Learn More</a></p>
      </div>
      <div class="col-sm-6">
        <div class="video-wrapper">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/pT69qkKfyCI" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ HOW DOES IT WORK END ============ --> 

<!-- ============ BLOG START ============ -->

<section id="blog">
  <div class="container">
    <div class="row text-center">
      <div class="col-sm-12">
        <h1>MUST READ</h1>
        <h4>USEFUL TIPS FOR EMPLOYEMENT </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="owl-carousel"> 
          
          <!-- Blog post 1 -->
          <div> <img src="images/blog5.jpg" class="img-responsive" alt="Blog Post" />
            <h4>Top highest paid jobs across the world </h4>
            <h5> </h5>
            <p style="text-align:justify;">If you haven't exactly saved enough up money to buy a yacht and a place in the desired city, maybe you're in the wrong career. It's important to find a job that you love and enjoy, but finding a career that pays the bills is also ideal in today's tough economy. Most of the entries on this list require years of schooling, but all that time and expense will pay off once you join the workforce.<br>
              It's important for us to note that many of the highest-paying jobs in the world include various positions within the different trades are always open and good candidates are always in crunch. Here our list give you a glimpse on highest paid career in world with average salary on particular skill. </p>
            <p><a href="post.html" class="btn btn-primary">Read more</a></p>
          </div>
          
          <!-- Blog post 2 -->
          <div> <img src="images/maxresdefault.jpg" class="img-responsive" alt="Blog Post" />
            <h4>Resume Writing</h4><br>
            <ol >
              <li  style="text-align:justify;" > DO YOU WANT TO WRITE YOUR RESUME ,ASK ONE SIMPLE QUESTION: DO I NEED A JOB OR A NEW CAREER?</li>
              <li>FOCUS ON THE EMPLOYER'S NEEDS, NOT YOURS :PLAN FIRST </li>
              <li> THE EVIDENCE SECTION – HOW TO PRESENT YOUR WORK HISTORY, EDUCATION, ETC. </li>
              <li>A FEW GUIDELINES FOR A BETTER PRESENTATION</li>
              <li>ADD POWER TO YOUR RESUME WITH POWERWORDS</li>
            </ol><br>
            <br>
            <p><a href="post-a-job.php" class="btn btn-primary">Read more</a></p>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>



<?php include ('include/footer.php'); ?>


</body>
</html>