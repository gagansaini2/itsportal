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

				<?php


			$sql="select * from ".TBL_JOBS." where 1 ";
			$result= $this->db->query($sql,__FILE__,__LINE__);

			while($row= $this->db->fetch_array($result)){
				$id=$row['job_id'];
				$comp_id=$row['company_id'];

				
				$skills=json_decode($row['key_skills']);

				$key_skills=implode(", ",$skills);

				$sql1="select * from ".TBL_LOGO." where company_id = '".$comp_id."' ";
				$result1= $this->db->query($sql1,__FILE__,__LINE__);
				$row1= mysql_fetch_assoc($result1);
				$imglogo=$row1['logo_name'];


				// print_r($row1);

			?>


			<div class="container">

				<div class="row">
					<div class="col-sm-12">



						<div class="jobs">
							
							<!-- Job offer 1 -->
							<a href="job_details.php?id=<?php echo($id) ?>"  class="featured applied">
								<div class="row">
									<div class="col-lg-1 col-md-1 hidden-sm hidden-xs">
										<?php
										if (isset($imglogo)) { ?>

											<img src='uploads/<?php echo($imglogo); ?>' class='img-responsive' >

										<?php }
										
										?>
										 
									</div>
									<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 job-title">
										<h5><?php echo $row['role_title']; ?></h5>
										<p><strong><?php echo $row['department']; ?></strong> <?php echo $row['job_category']; ?></p>
									</div>
									<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 ">
										
										<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<strong style="text-transform:capitalize;" >  <?php echo $row['role_location']; ?></strong></p>
										<p><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;<strong><?php echo $row['job_experience']; ?> years</strong></p>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs job-type text-center">
										<p class="job-salary"><strong>$128,000</strong></p>
										<p class="badge full-time"><?php echo $row['job_type']; ?></p>
									</div>
									<div class="col-lg-2 visible-lg-block">

										<p class="job-posted"><strong><?php echo $key_skills; ?></strong></p>
										
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



	function get_job_details($id){


					$sql="select * from ".TBL_JOBS." where job_id='".$id."' ";
					//$sql.="inner join ".TBL_COMPANY." on ".TBL_JOBS.".company_id=".TBL_COMPANY.".company_id ";

					$result= $this->db->query($sql,__FILE__,__LINE__);

					
					$row= $this->db->fetch_array($result)
					
?>
				
					<section>
					<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1><?php echo $row['role_title']; ?></h1>
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
							<p><?php echo $row['company_description'];?></p>
							
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

	function subcompany(){


			$resp=array();
			$resp['status']=true;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;


			// print_r($_REQUEST);
			// print_r($_FILES);

			 	$fileName = $_FILES['logo']['name'];
				$filetmp = $_FILES['logo']['tmp_name'];
				$filesize = $_FILES["logo"]["size"];


				$company=json_decode($_REQUEST['companydata'], true);

							$insert_sql_array = array();
							$insert_sql_array['company_name'] = $company['company_name'];
							$insert_sql_array['company_email'] = $company['company_email'];
							$insert_sql_array['company_location'] = $company['company_location'];
							$insert_sql_array['company_num'] = $company['company_num'];
							$insert_sql_array['company_website'] = $company['company_website'];
							$insert_sql_array['company_type'] = $company['company_type'];
							$insert_sql_array['company_description'] = $company['company_description'];
							$insert_sql_array['company_vision'] = $company['company_vision'];
							$insert_sql_array['company_mission'] = $company['company_mission'];

							$insert_sql_array['user_id']=$_SESSION['user_id'];
							
							$this->db->insert(TBL_COMPANY,$insert_sql_array);

							
							$id=$this->db->last_insert_id();
							$_SESSION['company_id']=$id;

							$insert_sql_array = array();
							$insert_sql_array['company_id']=$_SESSION['company_id'];
							$this->db->update(TBL_USER,$insert_sql_array,user_id,$_SESSION['user_id']);

				

				//image............
							

							$image = sha1(uniqid());
							$target_dir = "uploads/";
							
							
							$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
							$image1 = $image. "." .$imageFileType;
							$target_file = $target_dir . $image. "." .$imageFileType;

							$uploadOk = 1;

								if (isset($fileName)) {
									
							    $check = getimagesize($filetmp);
							     // print_r($check);
							    if($check !== false) {
							        echo "File is an image - " . $check["mime"] . ".";
							        $uploadOk = 1;


							        if ($filesize > 5000000) {
									    echo "Sorry, your file is too large.";
									    $uploadOk = 0;
									}
									if (move_uploaded_file($filetmp, $target_file)) {
									        //echo "The file ". basename($fileName). " has been uploaded.";
									        $insert_sql_array = array();
								            $insert_sql_array['logo_name'] = $image1;
								            $insert_sql_array['company_id'] = $_SESSION['company_id'];
								            $insert_sql_array['user_id'] = $_SESSION['user_id'];
								            $this->db->insert(TBL_LOGO,$insert_sql_array);


								    } else {
								        echo "Sorry, there was an error uploading your file.";
								    }

							    } else {
							        echo "File is not an image.";
							        $uploadOk = 0;
							    }
							    
								}
							

				$resp['data']=$company['company_name'];

				echo json_encode($resp);

	}


	function submitjob(){

		$resp=array();
			$resp['status']=true;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;


			$job=json_decode($_REQUEST['job'], true);
			$skills=json_encode($job['keyskills']);


					$insert_sql_array = array();
					$insert_sql_array['role_title'] = $job['roletitle'];
					$insert_sql_array['department'] = $job['department'];
					$insert_sql_array['role_location'] = $job['rolelocation'];
					$insert_sql_array['job_type'] = $job['jobtype'];
					$insert_sql_array['qualifications'] = $job['qualifications'];
					$insert_sql_array['job_description'] = $job['description'];
					$insert_sql_array['job_experience'] = $job['req_experience'];
					$insert_sql_array['job_designation'] = $job['designation'];
					$insert_sql_array['remuneration'] = $job['remuneration'];
					$insert_sql_array['key_skills'] = $skills;
					$insert_sql_array['keys_accountabilities'] = $job['keysaccountabilities'];

					$insert_sql_array['user_id']=$_SESSION['user_id'];
					$insert_sql_array['company_id']=$_SESSION['company_id'];


					$this->db->insert(TBL_JOBS,$insert_sql_array);



			$resp['data']=$job['roletitle'];

			echo json_encode($resp);
	}


}
?> 