<?php
class employee{

	 var $db;
	 var $validity;
	
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->auth=new Authentication();
		
		$this->Form = new ValidateForm();

		
		}
	
	function Login_form($runat)
	{
		
		switch($runat){
			case 'local' :

			?>
				



			<?php
					
						
						break;
			case 'server' :			
						extract($_POST);

						
						$sql = "select * from ".TBL_USER." where user='".$username."'";
							$record = $this->db->query($sql,__FILE__,__LINE__);
							$row = $this->db->fetch_array($record);
							if($username == $row['user'] and $password == $row['password'])
								{
									if($row['status'] == 'block')
									{
									$_SESSION['error_msg']='User is Blocked Please Contact Administrator ...';
									?>
									<script type="text/javascript">
									window.location="index.php";
									</script>
									<?php
									exit();
									}
									else
									{
									$this->user_id= $row['user_id'];
									$this->groups= $row['auth_to'];
									$this->user_type= $row['type'];
									
									$this->auth->Create_Session($username,$this->user_id,$this->groups,$this->user_type);
									?>
									<script type="text/javascript">
									window.location="web_app/";
									</script>
									<?php
									exit();
									}
								}
								else
								{
									$_SESSION['error_msg']='Invalid username or password, please try again ...';
								}
						
						break;
			default :		echo "Invalid Parameter";
		}
	}
	


	function CreateUser($runat)
	{
		switch($runat){
			case 'local':
						

						?>


					<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							<h2>Sign Up Here</h2>
							<h4>For Free!!</h4>
						
							</div>
						</div>

				<form name="" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="name-group">
								<label for="resume-name">Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="e.g. John Doe">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="email-group">
								<label for="resume-name">Email</label>
								<input type="text" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com">
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group" id="password-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="password">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="phoneno-group">
								<label for="resume-name">Phone No.</label>
								<input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="e.g. John Doe">
							</div>
						</div>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!--a class="btn btn-primary btn-lg" name="submit" value="register">Sign up <i class="fa fa-arrow-right"></i></a-->
						<button class="btn btn-primary btn-lg" name="submit" value="register">Sign up <i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
					
					<!-- Resume File Start -->

					

				</form>

			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);
							
							$this->password = $password;
							$this->username = $username;
							$this->name = $name;
							$this->phoneno = $phoneno;

							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
								$return =false;
							if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
								$return =false;	
							
							$sql="select * from ".TBL_USER." where user='".$this->username."'";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							if($this->db->num_rows($result)>0)
							{
								$_SESSION['error_msg'] = 'User already exist. Please select another username';
								?>
								<script type="text/javascript">
									window.location = "signup.php"
								</script>
								<?php
								exit();

								
							}
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['name'] = $this->name;
							$insert_sql_array['user'] = $this->username;
							$insert_sql_array['password'] = $this->password;
							$insert_sql_array['phoneno'] = $this->phoneno;
							$insert_sql_array['type'] = '2';
							$insert_sql_array['status'] = '1';
							//$insert_sql_array['auth_to'] = 'Superadmin';
							$this->db->insert(TBL_USER,$insert_sql_array);


							 $to = "gsaini94@ymail.com";
						                    
						                            $subject = "New registration @ Sales web" ;
						                            $comment = '<div style="text-align:left">

						                            <p>Hello ,</p>
						                            <p>New user has been registered with username "'.$username.'"
						                            
						                            <p>Regards,</p>
						                            <p>The Salesweb Team</p>
						                            </div>';
						                            $header = "From: noreply@Salesweb.com\r\n"; 
						                            $header.= "MIME-Version: 1.0\r\n"; 
						                            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
						                            $header.= "X-Priority: 1\r\n"; 

						                            //mail($to, $subject, $comment, $header);
							
							
							?>


							
							
						<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							
						
							</div>
						</div>

			
					
				<div class="jumbotron">	
					
					<div class="row text-center">
						<h4>You are successfully registered</h4>
						<h5>Click next to proceed</h5>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<a class="btn btn-primary btn-lg" name="submit" href="emp_prof1.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
						
					</div>
				</div>
			

			</div>



							<?php
							
							
							
							} 

							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}

	


	function empprofile1($runat)
	{
		switch($runat){
			case 'local':
						

						?>


					<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							<h2>Sign Up Here</h2>
							<h4>For Free!!</h4>
						
							</div>
						</div>

				<form name="" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	
					
					
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="name-group">
								<label for="resume-name">Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="e.g. John Doe">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="email-group">
								<label for="resume-name">Email</label>
								<input type="text" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com">
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="phoneno-group">
								<label for="resume-name">Phone No.</label>
								<input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="e.g. John Doe">
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="address-group">
								<label for="address">address</label>
								<input type="textarea" class="form-control" name="address" id="address" placeholder="address">
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="gender-group">
								<label for="gender">Gender</label><br>
								<input type="radio" name="gender" value="male" id="gender" >Male&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" value="female" id="gender" >Female&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" value="Other">Others
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="age-group">
								<label for="">Age</label>
								<input type="number" id="age" class="form-control" name="age">
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="photo-group">
								<label for="photo">Photo</label>
								<input type="file" id="photo" name="photo">
							</div>
						</div>
					</div>	


					
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" name="submit" value="register">Next <i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
					
				

					

				</form>

			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);
							
							$this->address = $address;
							$this->username = $username;
							$this->name = $name;
							$this->phoneno = $phoneno;
							$this->gender = $gender;
							$this->age = $age;

							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							$sql="select * from ".employeeprof1." where name='".$this->name."'";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							if($this->db->num_rows($result)>0)
							{
								$_SESSION['error_msg'] = 'User already exist. Please select another username';
								?>
								<script type="text/javascript">
									window.location = "emp_prof1.php"
								</script>
								<?php
								exit();

								
							}
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['name'] = $this->name;
							$insert_sql_array['email'] = $this->username;
							//$insert_sql_array['password'] = $this->password;
							$insert_sql_array['phoneno'] = $this->phoneno;
							$insert_sql_array['age'] = $this->age;
							$insert_sql_array['address'] = $this->address;
							$insert_sql_array['gender'] = $this->gender;
							$this->db->insert(employeeprof1,$insert_sql_array);

?>
								<script type="text/javascript">
									window.location = "emp_prof2.php"
								</script>
								<?php
								exit();
							
							
							
							
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->CreateUser.('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}



	
	function empprofile2($runat)
	{
		switch($runat){
			case 'local':
						

						?>


					<div class="container">
						<div class="row">
							<div class="col-sm-12">
							<h2>Education</h2>
							
						
							</div>
						</div>

				<form name="" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	
					<h3>School</h3>
					
					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								<label for="school">School Name</label>
								<input type="text" class="form-control" id="school" name="school" placeholder="School name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="school_city" id="city" placeholder="name of city">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="school_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Start/End Date</label><br>

								<span class="col-sm-6"><input type="date" class="form-control" name="school_start" id="education-dates"></span>
								<span class="col-sm-6"><input type="date" class="form-control" name="school_end" id="education-dates"></span>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					
					<h3>Graduation</h3>
					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								<label for="school">college Name</label>
								<input type="text" class="form-control" name="grad_name" id="grad" placeholder="college name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="grad_city" id="city" placeholder="name of city">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="grad_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Start/End Date</label><br>

								<span class="col-sm-6"><input type="date" class="form-control" name="grad_start" id="education-dates"></span>
								<span class="col-sm-6"><input type="date" class="form-control" name="grad_end" id="education-dates"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<h3>post Graduatoin</h3>
					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								<label for="school">college Name</label>
								<input type="text" class="form-control" name="postgrad_name" id="postgrad" placeholder="college name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="postgrad_city" id="city" placeholder="name of city">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="postgrad_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Start/End Date</label><br>

								<span class="col-sm-6"><input type="date" class="form-control" name="postgrad_start" id="education-dates"></span>
								<span class="col-sm-6"><input type="date" class="form-control" name="postgrad_end" id="education-dates"></span>
							</div>
						</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<h3>certificates</h3>
					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								<label for="school">certificates</label>
								<input type="text" class="form-control" id="school" placeholder="School name, city and country">
							</div>
						</div>
						
					</div>
					

				</div>	


					
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" name="submit" value="register">Next <i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
					
				

					

				</form>

			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);
							
							$this->school_city = $school_city;
							$this->school = $school;
							$this->school_qualifications = $school_qualifications;
							$this->school_start = $school_start;
							$this->school_end = $school_end;

							$this->grad_name = $grad_name;
							$this->grad_city = $grad_city;
							$this->grad_qualifications = $grad_qualifications;
							$this->grad_start = $grad_start;
							$this->grad_end = $grad_end;

							$this->postgrad_name = $postgrad_name;
							$this->postgrad_city = $postgrad_city;
							$this->postgrad_qualifications = $postgrad_qualifications;
							$this->postgrad_start = $postgrad_start;
							$this->postgrad_end = $postgrad_end;

							

							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							$sql="select * from ".tbl_employee_edd." where school_name='".$this->school."'";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							if($this->db->num_rows($result)>0)
							{
								$_SESSION['error_msg'] = 'User already exist. Please select another username';
								?>
								<script type="text/javascript">
									window.location = "jobs2.php"
								</script>
								<?php
								exit();

								
							}
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['school_name'] = $this->school;
							$insert_sql_array['school_city'] = $this->school_city;
							$insert_sql_array['school_qualifications'] = $this->school_qualifications;
							$insert_sql_array['school_start'] = $this->school_start;
							$insert_sql_array['school_end'] = $this->school_end;

							$insert_sql_array['grad_school'] = $this->grad_name;
							$insert_sql_array['grad_city'] = $this->grad_city;
							$insert_sql_array['grad_qualifications'] = $this->grad_qualifications;
							$insert_sql_array['grad_start'] = $this->grad_start;
							$insert_sql_array['grad_end'] = $this->grad_end;

							$insert_sql_array['postgrad_school'] = $this->postgrad_name;
							$insert_sql_array['postgrad_city'] = $this->postgrad_city;
							$insert_sql_array['postgrad_qualifications'] = $this->postgrad_qualifications;
							$insert_sql_array['postgrad_start'] = $this->postgrad_start;
							$insert_sql_array['postgrad_end'] = $this->postgrad_end;


							//$insert_sql_array['address'] = $this->address;
							//$insert_sql_array['gender'] = $this->gender;
							$this->db->insert(tbl_employee_edd,$insert_sql_array);

?>
								<script type="text/javascript">
									window.location = "post-a-resume1.php"
								</script>
								<?php
								exit();
							
							
							
							
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->CreateUser.('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}	
	
}
?> 