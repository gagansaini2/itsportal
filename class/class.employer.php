<?php
class employer{

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
							<h2 style="height: 2px;">Sign Up Here</h2>
							<style>
							h2::after {
								
								content: none;
								
								/*display: block;
								height: 5px;
								margin-top: 10px;
								width: 60px;*/
							}
							</style>
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
									window.location = "jobs2.php"
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
							$insert_sql_array['type'] = '3';
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

						                           // mail($to, $subject, $comment, $header);
							
							$_SESSION['msg'] = 'User has been created Successfully';
							
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
						
						<a class="btn btn-primary btn-lg" name="submit" href="jobs2.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
						
					</div>
				</div>
			

			</div>
							<?php
							
							
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->CreateUser.('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}




	function comp_prof($runat)
	{
		switch($runat){
			case 'local':
						

						?>


			<div class="container">
				

				
					<h2>Company Details</h2>
					<div class="jumbotron">	

						<div class="row">
						<form name="" method="POST">	
							
						<div class="col-sm-6">
							
							<div class="form-group" id="company-name-group">
								<label for="company-name">Company Name</label>
								<input type="text" class="form-control" id="company-name" name="company_name" placeholder="">
							</div>
							<div class="form-group" id="job-email-group">
								<label for="job-email">Email</label>
								<input type="email" class="form-control" id="job-email" name="company_email" placeholder="">
							</div>
							<div class="form-group" id="company-group">
								<label for="company">location</label>
								<input type="text" class="form-control" id="company-location" name="company_location" placeholder="">
							</div>
							<div class="form-group" id="company-group">
								<label for="company">phone number</label>
								<input type="text" class="form-control" id="company-num" name="company_num" placeholder="">
							</div>
							<div class="form-group" id="company-website-group">
								<label for="company-website">Website </label>
								<input type="text" class="form-control" id="company-website" name="company_website" placeholder="http://">
							</div>

							

							<div class="form-group col-sm-6" id="company-group">
								<label for="company">Domain</label>
								<select  class="form-control" id="job-type" name="company_type">
									<option>Choose a job type</option>
									<option>Freelance</option>
									<option>Part Time</option>
									<option>Full Time</option>
									<option>Internship</option>
									<option>Volunteer</option>
								</select>
							</div>
							<div class="form-group col-sm-6" id="company-group">
								<label for="company">size of employees</label>
								<input type="text" class="form-control" id="company-emp" name="company_size" placeholder="">
							</div>
							<div class="form-group" id="company-logo-group">
								<label for="company-logo">Logo</label>
								<input type="file" id="company-logo">
							</div>
							
							
							
							


							<!--div class="form-group" id="company-facebook-group">
								<label for="company-facebook">Facebook Username (Optional)</label>
								<input type="text" class="form-control" id="company-facebook" placeholder="yourcompany">
							</div>
							<div class="form-group" id="company-linkedin-group">
								<label for="company-linkedin">LinkedIn Username (Optional)</label>
								<input type="text" class="form-control" id="company-linkedin" placeholder="yourcompany">
							</div>
							<div class="form-group" id="company-twitter-group">
								<label for="company-twitter">Twitter Username (Optional)</label>
								<input type="text" class="form-control" id="company-twitter" placeholder="@yourcompany">
							</div-->
							
						</div>
					
						<div class="col-sm-6">
							<div class="form-group" id="company-tagline-group">
								<label for="company-tagline">Tagline </label>
								<input type="text" class="form-control" id="company-tagline"  name="company_tagline" placeholder="Brief description">
							</div>
							<div class="form-group" id="company-description-group">
								<label for="company-description">Description </label>
								<textarea class="textarea form-control" id="company-description" name="company_description"></textarea>
							</div>
							<div class="form-group" id="company-video-group">
								<label for="company-video">Company Vision</label>
								<input type="text" class="form-control" id="company-vision" name="company_vision" placeholder="Vision">
							</div>
							<div class="form-group" id="company-google-group">
								<label for="company-google">Mission</label>
								<input type="text" class="form-control" id="company-mission" name="company_mission" placeholder="your company Mission">
							</div>
							

						</div>
						</div>



						<div align="center">
							<button class="btn btn-primary btn-lg" name="submit" value="register">Submit <i class="fa fa-arrow-right"></i></button>
						</div>
						</form>
					</div>
				
			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);
							
							$this->company_name = $company_name;
							$this->company_email = $company_email;
							$this->company_location = $company_location;
							$this->company_num = $company_num;
							$this->company_website = $company_website;
							$this->company_type = $company_type;
							$this->company_tagline = $company_tagline;
							$this->company_description = $company_description;
							$this->company_vision = $company_vision;
							$this->company_mission = $company_mission;


							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							$sql="select * from ".tbl_company." where company_name='".$this->company_name."'";
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
							$insert_sql_array['company_name'] = $this->company_name;
							$insert_sql_array['company_email'] = $this->company_email;
							$insert_sql_array['company_location'] = $this->company_location;
							$insert_sql_array['company_num'] = $this->company_num;
							$insert_sql_array['company_website'] = $this->company_website;
							$insert_sql_array['company_type'] = $this->company_type;
							$insert_sql_array['company_tagline'] = $this->company_tagline;
							$insert_sql_array['company_description'] = $this->company_description;
							$insert_sql_array['company_vision'] = $this->company_vision;
							$insert_sql_array['company_mission'] = $this->company_mission;
							$this->db->insert(tbl_company,$insert_sql_array);

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

	



	
}
?> 