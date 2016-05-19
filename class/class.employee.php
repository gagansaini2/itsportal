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
				<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							<h2 style="height: 2px;">Sign In</h2>
							<style>
							h2::after {
								
								content: none;
								
								/*display: block;
								height: 5px;
								margin-top: 10px;
								width: 60px;*/
							}
							</style>
							<h4></h4>
						
							</div>
						</div>

				<form name="" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	

				

					<div class="row">
						
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
						
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!--a class="btn btn-primary btn-lg" name="submit" value="register">Sign up <i class="fa fa-arrow-right"></i></a-->
						<button class="btn btn-primary btn-lg" name="submit" value="register">Sign in <i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
					
					<!-- Resume File Start -->

					

				</form>

			</div>



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
									//$this->groups= $row['auth_to'];
									$this->user_type= $row['type'];
									$this->name= $row['name'];
									$this->employee_id= $row['employee_id'];
									
									
									$this->auth->Create_Session1($username,$this->user_id,$this->name,$this->user_type,$this->company_id,$this->employee_id);
									?>
									<script type="text/javascript">
									window.location="emp_prof1.php";
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
						
						<a class="btn btn-primary btn-lg" name="submit" href="signin.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
						
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
						<div class="row ">
							<div class="col-sm-12">
							<h2>add your details</h2>
							
						
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
							
							$sql="select * from ".tbl_employee_del." where email='".$this->username."'";
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

							$insert_sql_array['user_id']=$_SESSION['user_id'];
							$this->db->insert(tbl_employee_del,$insert_sql_array);


							$id=$this->db->last_insert_id();
							$_SESSION['employee_id']=$id;

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
								<input type="text" class="form-control" name="school_city" id="city" placeholder="Name of city">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="school_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Board</label>
								<input type="text" class="form-control" name="school_board" id="board" placeholder="Affilation">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of passing</label><br>
								<select  name="school_passing" class="form-control">
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
								<input type="text" class="form-control" name="grad_name" id="grad" placeholder="College name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="grad_city" id="city" placeholder="Name of city">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="grad_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">University</label>
								<input type="text" class="form-control" name="grad_board" id="board" placeholder="Affilation">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of passing</label><br>
								<select  name="grad_passing" class="form-control">
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
								<input type="text" class="form-control" name="postgrad_name" id="postgrad" placeholder="College name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="postgrad_city" id="city" placeholder="Name of city">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="postgrad_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">University</label>
								<input type="text" class="form-control" name="postgrad_board" id="board" placeholder="Affilation">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of passing</label><br>
								<select  name="postgrad_passing" class="form-control">
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
						
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr class="dashed">
						</div>
					</div>
					<h3>certificates</h3>
					<div class="row certificate">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								
								<input type="text" class="form-control" name="certificate1" id="certificate" placeholder="course name">
								
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-sm-12">
							<p><a id="add-certificate">+ Add certificate</a></p>
							<hr>
						</div>
					</div>

					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" name="submit" value="register">Next <i class="fa fa-arrow-right"></i></button>
					</div>

					
					

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
							$this->school_board = $school_board;
							$this->school_passing = $school_passing;

							$this->grad_name = $grad_name;
							$this->grad_city = $grad_city;
							$this->grad_qualifications = $grad_qualifications;
							$this->grad_board = $grad_board;
							$this->grad_passing = $grad_passing;

							$this->postgrad_name = $postgrad_name;
							$this->postgrad_city = $postgrad_city;
							$this->postgrad_qualifications = $postgrad_qualifications;
							$this->postgrad_board = $postgrad_board;
							$this->postgrad_passing = $postgrad_passing;

							

							$this->certificate1 = $certificate1;
							$this->certificate2 = $certificate2;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							// 
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['school_name'] = $this->school;
							$insert_sql_array['school_city'] = $this->school_city;
							$insert_sql_array['school_qualifications'] = $this->school_qualifications;
							$insert_sql_array['school_board'] = $this->school_board;
							$insert_sql_array['school_passing'] = $this->school_passing;

							$insert_sql_array['grad_school'] = $this->grad_name;
							$insert_sql_array['grad_city'] = $this->grad_city;
							$insert_sql_array['grad_qualifications'] = $this->grad_qualifications;
							$insert_sql_array['grad_board'] = $this->grad_board;
							$insert_sql_array['grad_passing'] = $this->grad_passing;

							$insert_sql_array['postgrad_school'] = $this->postgrad_name;
							$insert_sql_array['postgrad_city'] = $this->postgrad_city;
							$insert_sql_array['postgrad_qualifications'] = $this->postgrad_qualifications;
							$insert_sql_array['postgrad_board'] = $this->postgrad_board;
							$insert_sql_array['postgrad_passing'] = $this->postgrad_passing;


							$insert_sql_array['certificate'] = $this->certificate1.','.$this->certificate2;

							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(tbl_employee_edd,$insert_sql_array);

?>
								<script type="text/javascript">
									window.location = "emp_prof3.php"
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





	function empprofile3($runat)
	{
		switch($runat){
			case 'local':
						

						?>


						<div class="container">
						<div class="row ">
							<div class="col-sm-12">
							<h2>experience</h2>
							
						
							</div>
						</div>

				<form name="" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron form-center">	
					
					
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" >
								<label for="resume-name">How much work experience do you have?</label>&nbsp;&nbsp;&nbsp;
								<select style="width: 90px;" name="exyear" id="expyear" class="error">
									<option value="-1" selected="">Select</option>
									<option value="99">Fresher</option>
									<option value="0" label="0">0</option>
									<option value="1" label="1">1</option>
									<option value="2" label="2">2</option>
									<option value="3" label="3">3</option>
									<option value="4" label="4">4</option>
									<option value="5" label="5">5</option>
									<option value="6" label="6">6</option>
									<option value="7" label="7">7</option>
									<option value="8" label="8">8</option>
									<option value="9" label="9">9</option>
									<option value="10" label="10">10</option>
									<option value="11" label="11">11</option>
									<option value="12" label="12">12</option>
									<option value="13" label="13">13</option>
									<option value="14" label="14">14</option>
									<option value="15" label="15">15</option>
									<option value="16" label="16">16</option>
									<option value="17" label="17">17</option>
									<option value="18" label="18">18</option>
									<option value="19" label="19">19</option>
									<option value="20" label="20">20</option>
									<option value="21" label="21">21</option>
									<option value="22" label="22">22</option>
									<option value="23" label="23">23</option>
									<option value="24" label="24">24</option>
									<option value="25" label="25">25</option>
									<option value="26" label="26">26</option>
									<option value="27" label="27">27</option>
									<option value="28" label="28">28</option>
									<option value="29" label="29">29</option>
									<option value="30" label="30">30</option>
									<option value="31" label="30+">30+</option>
								</select>  years
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">What are your Key Skills?</label>
								<input type="text" class="form-control" name="keyskills">
								
								<!-- <input type="textarea" name="aabe" class=" form-control" style="height:120px;" /> -->
							</div>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">job title of the last job</label>
								<input type="text" class="form-control" name="lastjob"  >
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
							
							$this->exyear = $exyear;
							$this->keyskills = $keyskills;
							$this->lastjob = $lastjob;
							// $this->phoneno = $phoneno;
							// $this->gender = $gender;
							// $this->age = $age;

							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['experience_yrs'] = $this->exyear;
							$insert_sql_array['key_skills'] = $this->keyskills;
							//$insert_sql_array['password'] = $this->password;
							$insert_sql_array['last_job'] = $this->lastjob;
							// $insert_sql_array['age'] = $this->age;
							// $insert_sql_array['address'] = $this->address;
							// $insert_sql_array['gender'] = $this->gender;

							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(tbl_employee_exp,$insert_sql_array);

?>
								<script type="text/javascript">
									window.location = "jobs2.php"
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