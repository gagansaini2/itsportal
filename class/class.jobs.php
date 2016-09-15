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
				$total_rec= $this->db->num_rows($result);

				// print_r($total_rec);

				$rec_per_page=2;

				$total_pages=ceil($total_rec/$rec_per_page);

				 $cur_page=$_GET['page'];

				if (!isset($cur_page) || $cur_page=='1') {
					$start=0;
				}else{
					$start=($cur_page*$rec_per_page) - $rec_per_page;
				}




			$sql="select * from ".TBL_JOBS." where 1 limit ".$start.",2 ";
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

				$sql2="select * from ".TBL_STATELIST." where location_id= '".$row['location_id']."' ";
				$result2= $this->db->query($sql2,__FILE__,__LINE__);
				$row2= mysql_fetch_assoc($result2);

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
										
										<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<strong style="text-transform:capitalize;" >  <?php echo $row2['city_name']; ?></strong></p>
										<p><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;<strong><?php echo $row['min_experience']; ?> - <?php echo $row['max_experience']; ?>years</strong></p>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs job-type text-center">
										<p class="job-salary"><strong><i class="fa fa-rupee"></i>&nbsp;<?php echo $row['min_remuneration'];?> - <?php echo $row['max_remuneration'];?> Lacs</strong></p>
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
		
			?>
			<div class="container">
				<ul class="pagination">
					<?php

					for ($i=1; $i <=$total_pages ; $i++) { 
						echo '<li class="we"><a href="jobslist.php?page='.$i.'">'.$i.'</a></li>';		
					}
					?>
				  
				  
				</ul>
			</div>
	
			<?php
	}


	function getjobs_home(){


		?>
		<div class="row text-center">
					<div class="col-sm-12">
						<h1 style="font-size:38px;">jobs</h1>
						
				</div>		
				</div><br><br><br>

				<?php

			$sql="select * from ".TBL_JOBS." where 1 limit 0,6";
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

				$sql2="select * from ".TBL_STATELIST." where location_id= '".$row['location_id']."' ";
				$result2= $this->db->query($sql2,__FILE__,__LINE__);
				$row2= mysql_fetch_assoc($result2);

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
										
										<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<strong style="text-transform:capitalize;" >  <?php echo $row2['city_name']; ?></strong></p>
										<p><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;<strong><?php echo $row['min_experience']; ?> - <?php echo $row['max_experience']; ?>years</strong></p>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs job-type text-center">
										<p class="job-salary"><strong><i class="fa fa-rupee"></i>&nbsp;<?php echo $row['min_remuneration'];?> - <?php echo $row['max_remuneration'];?> Lacs</strong></p>
										<p class="badge full-time"><?php echo $row['job_type']; ?></p>
									</div>
									<div class="col-lg-2 visible-lg-block">

										<p class="job-posted"><strong><?php echo $key_skills; ?></strong></p>
										
									</div>
								</div>
							</a>
							
							

						</div>

						

					</div>
				</div>
			</div>
			<?php

			}




	}



	function get_job_details($id){


					$sql="select * from ".TBL_JOBS." where job_id='".$id."' ";
					// $sql1="select * from ".TBL_COMPANY." where company_id='".$_SESSION['company_id']."' ";
					
					//$sql.="inner join ".TBL_COMPANY." on ".TBL_JOBS.".company_id=".TBL_COMPANY.".company_id ";

					$result= $this->db->query($sql,__FILE__,__LINE__);

					
					$row= $this->db->fetch_array($result);
					$skills=json_decode($row['key_skills']);
					$education=json_decode($row['qualifications'], true);
					$comp_id=$row['company_id'];
					
					$row['employee_id']=$_SESSION['employee_id'];


					//$sql1="SELECT * FROM TBL_COMPANY INNER JOIN TBL_LOGO ON TBL_COMPANY.user_id = TBL_LOGO.user_id WHERE TBL_COMPANY.company_id = '".$row['company_id']."' ";
					// $result1= $this->db->query($sql1,__FILE__,__LINE__);

					
					// $row1= $this->db->fetch_array($result1);
					 // print_r($row1);
					$sql2="select * from ".TBL_STATELIST." where location_id= '".$row['location_id']."' ";
					$result2= $this->db->query($sql2,__FILE__,__LINE__);
					$row2= mysql_fetch_assoc($result2);
				

					$sql3="select * from ".TBL_COMPANY." where company_id='".$row['company_id']."' ";
					$result3= $this->db->query($sql3,__FILE__,__LINE__);
					$row3= $this->db->fetch_array($result3);

					$sql4="select * from ".TBL_LOGO." where company_id='".$row['company_id']."' ";
					$result4= $this->db->query($sql4,__FILE__,__LINE__);
					$row4= $this->db->fetch_array($result4);
?>
				
					<section>
					<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1><?php echo $row['role_title']; ?></h1>
						<h4>
							<span><i class="fa fa-map-marker"></i><?php echo $row2['city_name'];?></span>
							<span><i class="fa fa-clock-o"></i><?php echo $row['job_type'];?></span>
							<span><i class="fa fa-rupee"></i><?php echo $row['min_remuneration'];?> - <?php echo $row['max_remuneration'];?> Lacs</span>
						</h4>
					</div>
				</div>
			</div>
			</section> 
					<div class="container">
				<div class="row">
					<div class="col-sm-8">
					
							<div class="col-sm-8">
								
								<h3>Job Description</h3>

								<h5><?php echo $row['department'];?></h5><br>
								<p><?php echo nl2br($row['job_description']);?></p>
						

								
								<label>Job Experience :</label>&nbsp;<span><?php echo $row['min_experience'];?> - <?php echo $row['max_experience'];?> Years</span>
								
								<?php
								if ($row['experience_details']!=="") {
								?>
									<p><?php echo nl2br($row['experience_details']);?></p>	
								<?php
								}
								
									if ($row['value_proposition']!=="") { ?>
										<label>Employee Value Proposition :</label>&nbsp;<span style="text-transform:capitalize;"><?php echo $row['value_proposition'];?></span>
								<?php	}

									if ($row['shift_timimg']=="Yes") { ?>
										<br><label>Shift Timing :</label>&nbsp;<span style="text-transform:capitalize;">Available </span>
								<?php	}

								?>	
							</div>
							
							<div class="col-sm-8">	
							<br><h6>Key Skills </h6><br>

								<?php
								// print_r($skills);

									for ($i=0; $i <count($skills) ; $i++) { ?>
										
										<a class='btn btn-info btn-sm' style="text-transform:none;"><?php echo($skills[$i]); ?></a>
								<?php	}

								?>
							
								

							</div>	
							<div class="col-sm-8">	
							<br><h6>Desired Candidate Profile </h6><br>

							<label>Education :</label>&nbsp;
							<span style="text-transform:capitalize;">
								<?php 

									for ($i=0; $i <count($education) ; $i++) { 

										$edd=$education[$i];
								?>
									<br><b><?php echo $edd['degree_type']?></b> (<?php echo $edd['course_type']?>) in <?php echo $edd['spec_type']?>			

								<?php	}
								?>
							</span>


							<?php

								if ($row['keys_accountabilities']!=="") { ?>
									<br><br><label>Key Accountibilities :</label>&nbsp;<span style="text-transform:capitalize;"><?php echo $row['keys_accountabilities'];?></span>
							
							<?php	}
							
							?>
							</div>	
							
							<script>
							    var myvar = <?php echo json_encode($row); ?>;
							    console.log(myvar);

							    applyJob=function(job){
								    		
							    	$.ajax({
        
								        method: "POST",
								        url: "api.php?work=apply_job",

								        data: job,
								       
								       
								                    
								       success:function(data){
								        console.log(data);

								       $('#abc').modal('show');
								       }

								    })

							    }

							    loginPanel=function(){
							    	$('#loginModal').modal('show');
							    }
							</script>	

							<?php if (!isset($_SESSION['user_type']) || $_SESSION['user_type']=='2') {
							?>	
									<div class="col-sm-8" align="center">
									<?php
										if (isset($_SESSION['user_id'])) { ?>
											<br><a class="btn btn-primary btn-lg" onclick="applyJob(myvar)">Apply Here</a>
								<?php	}else{?>
											<br><a class="btn btn-primary btn-lg" onclick="loginPanel()">Login to Apply</a>
								<?php   } 
							
								?>
									
								</div>
							<?php }
							?>						
							
						
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
							<h3><?php echo $row3['company_name'];?></h3>

							<?php  

								if($row1['logo_name']!==""){  ?>

								<p><img src="uploads/<?php echo $row4['logo_name'];?>" class="img-responsive" style="width:170px; height:170px;"></p>

							<?php	}
							?>
							
							<p><?php echo $row3['company_description'];?></p>
							
						</div>
						<hr>
						<h2>More jobs from this company</h2>
						<div class="sidebar-widget jobs" style="max-height: 240px;overflow-y: scroll;display:inherit;">
							
							<?php
								$sql="select * from ".TBL_JOBS." where company_id= '".$comp_id."' ";
								$result= $this->db->query($sql,__FILE__,__LINE__);

								while($row= $this->db->fetch_array($result)){
									$id=$row['job_id'];
							?>		
							<a href="job_details.php?id=<?php echo($id) ?>"  class="featured applied">
								<div class="row">
									
									<div class="col-lg-7 col-md-5 col-sm-6 col-xs-12 job-title" style="line-height:0;">
										<h5><?php echo $row['role_title']; ?></h5>
										<p><strong><?php echo $row['department']; ?></strong> <?php echo $row['job_category']; ?></p>
									</div>
									
									<div class="col-lg-5 visible-lg-block" style="padding-top:10%;">

										<p class="job-salary"><strong><i class="fa fa-rupee"></i>&nbsp;<?php echo $row['remuneration'];?></strong></p>
										
									</div>
								</div>
							</a>
							
							<?php
								}	
							?>
							
						</div>
					</div>
				</div>
			</div>

		</section>


<?php





	}



	function applyJob(){

			$sql="select * from ".TBL_COMPANY." where company_id= '".$_REQUEST['company_id']."' ";
			$result= $this->db->query($sql,__FILE__,__LINE__);

			$row= $this->db->fetch_array($result);
			

			$roletitle=$_REQUEST['role_title'];
			$department=$_REQUEST['department'];
			$company_email=$row['company_email'];
			$candidate_id=$_REQUEST['employee_id'];


								$to = $company_email;
						                    
	                            $subject = "New registration @ ".$roletitle." in ".$department."" ;
	                            $comment = '<div style="text-align:left">

	                            <p>Hello ,</p>
	                            <p>A Candidate is intersted in a Job you mentioned.</p>
	                            <p>See the profile of the Candidate 
	                            <a href="http://itsrecruitment.in/its_recruitment/applicant_prof.php?'.$candidate_id.'"> Here</a></p> 
	                            									


	                            
	                            <p>Regards,</p>
	                            <p>The ITS Recruitment Team</p>
	                            </div>';
	                            $header = "From: its.sangita@itsgroup.com\r\n"; 
	                            $header.= "MIME-Version: 1.0\r\n"; 
	                            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
	                            $header.= "X-Priority: 1\r\n"; 

	                           mail($to, $subject, $comment, $header);
	}



	function loginpanel(){

			$resp=array();
			$resp['status']=true;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

			// print_r($_REQUEST);



				$sql = "select * from ".TBL_USER." where user='".$_REQUEST['username']."'";
							$record = $this->db->query($sql,__FILE__,__LINE__);
							$row = $this->db->fetch_array($record);
							if($_REQUEST['username'] == $row['user'] and $_REQUEST['password'] == $row['password'])
								{
									if($row['status'] == 'block')
									{
									$_SESSION['error_msg1']='User is Blocked Please Contact Administrator ...';

									
								}else{

									$this->user_id= $row['user_id'];
									$this->groups= $row['auth_to'];
									$this->user_type= $row['type'];
									$this->name= $row['name'];
									$this->employee_id= $row['employee_id'];
									
									
									$this->auth->Create_Session1($username,$this->user_id,$this->name,$this->user_type,$this->company_id,$this->employee_id);
									$resp['status_msg']='Login successfully';
								}
								}else{
									
									$_SESSION['error_msg1']='Invalid username or password, please try again';
									$resp['status_msg']='Invalid username or password, please try again';
									$resp['status']=false;
								}





			  echo json_encode($resp);

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
			$skills=$job['keyskills'];
			$keyskills=json_encode($job['keyskills']);
			$qualif=json_encode($job['qualification']);
			
					
					


					$insert_sql_array = array();
					$insert_sql_array['role_title'] = $job['roletitle'];
					$insert_sql_array['department'] = $job['department'];
					$insert_sql_array['location_id'] = $job['rolelocation'];
					$insert_sql_array['job_type'] = $job['jobtype'];
					$insert_sql_array['qualifications'] = $qualif;
					$insert_sql_array['job_description'] = $job['description'];
					$insert_sql_array['experience_details'] = $job['expdetails'];
					$insert_sql_array['key_skills'] = $keyskills;
					$insert_sql_array['min_remuneration'] = $job['rumeration_min'];
					$insert_sql_array['max_remuneration'] = $job['rumeration_max'];
					$insert_sql_array['min_experience'] = $job['min_experience'];
					$insert_sql_array['max_experience'] = $job['max_experience'];
					$insert_sql_array['value_proposition'] = $job['valueproposition'];
					$insert_sql_array['keys_accountabilities'] = $job['keysaccountabilities'];
					$insert_sql_array['shift_timimg'] = $job['shifttimimg'];

					$insert_sql_array['user_id']=$_SESSION['user_id'];
					
					if (isset($job['company_id'])) {
						$insert_sql_array['company_id']=$job['company_id'];
					}else{
						$insert_sql_array['company_id']=$_SESSION['company_id'];
					}	


					$this->db->insert(TBL_JOBS,$insert_sql_array);




					$id=$this->db->last_insert_id();
					

					 for ($i=0; $i <count($skills) ; $i++) { 
								

								
								$insert_sql_array = array();
								$insert_sql_array['skill_name'] = $skills[$i];
								$insert_sql_array['job_id'] = $id;

								
								$this->db->insert(TBL_JOBSKILLS,$insert_sql_array);
							
						 }


			 $resp['data']=$job['roletitle'];

			echo json_encode($resp);
	}



	function get_companies(){

			$resp=array();
			$resp['status']=true;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

			$sql="select * from ".TBL_COMPANY." where user_id= '".$_SESSION['user_id']."' ";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			
			$data=array();
			while ($row= $this->db->fetch_array($result)){

				$sql1="select * from ".TBL_LOGO." where company_id= '".$row['company_id']."' ";
				$result1= $this->db->query($sql1,__FILE__,__LINE__);
				$row1= $this->db->fetch_array($result1);
			
				
					
				$com['company']=$row;
				$com['company_logo']=$row1;

				$data[]=$com;
				}

				
			$resp['data']=$data;

			echo json_encode($resp);
		
	}

	function delete_company($comp_id){


			$resp=array();
			$resp['status']=true;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

			$sql=mysql_query("DELETE FROM TBL_COMPANY WHERE company_id= '".$comp_id."' ");
			// $result= $this->db->query($sql,__FILE__,__LINE__);
			// $row= $this->db->fetch_array($result);


			// print_r($sql);


			// $resp['data']=$row;

			echo json_encode($resp);

	}


}
?> 