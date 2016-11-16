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
                                "password"=>array('password',"Password","Please enter Password","span_password")
                               
            );

            $ValidationFunctionName="Login_form";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;

			?>
						

						<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							<h1>Sign In</h1>
							<style>
							h2::after {
								
								/*content: none;*/
								
								/*display: block;
								height: 5px;
								margin-top: 10px;
								width: 60px;*/
							}
							</style>
							<h4></h4>
						
							</div>
						</div>

				<form name="<?php echo $FormName?>" method="POST">

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
						<button class="btn btn-primary btn-lg" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Sign in <i class="fa fa-arrow-right"></i></button>
						&nbsp;&nbsp;&nbsp;&nbsp;<span><a onclick="launch()">Forgot Password?</a></span>
					</div>

					<div class="row text-center">
						<br>
						<label>New Candidate -</label> <a href="signup.php">Sign Up Now</a>
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
									

									if ($row['status'] == 0) {
										$_SESSION['error_msg1']='Your Account is not activated yet,check your mail';
										$this->Login_form('local');
									}else{

										if($row['type'] != 2)
										{
										$_SESSION['error_msg1']='You are not a Jobseeker,goto <a href="signin-employer.php"> post a job</a> section to Sign In';
										$this->Login_form('local');
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
										window.location="index.php";
										</script>
										<?php
										exit();
										}
									}
								}
								else
								{
									$_SESSION['error_msg1']='Invalid username or password, please try again';
									$this->Login_form('local');
								}
								unset($_SESSION['error_msg1']);		
				
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
              	$this->terms = $terms;

               
            }
            $FormName = "signup_form";
            $ControlNames=array(
                                 
                                "name"=>array('name',"''","Please enter Name","span_name"),
                                "password"=>array('password',"Password","Please enter Password","span_password"),
                                "username"=>array('username',"EMail","Please enter Email","span_username"),
                                "phoneno"=>array('phoneno',"Number","Please enter Phone Number","span_phoneno"),
                               	"terms"=>array('terms',"Agree","","span_terms")
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
					<div>
						<input type="checkbox" name="terms"><label>&nbsp; I agree to <a href="TermsConditions.html" target="_blank">Terms & Conditions</a></label><br>
						<span id="span_terms"></span>
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
							$insert_sql_array['status'] = '0';
							//$insert_sql_array['auth_to'] = 'Superadmin';
							$this->db->insert(TBL_USER,$insert_sql_array);


							 $to = $this->username;
						                    
						                            $subject = "New registration @ Its Recruitment" ;
						                            $comment = '<div style="text-align:left">

						                            <p>Hello ,</p>
						                            <p>Your Account has been created with </p>
						                            <p>Username: "'.$this->username.'"</p>
						                            <p>Password: "'.$this->password.'"<br>


						                            <p><a style="   background: #04803a;
										            background-image: -webkit-linear-gradient(top, #04803a, #09961e);
										            background-image: -moz-linear-gradient(top, #04803a, #09961e);
										            background-image: -ms-linear-gradient(top, #04803a, #09961e);
										            background-image: -o-linear-gradient(top, #04803a, #09961e);
										            background-image: linear-gradient(to bottom, #04803a, #09961e);
										            -webkit-border-radius: 5;
										            -moz-border-radius: 5;
										            border-radius: 5px;
										            font-family: Arial;
										            color: #ffffff;
										            font-size: 20px;
										            padding: 10px 20px 10px 20px;
										            text-decoration: none;
										            margin:20px;
													" href="http://itsrecruitment.in/api.php?work=activation&email='.$username.'">Activate now</a></p>
										                            


						                            
						                            <p>Regards,</p>
						                            <p>The Its Recruitment</p>
						                            </div>';
						                            $header = "From: noreply@Itsrecruiment.in\r\n"; 
						                            $header.= "MIME-Version: 1.0\r\n"; 
						                            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
						                            $header.= "X-Priority: 1\r\n"; 

						                             mail($to, $subject, $comment, $header);
							
							
							?>


							
							
						<div class="container">
						

			
					
				<div class="jumbotron">	
					
					<div class="row text-center">
						<h4>An Activation link has been send to your email</h4>
						<h5>Activate Your Account and then sign in</h5>
						
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


	function activation_msg(){

?>
			<div class="container">
				<div class="jumbotron">			
					<div class="row text-center">
						<h4>Your Account is Activated</h4>
						<p>&nbsp;</p>						
						<a class="btn btn-primary btn-lg" onclick="self.close()">Close</a>
					</div>
				</div>
			</div>




<?php
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

								<a href="emp_profile.php?type=profess"><img src="images/1466098131_1.png" id="emptype"><div><h4><b>PROFESSIONAL</b></h4></div></a>
								<p class="help-block">I have at least 1 month of work experience</p>
							</div>
							<div class="col-sm-6 ">

							<!-- 	<a href="emp_prof1.php"><img src="images/1466102498_avatar-03.png" id="emptype"><div></div><h4><b>FRESHER</b></h4></div></a> -->
							<a href="emp_profile.php?type=fresh"><img src="images/fresher.png" id="emptype"><div><h4><b>FRESHER</b></h4></div></a>

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









	function header(){




							 ?>

					<div id="loader"> <i class="fa fa-cog fa-4x fa-spin"></i> </div>

					<!-- ============ PAGE LOADER END ============ --> 

					<!-- ============ NAVBAR START ============ -->
					<link rel="shortcut icon" href="images/favicon.png">

					    <!-- Main Stylesheet -->
					    <link href="css/style.css" rel="stylesheet">


					<!-- ============ NAVBAR END ============ --> 

					<!-- ============ HEADER START ============ -->




					<?php 


					if (isset($_SESSION['user_id'])) {

					   $sql="select * from ".TBL_USER." where user_id='".$_SESSION['user_id']."' "; 
					  $result= $this->db->query($sql,__FILE__,__LINE__);
					  $row= mysql_fetch_assoc($result);
					  // print_r($sql);
					  // print_r($result);
					  $usertype=$row['type'];


					        if ($usertype ==  2) { ?>

					         <header>
					            <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
					            <div class="navbar-header">
					              <!-- <div class="navbar-header">
					                <a class="navbar-brand" href="#">WebSiteName</a>
					              </div> -->
					                <div class="navbar-brand">
					                    <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
					                  </div>
					            </div>      
					              <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
					              
					                <li><a href="index.php">Home</a></li>
					                <li><a href="about.php">About Us</a></li>
					                <li><a href="company.php">Our Process</a></li>
					                <li><a href="jobslist.php">Jobs</a></li>
					                <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' style='text-transform:capitalize;'><?php echo $_SESSION['name'];?> &nbsp; <span class='caret'></span></a> 
					                <ul role='menu' class='dropdown-menu'>

					                <?php 
					  
					                    $sql1="select count(*) as total from ".TBL_EMPLOYEE_DEL." where user_id='".$_SESSION['user_id']."'";
					                    $result1=$this->db->query($sql1,__FILE__,__LINE__);
					                    $row1=mysql_fetch_assoc($result1);
					                    
					                      if ($row1['total'] > 0) {
					                       
					                        echo "<li><a href='view_profile.php'>View/Edit My Profile</a></li>";
					                      }else{
					                        echo "<li><a href='emp_type.php'>Upload Your Profile</a></li>";
					                      }
					                      
					                      echo "<li><a href='my_profile.php'>My Profile</a></li>";
					                      echo "<li><a href='logout.php'>Logout</a></li>";
					                ?>      

					                </ul></li>      
					              
					              </ul>
					            
					            </div>
					                
					        </header>    

					     <?php }elseif($usertype == 3) { ?>  
					     

					                 <header>
					                        <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
					                        <div class="navbar-header">
					                          <!-- <div class="navbar-header">
					                            <a class="navbar-brand" href="#">WebSiteName</a>
					                          </div> -->
					                            <div class="navbar-brand">
					                                <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
					                              </div>
					                        </div>      
					                          <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
					                          
					                            <li><a href="index.php">Home</a></li>
					                            <li><a href="about.php">About Us</a></li>
					                            <li><a href="company.php">Our Process</a></li>
					                            <li><a href="jobslist.php">Jobs</a></li>
					                            <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' style='text-transform:capitalize;'><?php echo $_SESSION['name'];?> &nbsp; <span class='caret'></span></a> 
					                            <ul role='menu' class='dropdown-menu'>
					                            <?php 

					                                $sql2="select count(*) as total from ".TBL_COMPANY." where user_id='".$_SESSION['user_id']."'";
					                                $result2=$this->db->query($sql2,__FILE__,__LINE__);
					                                $row2=mysql_fetch_assoc($result2);

					                                  if ($row2['total'] > 0) {
					                                   
					                                    echo "<li><a href='company_list.php'>View/Edit My Profile</a></li>";
					                                    echo "<li><a href='myjob_list.php'>View My Jobs</a></li>"; 
					                                    echo "<li><a href='postjob.php'>Post a Job</a></li>";
					                                  }else{
					                                    echo "<li><a href='companyprof.php'>Upload Your Profile</a></li>";
					                                  }
					                                   echo "<li><a href='my_profile.php'>My Profile</a></li>";
					                                  echo "<li><a href='logout.php'>Logout</a></li>";
					                            ?>
					                                </ul></li>  
					                            </ul>
					                        
					                        </div>
					                            
					                  </header>

					          <?php   }else{
					          ?>

					           		<header>
					                        <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
					                        <div class="navbar-header">
					                          <!-- <div class="navbar-header">
					                            <a class="navbar-brand" href="#">WebSiteName</a>
					                          </div> -->
					                            <div class="navbar-brand">
					                                <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
					                              </div>
					                        </div>      
					                          <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
					                          
					                            <li><a href="index.php">Home</a></li>
					                            <li><a href="about.php">About Us</a></li>
					                            <li><a href="company.php">Our Process</a></li>
					                            <li><a href="jobslist.php">Jobs</a></li>
					                            <li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' style='text-transform:capitalize;'><?php echo $_SESSION['name'];?> &nbsp; <span class='caret'></span></a> 
					                            <ul role='menu' class='dropdown-menu'>
					                            <?php 

					                                $sql2="select count(*) as total from ".TBL_COMPANY." where user_id='".$_SESSION['user_id']."'";
					                                $result2=$this->db->query($sql2,__FILE__,__LINE__);
					                                $row=mysql_fetch_assoc($result2);
					                               
					                                  if ($row['total'] > 0) {
					                                   
					                                     //echo "<li><a href=''>View/Edit My Profile</a></li>";
					                                  		echo "<li><a href='postjob.php'>Post a Job</a></li>";
					                                  		echo "<li><a href='company_list.php'>View My Companies</a></li>";
					                                  		echo "<li><a href='myjob_list.php'>View My Jobs</a></li>";
					                                  }
					                                  
					                                  echo "<li><a href='companyprof.php'>Upload Profile</a></li>";
					                                  echo "<li><a href='my_profile.php'>My Profile</a></li>";
					                                  echo "<li><a href='logout.php'>Logout</a></li>";
					                            ?>
					                                </ul></li>  
					                            </ul>
					                        
					                        </div>
					                            
					                  </header>


					          <?php
					          }


					  } else{  ?>

					                  <header>
					                      <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
					                      <div class="navbar-header">
					                        <!-- <div class="navbar-header">
					                          <a class="navbar-brand" href="#">WebSiteName</a>
					                        </div> -->
					                          <div class="navbar-brand">
					                              <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
					                            </div>
					                      </div>      
					                        <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
					                        
					                          <li><a href="index.php">Home</a></li>
					                          <li><a href="about.php">About Us</a></li>
					                          <li><a href="company.php">Our Process</a></li>
					                          <li><a href="jobslist.php">Jobs</a></li>
					                         
					                          <li><a href='signin.php'>Post a Resume</a></li>
					                          <li><a href='signin-employer.php'>Post a Job</a></li>  

					                        </ul>

					                       <!--  <form ng-app="its" ng-controller="login">
					                        	<div class="navbar-form">
					                        		 <div class="form-group">
								                        <input type="text" class="form-control" name="username" placeholder="Username">
								                    </div>
								                    <div class="form-group">
								                        <input type="text" class="form-control" name="password" placeholder="Password">
								                    </div>
								                    <button type="submit" class="btn btn-default">Sign In</button>
					                        	</div>
					                        </form>
					                       -->
					                    </div>
					                          
					                    </header>



					    <?php    }

	}
 		
}
?> 