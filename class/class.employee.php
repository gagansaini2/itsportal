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
									window.location="emp_type.php";
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
                $this->fname = $fname;
                $this->lname = $lname;
                
                $this->username = $username;
                $this->phoneno = $phoneno;
                $this->street = $street;
                $this->city = $city;
                $this->state = $state;
                $this->zip = $zip;
                $this->gender = $gender;
                $this->month = $month;
                $this->day = $day;
                $this->year = $year;
                $this->maritalStatus = $maritalStatus;
                $this->jobtype = $jobtype;
                $this->preferloc = $preferloc;

               
            }
            $FormName = "empdetails";
            $ControlNames=array(
                                 
                                "fname"=>array('fname',"''","Please enter first name","span_name"),
                                "lname"=>array('lname',"''","Please enter last name","span_lname"),
                                
                                "username"=>array('username',"EMail","Please enter your email address ","span_username"),
                                "phoneno"=>array('phoneno',"Number","Please enter phone number","span_phoneno"),
                                "street"=>array('street',"''","Please enter street ","span_street"),
                                "city"=>array('city',"''","Please enter city ","span_city"),
                                "zip"=>array('zip',"''","Please enter ZIP","span_zip"),
                                "state"=>array('state',"''","Please select one ","span_state"),
                               
                                "gender"=>array('gender',"''","Please select one ","span_gender"),
                                "jobtype"=>array('jobtype',"''","Please select one ","span_jobtype"),
                                "preferloc"=>array('preferloc',"''","Please select preferred job location","span_preloc"),
                                "maritalStatus"=>array('maritalStatus',"''","Please select one ","span_marital"),
                                "day"=>array('day',"''","Please enter date ","span_day"),
                                "year"=>array('year',"''","Please enter year ","span_year"),
                                "month"=>array('month',"''","Please select one ","span_month")
                               
            );

            $ValidationFunctionName="empprofile1";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;


						?>


					<div class="container">
						<?php include('include/head.php'); ?>
						
						<h2>add your details</h2>
						<div class="row">
						<div class="col-sm-7">	
				<form  name="form1"  method="POST">

					<!-- Resume Details Start -->
				<div class="panel-group col-sm-7">	
					<div class="panel panel-default panel-deefault">
						<div class="panel-heading panel-heeading"><label>Personal Details</label></div>


						<div class="panel-body">

							<div class="col-sm-12">
						
							<label for="resume-name">Name*</label><br>
							<div class="row">	
							<div class="form-group col-sm-4" id="name-group">
								
								<input type="text" class="form-control " name="fname" id="name" placeholder="First Name" ng-model="name" required>
								<span id="span_name"></span>
							</div>
							<div class="form-group col-sm-4" id="name-group">
								
								<input type="text" class="form-control " name="mname" id="name" placeholder="Middle Name">
								<!-- <span id="span_mname"></span> -->
							</div>
							<div class="form-group col-sm-4" id="name-group">
								
								<input type="text" class="form-control " name="lname" id="name" placeholder="Last Name">
								<span id="span_lname"></span>
							</div>	
							</div>
							</div>

							<div class="col-sm-12">
								<label for="resume-name">Email*</label>
							<div class="row form-group col-sm-12" id="email-group">
								
								<input type="text" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com" ng-model="email">
								<span id="span_username"></span>
							</div>
							</div>

							<div class="col-sm-12">
								<label for="resume-name">Phone No.*</label><br>
								<div class="row">
								<div class="form-group col-sm-2" id="phoneno-group">
								
								<input type="text" class="form-control" name="countrycode" value="+91" placeholder="">
								</div>
								<div class="form-group col-sm-10" id="phoneno-group">
								
								<input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="9999999999">
								<span id="span_phoneno"></span>
								</div>
								</div>

							</div>
							<div class="col-sm-12">
								<label for="resume-name">Alternate Phone No.</label><br>
								<div class="row">
								<div class="form-group col-sm-2" id="phoneno-group">
								
								<input type="text" class="form-control" name="altrnatecountrycode" value="+91" placeholder="">

								</div>
								<div class="form-group col-sm-10" id="phoneno-group">
								
								<input type="text" class="form-control" name="altrnatephoneno"  placeholder="9999999999">	

								</div>
								</div>
							</div>




							<div class="col-sm-12">
									<label for="address">Residential Address*</label>
									<div class="row">
									<div class="form-group col-sm-12" id="address-group">
										<input type="text" class="form-control" name="street" id="address" placeholder="Street">
										<span id="span_street"></span>
									</div>
									<div class="form-group col-sm-12" id="address-group">
										<input type="text" class="form-control" name="city" id="address" placeholder="City">
										<span id="span_city"></span>
									</div>
									<div class="form-group col-sm-6" id="address-group">
										<select  class="form-control" name="state"  class="error" placeholder="City">
										<option value="" selected="">State</option>
										<option value="Andaman and Nicobar Islands" >Andaman and Nicobar Islands</option>
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
										<span id="span_state"></span>
									</div>
									<div class="form-group col-sm-6" id="address-group">
										<input type="text" class="form-control" name="zip" id="address" placeholder="ZIP Code">
										<span id="span_zip"></span>
									</div>
									</div>
								</div>

								<div class="col-sm-12">
									<label>DOB*</label><br>
									<div class="row">
									<div class="form-group col-sm-4" id="age-group">
									<select name="month" id="month" class="form-control" placeholder="January">
										<option value="" selected="">Month</option>
									    <option value="01">January</option>
									    <option value="02">February</option>
									    <option value="03">March</option>
									    <option value="04">April</option>
									    <option value="05" >May</option>
									    <option value="06">June</option>
									    <option value="07">July</option>
									    <option value="08">August</option>
									    <option value="09">September</option>
									    <option value="10">October</option>
									    <option value="11">November</option>
									    <option value="12">December</option>
									</select>
										<span id="span_month"></span>
									</div>
									<div class="form-group col-sm-4" id="age-group">
										<input type="text" id="age" class="form-control" name="day" placeholder="Date">
										<span id="span_day"></span>
									</div>
									<div class="form-group col-sm-4" id="age-group">
										<input type="text" id="age" class="form-control" name="year" placeholder="Year">
										<span id="span_year"></span>
									</div>
									</div>
								</div>

								<div class="col-sm-12">
									<label class="" >Gender*</label><br>
									<div class="row">
									<div class="form-group col-sm-6" id="gender-group">
									<input type="radio" name="gender" value="male" id="gender" >Male&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="gender" value="female" id="gender" >Female&nbsp;&nbsp;&nbsp;&nbsp;
									<br>
									<span id="span_gender"></span>
									</div>
									</div>
								</div>

								<div class="col-sm-12">
									<label for="photo">Upload your Photo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p class="help-block" style="display:initial;">Profiles with pictures are 70% more likely to be contacted</p>
									<div class="form-group" id="photo-group" >
										<input type="file" id="photo" name="photo" >
										
										<p class="help-block">JPG PNG . file size: 5 MB</p><br>
										
									</div>
								</div>
		

						</div>
					</div>

					<div class="panel panel-default panel-deefault col-sm-9">
						<div class="panel-heading panel-heeading"><label>Other Details</label></div>
						<div class="panel-body">

							<div class="col-sm-12">
						<label>Marital Status*</label><br>
						<div class="form-group" id="age-group">		
							<select name="maritalStatus"  class="form-control"> 
                             <option value="" selected="">Select</option>  
                             <option value="Unmarried" >Single/unmarried</option>  
                             <option value="Married">Married</option>  
                             	</select><span id="span_marital"></span>
								
							</div>
						</div>
						
						<div class="col-sm-12">
						
						<label >Physically Challenged</label>&nbsp;&nbsp;&nbsp;
						
							<input type="radio"  name="disability" id="disability" value="1" >Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio"  name="disability" id="disability" value="0" >No
						 
							<div id="disabilitytype"></div>
						
						</div> 


						<div class="col-sm-12">
							<br><label>Passport</label>&nbsp;&nbsp;&nbsp;
								
							    <input type="radio" id="chkYes" name="chkPassPort" value="1" >Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							    <input type="radio" id="chkNo" name="chkPassPort" value="0">No									
								
							   <div id="txtPassportNumber"></div>
							   
																	
						
						</div>
				

					
						<div class="col-sm-12">
							<br><label >Facebook</label>
							<div class="form-group" id="photo-group">
								
								<input type="text" class="form-control"  name="facebook" >
							</div>
						</div>


						<div class="col-sm-12">
							<label >Linkedin</label>&nbsp;&nbsp;&nbsp;<p class="help-block" style="display:initial;">Profiles with Linkedin are considered more Trustworthy</p>
							<div class="form-group" id="photo-group">
								
								<input type="text" class="form-control"  name="linkedin"><br>
							</div>
						</div>	




						</div>
					</div>


					<div class="panel panel-default panel-deefault col-sm-9">
						<div class="panel-heading panel-heeading"><label>Job Details</label></div>
						<div class="panel-body">

							<div class="col-sm-12">
							<label for="resume-name">Job Type*</label>&nbsp;&nbsp;&nbsp;
							<div class="form-group" >
								
								<select style="width:;" name="jobtype" id="jobtype" class="form-control error">
									<option value="" selected="">Select</option>
									<option value="internship" >Internship</option>
									<option value="part" >Part Time</option>
									<option value="full" >Full Time</option>
									<option value="freelance" >Freelance</option>
									<option value="Fixed term contractor" >Fixed term contractor</option>																		
								</select>   
								<span id="span_jobtype"></span>								
							</div>
						</div>


						<div class="col-sm-12">
							<label for="resume-name">Current Location</label><br>
							<div class="form-group" >
											
								<select  class="form-control" name="currentlocation"  class="error">
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
							</select>  <span id="span_currentlocation"></span> 								
							</div>

							
							</div>

						<div class="col-sm-12">
							<label for="resume-name">Preffered Job Location*</label>
							<div class="form-group" >
								
								<select  class="form-control" name="preferloc"  class="error">
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
							<span id="span_preloc"></span>
							</div>
						</div>




						<div class="col-sm-12">
							<div class="form-group" >
								<label for="resume-name">Ready to Relocate</label>&nbsp;&nbsp;&nbsp;
								<input type="radio" name="relocation" value="1"  >Yes&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="relocation" value="0" >No&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</div>


						<div class="col-sm-12">
							<label for="photo">Upload your Resume</label>
							<div class="form-group" id="photo-group">
								
								<input type="file"  name="resume">
								<p class="help-block">Optionally upload your resume for employers to view. Max. file size: 1 MB</p>
								
							</div>
						</div>




						</div>
					</div>


				</div>	
					
					



					
					<div class="col-sm-12 text-center">
						<p>&nbsp;</p>
						
						<a class="btn btn-primary btn-lg" name="back" href="emp_type.php" value=""><i class="fa fa-arrow-left"></i> Back</a>
						<button class="btn btn-primary btn-lg" name="submit" id="submitpersonal" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
					</div>
				
					
				

					

				</form>

			</div>
			<div class="col-sm-5" style="background:#e7e7e7; min-height: 250px;">
						<?php

							// $sql="select * from ".TBL_EMPLOYEE_DEL." join ".TBL_EMPLOYEE_EDD." on ".TBL_EMPLOYEE_DEL.".employee_id=".TBL_EMPLOYEE_EDD.".employee_id where employee_id='".$_SESSION['employee_id']."' ";
					// $sql.="inner join ".TBL_EMPLOYEE_EDD." on ".TBL_EMPLOYEE_DEL.".employee_id=".TBL_EMPLOYEE_EDD.".employee_id ";
							// $sql="SELECT * FROM TBL_EMPLOYEE_DEL INNER JOIN TBL_EMPLOYEE_EDD ON TBL_EMPLOYEE_DEL.user_id = TBL_EMPLOYEE_EDD.user_id WHERE TBL_EMPLOYEE_DEL.employee_id = '".$_SESSION['employee_id']."' ";
							
							// $result= $this->db->query($sql,__FILE__,__LINE__);

					
							// $row= $this->db->fetch_array($result)
							

							?>
							<h3 style="text-align:center;">form</h3><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Name: &nbsp;</label><span style="text-transform:capitalize;">{{name}}<?php echo $row['name'];?></span><br>
									<label>Email: &nbsp;</label><span >{{email}}<?php echo $row['email'];?></span><br>
									<label>Mob: &nbsp;</label><span ><?php echo $row['phoneno'];?></span><br>
									<label>Location: &nbsp;</label><span ><?php echo $row['current_loc'];?></span>
								</div>
								<div class="col-sm-6" style="text-align:center;">
									<img src="images/1466102498_avatar-03.png">
								</div>

							</div>
							
								<h5 style="color:black;">Academics</h5><br>
							<div>
								<label>Highest Qualifications: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['qualification_type'];?></span><br>
								<label>Specialization: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['specialization'];?></span><br>
								<label>Passing Year: &nbsp;</label><span ><?php echo $row['passing_year'];?></span>	
								
							</div>


					</div>
			</div>
			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);
							
							$this->street = $street;
							$this->city = $city;
							$this->state = $state;
							$this->zip = $zip;
							$this->username = $username;
							$this->fname = $fname;
							$this->mname = $mname;
							$this->lname = $lname;
							$this->phoneno = $phoneno;
							$this->gender = $gender;
							$this->month = $month;
							$this->day = $day;
							$this->year = $year;
							$this->maritalStatus = $maritalStatus;
							$this->facebook = $facebook;
							$this->linkedin = $linkedin;
							$this->disability = $disability;
							$this->preferloc = $preferloc;
							$this->jobtype = $jobtype;
							$this->chkPassPort = $chkPassPort;
							$this->relocation = $relocation;
							$this->currentlocation = $currentlocation;

							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							// $sql="select * from ".tbl_employee_del." where email='".$this->username."'";
							// $result= $this->db->query($sql,__FILE__,__LINE__);
							// if($this->db->num_rows($result)>0)
							// {
							// 	$_SESSION['error_msg'] = 'User already exist. Please select another username';
								
								
						
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['name'] = $this->fname.' '.$this->mname.' '.$this->lname;
							$insert_sql_array['email'] = $this->username;
							//$insert_sql_array['password'] = $this->password;
							$insert_sql_array['phoneno'] = $this->phoneno;
							$insert_sql_array['age'] = $this->day.'-'.$this->month.'-'.$this->year;
							$insert_sql_array['address'] = $this->street.','.$this->city.','.$this->state;
							$insert_sql_array['zip'] = $this->zip;
							$insert_sql_array['gender'] = $this->gender;
							$insert_sql_array['martial_status'] = $this->maritalStatus;
							$insert_sql_array['facebook_id'] = $this->facebook;
							$insert_sql_array['linkedin_id'] = $this->linkedin;
							$insert_sql_array['Physically_challenged'] = $this->disability;
							$insert_sql_array['jobtype'] = $this->jobtype;
							$insert_sql_array['Passport'] = $this->chkPassPort;
							$insert_sql_array['relocation'] = $this->relocation;
							$insert_sql_array['prefered_loc'] = $this->preferloc;
							$insert_sql_array['current_loc'] = $this->currentlocation;

							$insert_sql_array['user_id']=$_SESSION['user_id'];
							$this->db->insert(tbl_employee_del,$insert_sql_array);


							$id=$this->db->last_insert_id();
							$_SESSION['employee_id']=$id;

							$insert_sql_array = array();
							$insert_sql_array['employee_id']=$_SESSION['employee_id'];
							$this->db->update(TBL_USER,$insert_sql_array,user_id,$_SESSION['user_id']);

							?>
								<script type="text/javascript">
									window.location = "emp_prof2.php"
								</script>
								<?php
							
							
							
							
							
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->CreateUser.('local');
							}
							break;
			default: 
							echo "Wrong Parameter passed";
		}
	}



	
	function empprofile2($runat)
	{
		switch($runat){
			case 'local':
						
				if(count($_POST)>0 and $_POST['submit']=='Submit'){
                	extract($_POST);

                // $this->highestqualification = $highestqualification;
                $this->course = $course;
                // $this->specialization = $specialization;
                // $this->university = $university;
                // $this->city = $city;
				// $this->year_passing = $year_passing;
				// $this->grad_city = $grad_city;
				// $this->grad_qualifications = $grad_qualifications;
				// $this->grad_board = $grad_board;
				// $this->grad_passing = $grad_passing;
				// $this->postgrad_name = $postgrad_name;
				// $this->postgrad_city = $postgrad_city;
				// $this->postgrad_qualifications = $postgrad_qualifications;
				// $this->postgrad_board = $postgrad_board;
				// $this->postgrad_passing = $postgrad_passing;

				
       
            }
            $FormName = "empeducation";
            $ControlNames=array(
                                 
                                // "highestqualification"=>array('highestqualification',"''","Please select one","span_highestqualification"),
                                "course"=>array('course',"''","Please Enter Course Name ","span_course"),
                                // "specialization"=>array('specialization',"''","Please enter your specialization ","span_specialization"),
                                // "university"=>array('university',"''","Please Enter University Name ","span_university"),
                                // "city"=>array('city',"''","Please Enter City ","span_city"),
                                // "year_passing"=>array('year_passing',"''","Please select one","span_year_passing")
                               //  "grad_city"=>array('grad_city',"''","Please enter city","span_grad_city"),
                               //  "grad_qualifications"=>array('grad_qualifications',"''","Please enter your qualifications","span_grad_qualifications"),
                               //  "grad_passing"=>array('grad_passing',"''","Please select one ","span_grad_passing"),
                               //  "grad_board"=>array('grad_board',"''","Please enter the Affilation  ","span_grad_board"),
                               
                               //  "postgrad_name"=>array('postgrad_name',"''","Please enter Name ","span_postgrad_name"),
                               //  "postgrad_city"=>array('postgrad_city',"''","Please enter city ","span_postgrad_city"),
                               //  "postgrad_qualifications"=>array('postgrad_qualifications',"''","Please enter your qualifications","span_postgrad_qualifications"),
                              	// "postgrad_board"=>array('postgrad_board',"''","Please enter the Affilation  ","span_postgrad_board"),
                               //  "postgrad_passing"=>array('postgrad_passing',"''","Please select one","span_postgrad_passing")
                                  
            );

            $ValidationFunctionName="empprofile2";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

						?>


					<div class="container">

						<?php include('include/head.php'); ?>
						

						<h2>Academics</h2>


				<div class="row">
					<div class="col-sm-7">	
				<form  name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST" >

					<!-- Resume Details Start -->
					

					<div class="row form-group col-sm-11">
						<label>Highest Qualification</label>
						<select name="highestqualification[]" class="form-control" id="highestqualification">
							<option value="">Select your highest qualification</option>
							<option value="Doctorate/Phd">Doctorate/Phd</option>
							<option value="Masters">Postgraduate</option>
							<option value="Undergraduate">Undergraduate</option>
							
						</select><span id="span_highestqualification"></span>


					</div>
					

					<div class="row">
						<div class="form-group col-sm-11">
							<label>Course</label>
							<input type="text" class="form-control" name="course[]" placeholder="Enter Course">
							<span id="span_course"></span>

						</div>

						<div class="form-group col-sm-11">
							<label>Specialization</label>
							<input type="text" class="form-control" name="specialization[]" placeholder="Enter Specialization">
							<span id="span_specialization"></span>

						</div>

						<div class="form-group col-sm-11">
							<label>University/College</label>
							<input type="text" class="form-control" name="university[]" placeholder="Institute Name">
							<span id="span_university"></span>

						</div>

						<div class="form-group col-sm-11">
							<label>City</label>
							<input type="text" class="form-control" name="city[]" placeholder="City Name">
							<span id="span_city"></span>

						</div>
						<div class="form-group col-sm-11">
							
							<div class="form-group" id="education-dates-group">
								<label for="education-dates">Year of Passing</label><br>
								<select  name="year_passing[]" class="form-control">
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
											
										   </select><span id="span_year_passing"></span>
																		
											
								</div>

							</div>
					</div>


					<div class="row">
						<div class="col-sm-11">
							<p><a id="add-education">+ Add Education</a></p>
							
						</div>
					</div>


					
					
					
					<div class="row">
						<div class="col-sm-11">
							<hr class="dashed">
						</div>
					</div>
					<h3>professtional certifications </h3>

					<div class="row certificate col-sm-11">
						
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								
								<input type="text" class="form-control" name="certificate[]" id="certificate" placeholder="Certification Name eg. CCNA">
								
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="school-group">
								
								<input type="text" class="form-control" name="certificatenum[]" id="certificate" placeholder="Certificate No.">
								
							</div>
						</div>
						<!-- <p class="help-block" >Certification should be certified </p> -->
						
					</div>

					<div class="row">
						<div class="col-sm-11">
							<p><a id="add-certificate">+ Add certificate</a></p>
							
						</div>
					</div>

					<div class="row text-center">
						<p>&nbsp;</p>
						<a class="btn btn-primary btn-lg" name="back" href="emp_prof1.php" value=""><i class="fa fa-arrow-left"></i> Back</a>
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" name="submit" id="submiteducation" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
					</div>

					
					</form></div>

					<div class="col-sm-5" style="background:#e7e7e7; min-height: 250px;">
						<?php

							$sql="select * from ".TBL_EMPLOYEE_DEL." where employee_id='".$_SESSION['employee_id']."' ";
					//$sql.="inner join ".TBL_COMPANY." on ".TBL_JOBS.".company_id=".TBL_COMPANY.".company_id ";

							$result= $this->db->query($sql,__FILE__,__LINE__);

					
							$row= $this->db->fetch_array($result)
							

							?>
							<h3 style="text-align:center;">form</h3><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Name: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['name'];?></span><br>
									<label>Email: &nbsp;</label><span ><?php echo $row['email'];?></span><br>
									<label>Mob: &nbsp;</label><span ><?php echo $row['phoneno'];?></span><br>
									<label>Location: &nbsp;</label><span ><?php echo $row['current_loc'];?></span>
								</div>
								<div class="col-sm-6" style="text-align:center;">
									<img src="images/1466102498_avatar-03.png">
								</div>

							</div>


					</div>
				</div>	



				

			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);

							for ($i=0; $i <count($course) ; $i++) { 

								for ($a=$i; $a <=$i ; $a++) { 
									$this->coursename=$course[$a];
								}
								for ($b=$i; $b <=$i ; $b++) { 
									$this->cityname=$city[$b];
								}
								for ($c=$i; $c <=$i ; $c++) { 
									$this->universityname=$university[$c];
								}
								for ($d=$i; $d <=$i ; $d++) { 
									$this->specializationname=$specialization[$d];
								}
								for ($e=$i; $e <=$i ; $e++) { 
									$this->qualificationname=$highestqualification[$e];
								}
								for ($f=$i; $f <=$i ; $f++) { 
									$this->passingyear=$year_passing[$f];
								}

								
									$insert_sql_array = array();
									$insert_sql_array['course_name'] = $this->coursename;
									$insert_sql_array['city_name'] = $this->cityname;
									$insert_sql_array['university_name'] = $this->universityname;
									$insert_sql_array['specialization'] = $this->specializationname;
									$insert_sql_array['passing_year'] = $this->passingyear;
									$insert_sql_array['qualification_type'] = $this->qualificationname;

									$insert_sql_array['user_id'] = $_SESSION['user_id'];
									$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
									$this->db->insert(tbl_employee_edd,$insert_sql_array);
							

							}


							for ($i=0; $i <count($certificate) ; $i++) { 
								
								for ($a=$i; $a <=$i ; $a++) { 
									$this->certificatename=$certificate[$a];
								}
								for ($b=$i; $b <=$i ; $b++) { 
									$this->certificatenumber=$certificatenum[$b];
								}

								$insert_sql_array = array();
								$insert_sql_array['certificate_name'] = $this->certificatename;
								$insert_sql_array['certificate_number'] = $this->certificatenumber;

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(tbl_employee_certification,$insert_sql_array);
							
							}
							
							// $this->school_city = $school_city;
							// $this->school = $school;
							// $this->school_qualifications = $school_qualifications;
							// $this->school_board = $school_board;
							// $this->school_passing = $school_passing;

							// $this->grad_name = $grad_name;
							// $this->grad_city = $grad_city;
							// $this->grad_qualifications = $grad_qualifications;
							// $this->grad_board = $grad_board;
							// $this->grad_passing = $grad_passing;

							// $this->postgrad_name = $postgrad_name;
							// $this->postgrad_city = $postgrad_city;
							// $this->postgrad_qualifications = $postgrad_qualifications;
							// $this->postgrad_board = $postgrad_board;
							// $this->postgrad_passing = $postgrad_passing;

							

							// $this->certificate1 = $certificate1;
							// $this->certificate2 = $certificate2;
							//$this->auth_to = $auth_to;

							//server side validation
							//$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							// 
								
							// if($return){
							
							// $insert_sql_array = array();
							// $insert_sql_array['school_name'] = $this->school;
							// $insert_sql_array['school_city'] = $this->school_city;
							// $insert_sql_array['school_qualifications'] = $this->school_qualifications;
							// $insert_sql_array['school_board'] = $this->school_board;
							// $insert_sql_array['school_passing'] = $this->school_passing;

							// $insert_sql_array['grad_school'] = $this->grad_name;
							// $insert_sql_array['grad_city'] = $this->grad_city;
							// $insert_sql_array['grad_qualifications'] = $this->grad_qualifications;
							// $insert_sql_array['grad_board'] = $this->grad_board;
							// $insert_sql_array['grad_passing'] = $this->grad_passing;

							// $insert_sql_array['postgrad_school'] = $this->postgrad_name;
							// $insert_sql_array['postgrad_city'] = $this->postgrad_city;
							// $insert_sql_array['postgrad_qualifications'] = $this->postgrad_qualifications;
							// $insert_sql_array['postgrad_board'] = $this->postgrad_board;
							// $insert_sql_array['postgrad_passing'] = $this->postgrad_passing;


							// $insert_sql_array['certificate'] = $this->course;

							// $insert_sql_array['user_id'] = $_SESSION['user_id'];
							// $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							// $this->db->insert(tbl_employee_edd,$insert_sql_array);

		?>
								<script type="text/javascript">
									window.location = "emp_prof3.php"
								</script>
								<?php
								exit();
							
							
							
							
							// } else {
							// echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							// $this->CreateUser.('local');
							// }
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

                $this->anumsal = $anumsal;
                $this->noticeperiod = $noticeperiod;
                $this->exyear = $exyear;
                $this->compname = $compname;
                $this->jobtitle = $jobtitle;
                $this->workingtime = $workingtime;
               

               
            }
            $FormName = "empexp";
            $ControlNames=array(
                                 
                                "exyear"=>array('exyear',"''","Please select","span_exyear"),
                                "compname"=>array('compname',"''","Please enter company name","span_compname"),
                                "jobtitle"=>array('jobtitle',"''","Please enter job title","span_jobtitle"),
                                "workingtime"=>array('workingtime',"''","Please enter work time","span_workingtime"),
                                "anumsal"=>array('anumsal',"''","Please select","span_salary"),
                                "noticeperiod"=>array('noticeperiod',"''","Please select one ","span_notice")
                               
            );

            $ValidationFunctionName="empprofile3";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

						

						?>


						<div class="container">

							<?php include('include/head.php'); ?>
						

						<h2>experience</h2>

			

					<!-- Resume Details Start -->
				<div class="row" >	
					<div class="col-sm-7">
					<form  name="<?php echo $FormName?>" enctype="multipart/form-data" method="POST">
					<!-- <div class="row">
						<div class="col-sm-7">
							<div class="form-group" >
								<label for="resume-name">What are your Key Skills?</label>
								<input type="text" class="form-control" name="keyskills">
								<span id="span_keyskills"></span>
								
								
							</div>
						</div>
					</div>	
					 -->
					
					
						<div class="col-sm-11">
							<label for="resume-name">Work Experience*</label>
							<div class="form-group" >
								
								<select  name="exyear" id="expyear" class="form-control error">
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
					

					
						<div class="col-sm-11">
							<label for="resume-name">No. of Organisations Worked with</label>
							<div class="form-group" >
								
								<select  name="worknum" class="form-control error" >
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
									
								</select>
							</div>
							
							
						</div>
					

					
						<div class="col-sm-11">
							<label for="resume-name">About Current/Last Organisation*</label>
							<div class="form-group" >
								
								<input type="text" class="form-control" name="compname[]"  placeholder="Company Name"><span id="span_compname"></span><br>
								<input type="text" class="form-control" name="jobtitle[]"  placeholder="Job Title"><span id="span_jobtitle"></span><br>
								<input type="text" class="form-control" name="workingtime[]" placeholder="Working Since"><span id="span_workingtime"></span>
								<!-- <div class="row">
									<div class="form-group col-sm-4" id="age-group">
									<select name="month" id="month" class="form-control" placeholder="January">
										<option value="" selected="">Month</option>
									    <option value="01">January</option>
									    <option value="02">February</option>
									    <option value="03">March</option>
									    <option value="04">April</option>
									    <option value="05" >May</option>
									    <option value="06">June</option>
									    <option value="07">July</option>
									    <option value="08">August</option>
									    <option value="09">September</option>
									    <option value="10">October</option>
									    <option value="11">November</option>
									    <option value="12">December</option>
									</select>
										<span id="span_month"></span>
									</div>
									<div class="form-group col-sm-4" id="age-group">
										<input type="text" id="age" class="form-control" name="day" placeholder="Date">
										<span id="span_day"></span>
									</div>
									<div class="form-group col-sm-4" id="age-group">
										<input type="text" id="age" class="form-control" name="year" placeholder="Year">
										<span id="span_year"></span>
									</div>
									</div>
 -->


								
							</div>
							
							
						</div>
						

					
					<div class="col-sm-11">
						
							<label for="resume-name">Current/Last Annual Package*</label>
							<div class="form-group" >
								
								<select  name="anumsal"  class="form-control error">
									
										<option value="">Select</option>
										<option value="<1 Lac"><1 Lac</option>
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
										<option value="31">31</option>
										<option value="32">32</option>
										<option value="33">33</option>
										<option value="34">34</option>
										<option value="35">35</option>
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40">40</option>
										<option value="41">41</option>
										<option value="42">42</option>
										<option value="43">43</option>
										<option value="44">44</option>
										<option value="45">45</option>
										<option value="46">46</option>
										<option value="47">47</option>
										<option value="48">48</option>
										<option value="49">49</option>
										<option value="50">50</option>
										<option value="50+">50+</option>

									
								</select>
								<span id="span_salary"></span>
							</div>
						</div>


						<div class="col-sm-11">
						<div class="row col-sm-6">
							<label for="resume-name">Notice Period*</label>
							<div class="form-group" >
								
								<select name="noticeperiod" id="noticeperiod" class="form-control error">
								<option value="">Select</option>
								<option value="Immediate">Immediate</option>
								<option value="<1 month"> <1 month</option>
								<option value="1 month">1 month</option>
								<option value="2 months">2 months</option>
								<option value="3 months">3 months</option>
								</select>
								<span id="span_notice"></span>
							</div>
						</div>
						<div class="col-sm-6" style="padding: 25px 25px 30px 45px;">

							<label for="resume-name">Is Buy-Back Available</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="checkbox" name="buyback" data-size='small' data-on-text="Yes" data-off-text="No" data-on-color="info" value="yes" >
							
							

						</div>
					</div>
					
						
					

					<div class="row">
							<div class="col-sm-11">
							<p><a id="add-experience">+ Add More Experience</a></p>
							
							</div>
						</div>


					


					<!-- <div class="row">
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
 -->
						
					


					
					<div class="col-sm-12 text-center">
						<p>&nbsp;</p>
						<a class="btn btn-primary btn-lg" name="back" href="emp_prof2.php" value=""><i class="fa fa-arrow-left"></i> Back</a>
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" id="submitexperience" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
					</div>
				
				

				</form>
				</div>
				<div class="col-sm-5" style="background:#e7e7e7; min-height: 250px;">
						<?php

							// $sql="select * from ".TBL_EMPLOYEE_DEL." join ".TBL_EMPLOYEE_EDD." on ".TBL_EMPLOYEE_DEL.".employee_id=".TBL_EMPLOYEE_EDD.".employee_id where employee_id='".$_SESSION['employee_id']."' ";
					// $sql.="inner join ".TBL_EMPLOYEE_EDD." on ".TBL_EMPLOYEE_DEL.".employee_id=".TBL_EMPLOYEE_EDD.".employee_id ";
							$sql="SELECT * FROM TBL_EMPLOYEE_DEL INNER JOIN TBL_EMPLOYEE_EDD ON TBL_EMPLOYEE_DEL.user_id = TBL_EMPLOYEE_EDD.user_id WHERE TBL_EMPLOYEE_DEL.employee_id = '".$_SESSION['employee_id']."' ";
							
							$result= $this->db->query($sql,__FILE__,__LINE__);

					
							$row= $this->db->fetch_array($result)
							

							?>
							<h3 style="text-align:center;">form</h3><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Name: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['name'];?></span><br>
									<label>Email: &nbsp;</label><span ><?php echo $row['email'];?></span><br>
									<label>Mob: &nbsp;</label><span ><?php echo $row['phoneno'];?></span><br>
									<label>Location: &nbsp;</label><span ><?php echo $row['current_loc'];?></span>
								</div>
								<div class="col-sm-6" style="text-align:center;">
									<img src="images/1466102498_avatar-03.png">
								</div>

							</div>
							
								<h5 style="color:black;">Academics</h5><br>
							<div>
								<label>Highest Qualifications: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['qualification_type'];?></span><br>
								<label>Specialization: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['specialization'];?></span><br>
								<label>Passing Year: &nbsp;</label><span ><?php echo $row['passing_year'];?></span>	
								
							</div>


					</div>

				</div>
			</div>



					

								<?php 
										

						break;
			

			case 'server':
							extract($_POST);

									$this->exyear = $exyear;
									$this->worknum = $worknum;
									
									$this->anumsal = $anumsal;
								
									$this->buyback = $buyback;
									$this->noticeperiod = $noticeperiod;




							for ($i=0; $i <count($compname) ; $i++) { 
							
								for ($a=$i; $a <=$i ; $a++) { 
									$this->companyname=$compname[$a];
								}
								for ($b=$i; $b <=$i ; $b++) { 
									$this->titlejob=$jobtitle[$b];
								}
								for ($c=$i; $c <=$i ; $c++) { 
									$this->worktime=$workingtime[$c];
								}


								$insert_sql_array = array();
								$insert_sql_array['company_name'] = $this->companyname;
								$insert_sql_array['job_title'] = $this->titlejob;
								$insert_sql_array['working_time'] = $this->worktime;

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(tbl_employee_workex,$insert_sql_array);


							}


							
							
							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							if ($this->buyback !=="yes") {
								$this->buyback="no";
								//print_r($buyback);
								//return;
							}
							
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['experience_yrs'] = $this->exyear;
							
							$insert_sql_array['company_worked'] = $this->worknum;
							$insert_sql_array['current_salary'] = $this->anumsal;
							
							$insert_sql_array['buyback'] = $this->buyback;
							$insert_sql_array['notice_period'] = $this->noticeperiod;


							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(tbl_employee_exp,$insert_sql_array);

?>
							<script type="text/javascript">
							window.location="emp_prof4.php"
							</script>

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
	







	function emptype($runat){

		switch($runat){
			case 'local':

				?>

				<div class="container">
					<div class="jumbotron text-center"style="margin-top:0px;">
						<h1 style="font-size:34px;">Tell us about you</h1>
						<h4>you are </h4><br><br><br>
						<div class="row">
							<div class="col-sm-6 ">

								<a href="emp_profile.php"><img src="images/1466098131_1.png" id="emptype"><div><h4><b>PROFESSIONAL</b></h4></div></a>
								<p class="help-block">I have at least 1 month of work experience</p>
							</div>
							<div class="col-sm-6 ">

							<!-- 	<a href="emp_prof1.php"><img src="images/1466102498_avatar-03.png" id="emptype"><div></div><h4><b>FRESHER</b></h4></div></a> -->
							<a href="emp_profile.php"><img src="images/fresher.png" id="emptype"><div><h4><b>FRESHER</b></h4></div></a>

								<p class="help-block">I have just graduated/I haven't worked after graduation</p>
							</div>

						</div>

					</div>


				</div>

				<?php
						break;


			

			case 'server':
							extract($_POST);


				 
			break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}



	function empprofile4($runat)
	{
		switch($runat){
			case 'local':


			 if(count($_POST)>0 and $_POST['submit']=='Submit'){
                extract($_POST);
                $this->langknown = $langknown;
                $this->currentlocation = $currentlocation;
                $this->keyskills = $keyskills;
               
            }
            $FormName = "empexp";
            $ControlNames=array(
                                 
                                "langknown"=>array('langknown',"''","Please select","span_langknown"),
                                "keyskills"=>array('keyskills',"''","Please enter some skill","span_keyskills"),
                                "currentlocation"=>array('currentlocation',"''","Please select","span_currentlocation")
                               
            );

            $ValidationFunctionName="empprofile3";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

						

						?>


						<div class="container">
						
							<?php include('include/head.php'); ?>
						<h2>More Details</h2>

				

					<!-- Resume Details Start -->
				<div class="row" >	
					<div class="col-sm-7">
		            <form  name="<?php echo $FormName?>" enctype="multipart/form-data" id="fff" method="POST">
								
								<div class="col-sm-11">
									<label for="resume-name">Languages Known*</label>
									<div class="form-group" >
										
										<select class="selectpicker required" data-style="form-control selectpickerr" name="langknown[]" id="lang" multiple data-live-search="true" title="Select">
    						
							<option value="English">English</option>
							<option value="Abkhaz">Abkhaz</option>
							<option value="Adyghe">Adyghe</option>
							<option value="Afrikaans">Afrikaans</option>
							<option value="Akan">Akan</option>
							<option value="Albanian">Albanian</option>
							<option value="American Sign Language">American Sign Language</option>
							<option value="Amharic">Amharic</option>
							<option value="Arabic">Arabic</option>
							<option value="Aragonese">Aragonese</option>
							<option value="Aramaic">Aramaic</option>
							<option value="Armenian">Armenian</option>
							<option value="Aymara">Aymara</option>
							<option value="Balinese">Balinese</option>
							<option value="Basque">Basque</option>
							<option value="Betawi">Betawi</option>
							<option value="Bosnian">Bosnian</option>
							<option value="Breton">Breton</option>
							<option value="Bulgarian">Bulgarian</option>
							<option value="Cantonese">Cantonese</option>
							<option value="Catalan">Catalan</option>
							<option value="Cherokee">Cherokee</option>
							<option value="Chickasaw">Chickasaw</option>
							<option value="Chinese">Chinese</option>
							<option value="Coptic">Coptic</option>
							<option value="Cornish">Cornish</option>
							<option value="Corsican">Corsican</option>
							<option value="Crimean Tatar">Crimean Tatar</option>
							<option value="Croatian">Croatian</option>
							<option value="Czech">Czech</option>
							<option value="Danish">Danish</option>
							<option value="Dutch">Dutch</option>
							<option value="Dawro">Dawro</option>
							<option value="Esperanto">Esperanto</option>
							<option value="Estonian">Estonian</option>
							<option value="Ewe">Ewe</option>
							<option value="Fiji Hindi">Fiji Hindi</option>
							<option value="Filipino">Filipino</option>
							<option value="Finnish">Finnish</option>
							<option value="French">French</option>
							<option value="Galician">Galician</option>
							<option value="Georgian">Georgian</option>
							<option value="German">German</option>
							<option value="Greek, Modern">Greek, Modern</option>
							<option value="Ancient Greek">Ancient Greek</option>
							<option value="Greenlandic">Greenlandic</option>
							<option value="Haitian Creole">Haitian Creole</option>
							<option value="Hawaiian">Hawaiian</option>
							<option value="Hebrew">Hebrew</option>
							<option value="Hindi">Hindi</option>
							<option value="Hungarian">Hungarian</option>
							<option value="Icelandic">Icelandic</option>
							<option value="Indonesian">Indonesian</option>
							<option value="Inuktitut">Inuktitut</option>
							<option value="Interlingua">Interlingua</option>
							<option value="Irish">Irish</option>
							<option value="Italian">Italian</option>
							<option value="Japanese">Japanese</option>
							<option value="Kabardian">Kabardian</option>
							<option value="Kannada">Kannada</option>
							<option value="Kashubian">Kashubian</option>
							<option value="Khmer">Khmer</option>
							<option value="Kinyarwanda">Kinyarwanda</option>
							<option value="Korean">Korean</option>
							<option value="Kurdish/Kurdî">Kurdish/Kurdî</option>
							<option value="Ladin">Ladin</option>
							<option value="Latgalian">Latgalian</option>
							<option value="Latin">Latin</option>
							<option value="Lingala">Lingala</option>
							<option value="Livonian">Livonian</option>
							<option value="Lojban">Lojban</option>
							<option value="Lower Sorbian">Lower Sorbian</option>
							<option value="Low German">Low German</option>
							<option value="Macedonian">Macedonian</option>
							<option value="Malay">Malay</option>
							<option value="Malayalam">Malayalam</option>
							<option value="Mandarin">Mandarin</option>
							<option value="Manx">Manx</option>
							<option value="Maori">Maori</option>
							<option value="Mauritian Creole">Mauritian Creole</option>
							<option value="Min Nan">Min Nan</option>
							<option value="Mongolian">Mongolian</option>
							<option value="Norwegian">Norwegian</option>
							<option value="Old Armenian">Old Armenian</option>
							<option value="Old English">Old English</option>
							<option value="Old French">Old French</option>
							<option value="Old Norse">Old Norse</option>
							<option value="Old Prussian">Old Prussian</option>
							<option value="Oriya">Oriya</option>
							<option value="Pangasinan">Pangasinan</option>
							<option value="Papiamentu">Papiamentu</option>
							<option value="Pashto">Pashto</option>
							<option value="Persian">Persian</option>
							<option value="Pitjantjatjara">Pitjantjatjara</option>
							<option value="Polish">Polish</option>
							<option value="Portuguese">Portuguese</option>
							<option value="Proto-Slavic">Proto-Slavic</option>
							<option value="Quenya">Quenya</option>
							<option value="Rapa Nui">Rapa Nui</option>
							<option value="Romanian">Romanian</option>
							<option value="Russian">Russian</option>
							<option value="Sanskrit">Sanskrit</option>
							<option value="Scots">Scots</option>
							<option value="Scottish Gaelic">Scottish Gaelic</option>
							<option value="Serbian">Serbian</option>
							<option value="Serbo-Croatian">Serbo-Croatian</option>
							<option value="Slovak">Slovak</option>
							<option value="Slovene">Slovene</option>
							<option value="Spanish">Spanish</option>
							<option value="Sinhalese">Sinhalese</option>
							<option value="Swahili">Swahili</option>
							<option value="Swedish">Swedish</option>
							<option value="Tagalog">Tagalog</option>
							<option value="Tajik">Tajik</option>
							<option value="Tamil">Tamil</option>
							<option value="Tarantino">Tarantino</option>
							<option value="Telugu">Telugu</option>
							<option value="Thai">Thai</option>
							<option value="Tok Pisin">Tok Pisin</option>
							<option value="Turkish">Turkish</option>
							<option value="Twi">Twi</option>
							<option value="Ukrainian">Ukrainian</option>
							<option value="Upper Sorbian">Upper Sorbian</option>
							<option value="Urdu">Urdu</option>
							<option value="Uzbek">Uzbek</option>
							<option value="Venetian">Venetian</option>
							<option value="Vietnamese">Vietnamese</option>
							<option value="Vilamovian">Vilamovian</option>
							<option value="Volapük">Volapük</option>
							<option value="Võro">Võro</option>
							<option value="Welsh">Welsh</option>
							<option value="Xhosa">Xhosa</option>
							<option value="Yiddish">Yiddish</option>

  							</select><span id="span_langknown"></span>																
									</div>
								</div>
								


					
								<div class="col-sm-11" style="float:none;">
									<div class="form-group" >
										<label for="resume-name">Expected Salary  &nbsp;&nbsp;&nbsp;<span class="help-block" style="display:initial;">Lacs per anum </span></label>
										<select  class="form-control" name="expectedsalary"  class="error">
									
										<option value="Select">Select</option>
										<option value="<1 Lac"><1 Lac</option>
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
										<option value="31">31</option>
										<option value="32">32</option>
										<option value="33">33</option>
										<option value="34">34</option>
										<option value="35">35</option>
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40">40</option>
										<option value="41">41</option>
										<option value="42">42</option>
										<option value="43">43</option>
										<option value="44">44</option>
										<option value="45">45</option>
										<option value="46">46</option>
										<option value="47">47</option>
										<option value="48">48</option>
										<option value="49">49</option>
										<option value="50">50</option>
										<option value="50+">50+</option>

									
								</select>																
									</div>
								</div>


							



					<div class="col-sm-11" style="float:none;">
									<label for="resume-name">Any other relevant details</label>
									<div class="form-group" >
										<input type="text" class="form-control" name="anyother" />
									</div>
                    </div>
                    
						<div class="col-sm-11">
							<label for="resume-name">Key Skills*</label><br>
							<div class="row form-group col-sm-7" >
											
								<input type="text" class="form-control" name="keyskills[]" /> 
								 <span id="span_keyskills"></span>
							
						</div>

						<div class="center_form col-sm-5" data-toggle="tooltip" id="ratex" title="Rate Yourself">
							        <input type="radio" name="example[]" class="rating" value="1" />
							        <input type="radio" name="example[]" class="rating" value="2" />
							        <input type="radio" name="example[]" class="rating" value="3" />
							        <input type="radio" name="example[]" class="rating" value="4" />
							        <input type="radio" name="example[]" class="rating" value="5" />
							    </div>
						<div class="row">
							<div class="col-sm-11">
							<p><a id="add-more-skills">+ Add More skills</a></p>
							
						</div></div></div>

					

					

					<div class="col-sm-12 text-center">
						<p>&nbsp;</p>
						<a class="btn btn-primary btn-lg" name="back" href="emp_prof3.php" value=""><i class="fa fa-arrow-left"></i>Back</a>
						<!-- <a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a> -->
						<button class="btn btn-primary btn-lg" name="submit" id="butto" onclick="return <?php echo $ValidationFunctionName;?>()"  value="register">Submit <i class="fa fa-arrow-right"></i></button>
					</div>
				
					
				</form>
				</div>
				<div class="col-sm-5" style="background:#e7e7e7; min-height: 250px;">
						<?php

							// $sql="select * from ".TBL_EMPLOYEE_DEL." join ".TBL_EMPLOYEE_EDD." on ".TBL_EMPLOYEE_DEL.".employee_id=".TBL_EMPLOYEE_EDD.".employee_id where employee_id='".$_SESSION['employee_id']."' ";
					// $sql.="inner join ".TBL_EMPLOYEE_EDD." on ".TBL_EMPLOYEE_DEL.".employee_id=".TBL_EMPLOYEE_EDD.".employee_id ";
							$sql="SELECT * FROM TBL_EMPLOYEE_DEL INNER JOIN TBL_EMPLOYEE_EDD ON TBL_EMPLOYEE_DEL.user_id = TBL_EMPLOYEE_EDD.user_id WHERE TBL_EMPLOYEE_DEL.employee_id = '".$_SESSION['employee_id']."' ";
							$sql2="SELECT * from TBL_EMPLOYEE_EXP inner join TBL_EMPLOYEE_WORKEX on TBL_EMPLOYEE_EXP.employee_id = TBL_EMPLOYEE_WORKEX.employee_id where TBL_EMPLOYEE_EXP.employee_id = '".$_SESSION['employee_id']."' ";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							$result2= $this->db->query($sql2,__FILE__,__LINE__);
					
							$row= $this->db->fetch_array($result);
							$row2= $this->db->fetch_array($result2);
							
							

							?>
							<h3 style="text-align:center;">form</h3><br>
							<div class="row">
								<div class="col-sm-6">
									<label>Name: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['name'];?></span><br>
									<label>Email: &nbsp;</label><span ><?php echo $row['email'];?></span><br>
									<label>Mob: &nbsp;</label><span ><?php echo $row['phoneno'];?></span><br>
									<label>Location: &nbsp;</label><span ><?php echo $row['current_loc'];?></span>
								</div>
								<div class="col-sm-6" style="text-align:center;">
									<img src="images/1466102498_avatar-03.png">
								</div>

							</div>
							
								<h5 style="color:black;">Academics</h5><br>
							<div>
								<label>Highest Qualifications: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['qualification_type'];?></span><br>
								<label>Specialization: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row['specialization'];?></span><br>
								<label>Passing Year: &nbsp;</label><span ><?php echo $row['passing_year'];?></span>									
							</div>

								<h5 style="color:black;">Experience</h5><br>
							<div>
								<label>Work Experience: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row2['experience_yrs'];?> years</span><br>
								<label>Current/Last Organisation: &nbsp;</label><span style="text-transform:capitalize;"><?php echo $row2['company_name'];?></span><br>
								<label>Job Title: &nbsp;</label><span style="text-transform:capitalize;" ><?php echo $row2['job_title'];?></span><br>
								<label>Annual Salary: &nbsp;</label><span ><?php echo $row2['current_salary'];?> Lacs</span>

								
							</div>


					</div>
			</div>
			</div>





					

								<?php 
										

						break;
			

			case 'server':
							extract($_POST);

							//$this->example=$example;
							//print_r($_POST);
							 //print_r($example);

							for ($i=0; $i <count($keyskills) ; $i++) { 
								
								
								for ($a=$i; $a <=$i ; $a++) { 
									$this->keyskillname=$keyskills[$a];
								}
								// for ($b=$i; $b <=$i ; $b++) { 
								// 	$this->examplename=$example[$b];
								// }


							// 	$insert_sql_array = array();
							// $insert_sql_array['keyskill_name'] = $this->keyskillname;
							// $insert_sql_array['key_rating'] = $this->examplename;
							
							// $insert_sql_array['user_id'] = $_SESSION['user_id'];
							// $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							// $this->db->insert(tbl_employee_keyskils,$insert_sql_array);


							}
							
							$this->langknown = $langknown;

							$this->anyother = $anyother;
							$this->currentlocation = $currentlocation;
							
							
							$this->expectedsalary = $expectedsalary;
							
							

							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							
								
						
							
							// $insert_sql_array = array();
							// $insert_sql_array['languages_known'] = $this->langknown;
							// //$insert_sql_array['key_skills'] = $this->keyskills;
							// //$insert_sql_array['password'] = $this->password;
							// $insert_sql_array['current_location'] = $this->currentlocation;
							
							
							// $insert_sql_array['expected_salary'] = $this->expectedsalary;
							


							// $insert_sql_array['user_id'] = $_SESSION['user_id'];
							// $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							// $this->db->insert(tbl_others,$insert_sql_array);

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
						
							
							
							
							
							
							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}

	
}
?> 