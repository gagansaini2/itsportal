<?php
class employee{

	 var $db;
	 var $validity;
	
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->auth=new Authentication();
		
		$this->Form = new ValidateForm();
		$this->validity = new ClsJSFormValidation();

		
		}
	
	function Login_form($runat)
	{
		
		switch($runat){
			case 'local' :


			 if(count($_POST)>0 and $_POST['submit']=='Submit'){
                extract($_POST);
                $this->username = $username;
                $this->password = $password;
               
            }
            $FormName = "signin_form";
            $ControlNames=array(
                                 
                                "name"=>array('username',"EMail","Please enter Email","span_username"),
                                "password"=>array('password',"","Please enter Password","span_password")
                               
            );

            $ValidationFunctionName="Login_form";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

			?>
				<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							<h1 style="font-size:34px;">Sign In</h1>
							<style>
							h2::after {
								
								/*content: none;
								
								display: block;
								height: 5px;
								margin-top: 10px;
								width: 60px;*/
							}
							</style>
							<h4></h4>
						
							</div>
						</div>

				<form name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	

					<h5 class="text-center"><?php if (isset($_SESSION['error_msg1'])) {
							echo $_SESSION['error_msg1'];
							
					}?></h5><br><br>

				

					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group" id="email-group">
								<label for="resume-name">Email</label>
								<input type="text" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com">
								 <span id="span_username"></span>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group" id="password-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="password">
								 <span id="span_password"></span>
							</div>
						</div>
						
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!--a class="btn btn-primary btn-lg" name="submit" value="register">Sign up <i class="fa fa-arrow-right"></i></a-->
						<button class="btn btn-primary btn-lg" name="submit" value="register" onclick="return <?php echo $ValidationFunctionName;?>()" >Sign in <i class="fa fa-arrow-right"></i></button>
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
									$_SESSION['error_msg1']='User is Blocked Please Contact Administrator ...';

									?>
									<script type="text/javascript">
									window.location="signin.php";
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
									$_SESSION['error_msg1']='Invalid username or password, please try again';
									$this->Login_form('local');
								}
						
						break;
			default :		echo "Invalid Parameter";
		}
	}
	


	function CreateUser($runat)
	{
		switch($runat){
			case 'local':
					

					 if(count($_POST)>0 and $_POST['submit']=='Submit'){
                extract($_POST);
                $this->name = $name;
                $this->username = $username;
                $this->password = $password;
                $this->phoneno = $phoneno;
              
               
            }
            $FormName = "signup_form";
            $ControlNames=array(
                                 
                                "name"=>array('name',"''","Please enter Name","span_name"),
                                "password"=>array('password',"Password","Please enter Password","span_password"),
                                "username"=>array('username',"EMail","Please enter Email","span_username"),
                                "phoneno"=>array('phoneno',"Number","Please enter Phone Number","span_phoneno")
                               
            );

            $ValidationFunctionName="CreateUser";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;	

						?>


					<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							<h1>Sign Up Here</h1>
							<style>
							h2::after {
								
								/*content: none;*/
								
								/*display: block;
								height: 5px;
								margin-top: 10px;
								width: 60px;*/
							}
							</style>
							<h4>For Free!!</h4>
						
							</div>
						</div>

				<form name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	

				<h5 class="text-center"><?php if (isset($_SESSION['error_msg'])) {
							echo $_SESSION['error_msg'];
					}?></h5><br><br>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" id="name-group">
								<label for="resume-name">Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="e.g. John Doe">
								<span id="span_name"></span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="email-group">
								<label for="resume-name">Email</label>
								<input type="email" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com">
								<span id="span_username"></span>
							</div>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group" id="password-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="password">
								<span id="span_password"></span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="phoneno-group">
								<label for="resume-name">Phone No.</label>
								<input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="e.g. John Doe">
								<span id="span_phoneno"></span>
							</div>
						</div>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!--a class="btn btn-primary btn-lg" name="submit" value="register">Sign up <i class="fa fa-arrow-right"></i></a-->
						<button class="btn btn-primary btn-lg" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Sign up <i class="fa fa-arrow-right"></i></button>
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
							// if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							// 	$return =false;
							// if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							// 	$return =false;	
							
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
						
				 if(count($_POST)>0 and $_POST['submit']=='Submit'){
                extract($_POST);
                $this->name = $name;
                $this->username = $username;
                $this->phoneno = $phoneno;
                $this->address = $address;
                $this->gender = $gender;
                $this->age = $age;
               
            }
            $FormName = "empdetails";
            $ControlNames=array(
                                 
                                "name"=>array('name',"''","Please enter name","span_name"),
                                "username"=>array('username',"EMail","Please enter your Email ","span_username"),
                                "phoneno"=>array('phoneno',"Number","Please enter Phoneno","span_phoneno"),
                                "address"=>array('address',"''","Please enter location ","span_location"),
                               
                                "gender"=>array('gender',"''","Please select one ","span_gender"),
                                "age"=>array('age',"Number","Please enter your Age ","span_age")
                               
            );

            $ValidationFunctionName="empprofile1";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;


						?>


					<div class="container">
						
						<h2>add your details</h2>

				<form  name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	
					
					
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="name-group">
								<label for="resume-name">Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="e.g. John Doe">
								<span id="span_name"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="email-group">
								<label for="resume-name">Email</label>
								<input type="text" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com">
								<span id="span_username"></span>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="phoneno-group">
								<label for="resume-name">Phone No.</label>
								<input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="e.g. John Doe">
								<span id="span_phoneno"></span>

							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="address-group">
								<label for="address">address</label>
								<input type="textarea" class="form-control" name="address" id="address" placeholder="address">
								<span id="span_location"></span>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="gender-group">
								<label for="gender">Gender</label><br>
								<input type="radio" name="gender" value="male" id="gender" >Male&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" value="female" id="gender" >Female&nbsp;&nbsp;&nbsp;&nbsp;
								
								<span id="span_gender"></span>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group" id="age-group">
								<label for="">Age</label>
								<input type="number" id="age" class="form-control" name="age">
								<span id="span_age"></span>
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
						<button class="btn btn-primary btn-lg" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
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
						
				if(count($_POST)>0 and $_POST['submit']=='Submit'){
                	extract($_POST);

                $this->school = $school;
                $this->school_city = $school_city;
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

				
       
            }
            $FormName = "empeducation";
            $ControlNames=array(
                                 
                                "school"=>array('school',"''","Please enter Name","span_school"),
                                "school_city"=>array('school_city',"''","Please enter city ","span_school_city"),
                                "school_qualifications"=>array('school_qualifications',"''","Please enter your qualifications","span_school_qualifications"),
                                "school_board"=>array('school_board',"''","Please enter the Affilation ","span_school_board"),
                                "school_passing"=>array('school_passing',"''","Please select one ","span_school_passing"),
                                "grad_name"=>array('grad_name',"''","Please enter Name","span_grad_name"),
                                "grad_city"=>array('grad_city',"''","Please enter city","span_grad_city"),
                                "grad_qualifications"=>array('grad_qualifications',"''","Please enter your qualifications","span_grad_qualifications"),
                                "grad_passing"=>array('grad_passing',"''","Please select one ","span_grad_passing"),
                                "grad_board"=>array('grad_board',"''","Please enter the Affilation  ","span_grad_board"),
                               
                                "postgrad_name"=>array('postgrad_name',"''","Please enter Name ","span_postgrad_name"),
                                "postgrad_city"=>array('postgrad_city',"''","Please enter city ","span_postgrad_city"),
                                "postgrad_qualifications"=>array('postgrad_qualifications',"''","Please enter your qualifications","span_postgrad_qualifications"),
                              	"postgrad_board"=>array('postgrad_board',"''","Please enter the Affilation  ","span_postgrad_board"),
                                "postgrad_passing"=>array('postgrad_passing',"''","Please select one","span_postgrad_passing")
                                  
            );

            $ValidationFunctionName="empprofile2";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

						?>


					<div class="container">
						

						<h2>Education</h2>

				<form  name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron">	
					<h3>School</h3>
					
					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								<label for="school">School Name</label>
								<input type="text" class="form-control" id="school" name="school" placeholder="School name">
								<span id="span_school"></span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="school_city" id="city" placeholder="Name of city">
								<span id="span_school_city"></span>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="school_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
								<span id="span_school_qualifications"></span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Board</label>
								<input type="text" class="form-control" name="school_board" id="board" placeholder="Affilation">
								<span id="span_school_board"></span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of passing</label><br>
								<select  name="school_passing" class="form-control">
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
	
   </select><span id="span_school_passing"></span>
								
								
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
								<span id="span_grad_name"></span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="grad_city" id="city" placeholder="Name of city">
								<span id="span_grad_city"></span>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="grad_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
								<span id="span_grad_qualifications"></span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">University</label>
								<input type="text" class="form-control" name="grad_board" id="board" placeholder="Affilation">
								<span id="span_grad_board"></span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of passing</label><br>
								<select  name="grad_passing" class="form-control">
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
	
   </select><span id="span_grad_passing"></span>
								
								
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
								<span id="span_postgrad_name"></span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="city-group">
								<label for="city">City</label>
								<input type="text" class="form-control" name="postgrad_city" id="city" placeholder="Name of city">
								<span id="span_postgrad_city"></span>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">Qualifications</label>
								<input type="text" class="form-control" name="postgrad_qualifications" id="qualifications" placeholder="e.g. Master Engineer">
								<span id="span_postgrad_qualifications"></span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="qualifications-group">
								<label for="qualifications">University</label>
								<input type="text" class="form-control" name="postgrad_board" id="board" placeholder="Affilation">
								<span id="span_postgrad_board"></span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of passing</label><br>
								<select  name="postgrad_passing" class="form-control">
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
	
   </select><span id="span_postgrad_passing"></span>
								
								
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
						<button class="btn btn-primary btn-lg" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
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


			 if(count($_POST)>0 and $_POST['submit']=='Submit'){
                extract($_POST);
                $this->exyear = $exyear;
                $this->keyskills = $keyskills;
               
            }
            $FormName = "empexp";
            $ControlNames=array(
                                 
                                "exyear"=>array('exyear',"''","Please select","span_exyear"),
                                "keyskills"=>array('keyskills',"''","Please enter atleast one keyskill","span_keyskills")
                               
            );

            $ValidationFunctionName="empprofile3";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

						

						?>


						<div class="container">
						

						<h2>experience</h2>

				<form  name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST">

					<!-- Resume Details Start -->
				<div class="jumbotron form-center" >	


					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">What are your Key Skills?</label>
								<input type="text" class="form-control" name="keyskills">
								<span id="span_keyskills"></span>
								
								<!-- <input type="textarea" name="aabe" class=" form-control" style="height:120px;" /> -->
							</div>
						</div>
					</div>	
					
					
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">How much work experience do you have?</label>&nbsp;&nbsp;&nbsp;
								<select style="width:;" name="exyear" id="expyear" class="form-control error">
									<option value="" selected="">Select</option>
									<option value="0">Fresher</option>
									<option value="1" >1 years</option>
									<option value="2" >2 years</option>
									<option value="3" >3 years</option>
									<option value="4" >4 years</option>
									<option value="5" >5 years</option>
									<option value="6" >6 years</option>
									<option value="7" >7 years</option>
									<option value="8" >8 years</option>
									<option value="9" >9 years</option>
									<option value="10" >10 years</option>
									<option value="11" >11 years</option>
									<option value="12" >12 years</option>
									<option value="13" >13 years</option>
									<option value="14" >14 years</option>
									<option value="15" >15 years</option>
									<option value="16" >16 years</option>
									<option value="17" >17 years</option>
									<option value="18" >18 years</option>
									<option value="19" >19 years</option>
									<option value="20" >20 years</option>
									<option value="21" >21 years</option>
									<option value="22" >22 years</option>
									<option value="23" >23 years</option>
									<option value="24" >24 years</option>
									<option value="25" >25 years</option>
									<option value="26" >26 years</option>
									<option value="27" >27 years</option>
									<option value="28" >28 years</option>
									<option value="29" >29 years</option>
									<option value="30" >30 years</option>
									<option value="31" >30+ years</option>
								</select>   
								<span id="span_exyear"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">how many organisations worked with</label>
								<select style="width: ;" name="worknum" class="form-control error" >
									<option value="" selected="">Select</option>
									<option value="none">None</option>
									<option value="1" label="1">1</option>
									<option value="2" label="2">2</option>
									<option value="3" label="3">3</option>
									<option value="4" label="4">4</option>
									<option value="5" label="5">5</option>
									<option value="6" label="6">6</option>
									<option value="7" label="7">7</option>
									<option value="8" label="8">8</option>
									<option value="8+" label="8+">8+</option>
									
								</select>
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
					

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group" >
								<label for="resume-name">current salary</label>
								<select style="width: 180px;" class="form-control" name="curentsalary"  class="error">
									<option value="" selected="">Select</option>
									<option value="none">None</option>
									<option value="0.5" >0.5 lacs</option>
									<option value="1" >1 lacs</option>
									<option value="2" >2 lacs</option>
									<option value="3" >3 lacs</option>
									<option value="4" >4 lacs</option>
									<option value="5" >5 lacs</option>
									<option value="6" >6 lacs</option>
									<option value="7" >7 lacs</option>
									<option value="8" >8 lacs</option>
									<option value="8+">8+ lacs</option>
									
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group" >
								<label for="resume-name">expected salary</label>
								<select style="width: 180px;" class="form-control" name="expectsalary"  class="error">
									<option value="" selected="">Select</option>
									<option value="0.5" >0.5 lacs</option>
									<option value="1" >1 lacs</option>
									<option value="2" >2 lacs</option>
									<option value="3" >3 lacs</option>
									<option value="4" >4 lacs</option>
									<option value="5" >5 lacs</option>
									<option value="6" >6 lacs</option>
									<option value="7" >7 lacs</option>
									<option value="8" >8 lacs</option>
									<option value="8+">8+ lacs</option>
									
								</select>
							</div>
						</div>
					</div>	

					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">preffered job location</label>
								<select style="width: auto;" class="form-control" name="preferloc"  class="error">
								<option value="" selected="">Select</option>
								<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
								<option value="Daman and Diu">Daman and Diu</option>
								<option value="Delhi">Delhi</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu and Kashmir">Jammu and Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Orissa">Orissa</option>
								<option value="Pondicherry">Pondicherry</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttaranchal">Uttaranchal</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="West Bengal">West Bengal</option>
							</select>
							</div>
						</div>
					</div>	

					
					<div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">ready to relocate</label>&nbsp;&nbsp;&nbsp;
								<input type="radio" name="relocation" value="yes"  >Yes&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="relocation" value="no" >No&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</div>
					</div>	
					


					
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
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
							$this->worknum = $worknum;
							$this->curentsalary = $curentsalary;
							$this->expectsalary = $expectsalary;
							$this->preferloc = $preferloc;

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
							$insert_sql_array['company_worked'] = $this->worknum;
							$insert_sql_array['current_salary'] = $this->curentsalary;
							$insert_sql_array['expected_salary'] = $this->expectsalary;
							$insert_sql_array['prefered_loc'] = $this->preferloc;
							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(tbl_employee_exp,$insert_sql_array);

?>
								<div class="container">
						

			
					
				<div class="jumbotron">	
					
					<div class="row text-center">
						<h4>You are successfully registered</h4>
						<h5>Click next to see the jobs</h5>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<a class="btn btn-primary btn-lg" name="submit" href="jobslist.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
						
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
	
}
?> 