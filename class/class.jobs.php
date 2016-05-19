<?php
class jobs{

	 var $db;
	 var $validity;
	
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->auth=new Authentication();
		
		$this->Form = new ValidateForm();

		
		}
	



	function get_jobs(){

		?>
		<div class="row text-center">
					<div class="col-sm-12">
						<h1>find jobs</h1>
						<h4>Find a Right job</h4>
						<!--div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="#" class="btn btn-primary">Sign In</a></p>
						</div-->
					</div>
				</div><br><br><br><br><br>

				<?php


			$sql="select * from ".TBL_JOBS." where 1 ";
			$result= $this->db->query($sql,__FILE__,__LINE__);

			while($row= $this->db->fetch_array($result)){
			

			?>


			<div class="container">

				<div class="row">
					<div class="col-sm-12">



						<div class="jobs">
							
							<!-- Job offer 1 -->
							<a href="#" class="featured applied">
								<div class="row">
									<div class="col-lg-1 col-md-1 hidden-sm hidden-xs">
										<img src="http://placehold.it/60x60.jpg" alt="" class="img-responsive" />
									</div>
									<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 job-title">
										<h5><?php echo $row['role_title']; ?></h5>
										<p><strong><?php echo $row['department']; ?></strong> <?php echo $row['job_category']; ?></p>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 ">
										
										<p><i class="fa fa-map-marker" aria-hidden="true"></i><strong>  <?php echo $row['role_location']; ?></strong></p>
										<p><i class="fa fa-briefcase" aria-hidden="true"></i><strong>  <?php echo $row['job_experience']; ?> years</strong></p>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs job-type text-center">
										<p class="job-salary"><strong>$128,000</strong></p>
										<p class="badge full-time"><?php echo $row['job_type']; ?></p>
									</div>
									<div class="col-lg-2 job-dates visible-lg-block">
										<p class="job-posted"><strong>Posted 3 months ago</strong></p>
										
									</div>
								</div>
							</a>
							
							
							
							<!-- Job offer 10 -->
							

						</div>

						

					</div>
				</div>
			</div>
			<?php

			}
	
	}



	function get_job_details(){

					$sql="select * from ".TBL_JOBS." where 1 ";
					// $sql.="inner join ".TBL_COMPANY." on ".TBL_JOBS." where 1 ";
					$result= $this->db->query($sql,__FILE__,__LINE__);

					
					$row= $this->db->fetch_array($result)
					
?>
				
					<section>
					<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1><?php echo $row['role_title'];?></h1>
						<h4>
							<span><i class="fa fa-map-marker"></i><?php echo $row['role_location'];?></span>
							<span><i class="fa fa-clock-o"></i><?php echo $row['job_type'];?></span>
							<span><i class="fa fa-dollar"></i>50,000-75,000</span>
						</h4>
					</div>
				</div>
			</div>
			</section>
					<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<article>
							<div>
							<h2>Job Details</h2>

							
							
								<h5><?php echo $row['department'];?></h5><br>
							

							<p><?php echo $row['job_description'];?></p>
							
							<h3>Qualifications </h3>
							
								<p><?php echo $row['qualifications'];?></p>
							
							<h3>Key skills  </h3>
							
								<p><?php echo $row['key_skills'];?></p>
							

							<h3>Key accountibilities  </h3>
							
								<p><?php echo $row['keys_accountabilities'];?></p>

							

							
							<h3>Experience </h3>
								<p><?php echo $row['job_experience'];?> years</p>
							

								
							<h3>Designation</h3>
							<p><?php echo $row['job_designation'];?></p>
							

							
							<h3>remuneration</h3>
							<p><?php echo $row['remuneration'];?></p>	
							

							</div>	<br>
							
							
							<div align="center">
								<a href="#" class="btn btn-primary btn-lg">Apply Here</a>
							</div>
						</article>
					</div>
					<div class="col-sm-4" id="sidebar">
						<!-- <div class="sidebar-widget" id="share">
							<h2>Share this job</h2>
							<ul>
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/home?status=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://plus.google.com/share?url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.coffeecreamthemes.com/themes/jobseek/site/job-details.html&amp;title=Jobseek%20-%20Job%20Board%20Responsive%20HTML%20Template&amp;summary=&amp;source="><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div> -->
						<hr>
						<div class="sidebar-widget" id="company">
							<h2>About this company</h2>
							<p><img src="http://placehold.it/300x109.gif" alt="" class="img-responsive"></p>
							<p><?php echo $row['role_location'];?></p>
							<p><a href="about.php" class="btn btn-primary">Read more</a></p>
						</div>
						<hr>
						<!-- <div class="sidebar-widget" id="company-jobs">
							<h2>More jobs from this company</h2>
							<ul>
								<li><a href="#">Senior Web Designer</a></li>
								<li><a href="#">Junior System Administrator</a></li>
								<li><a href="#">Key Account Manager</a></li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>

		</section>


<?php





	}


}
?> 