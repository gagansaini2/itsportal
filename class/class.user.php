<?php
class user{

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
							<div class="form-group" id="resume-name-group">
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
									window.location = "job2.php"
								</script>
								<?php
								exit();
							}
								
							if($return){
							
							$insert_sql_array = array();
							//$insert_sql_array['name'] = $this->name;
							$insert_sql_array['user'] = $this->username;
							$insert_sql_array['password'] = $this->password;
							//$insert_sql_array['type'] = $this->type;
							//$insert_sql_array['auth_to'] = 'Superadmin';
							$this->db->insert(TBL_USER,$insert_sql_array);


							/* $to = "gsaini94@ymail.com";
						                    
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

						                            mail($to, $subject, $comment, $header);
							*/
							$_SESSION['msg'] = 'User has been created Successfully';
							
							?>
							<script type="text/javascript">
								window.location = "post-a-resume1.php";
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

	

	/*function forgot_password($runat)
	{
		
		switch($runat){
			
			case 'local' :

					?>
				

				<div class="login_container">
			<div class="container">
	 	
	 		<div class="row">

	 		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offest-2 col-xs-12">
				<div class="panel panel-default pad70 wow fadeInUp" data-wow-delay="0.5s">
				  <h4 class="headforget">Find Your Account</h4>

					<div class="form-group">
				 	<form class="form-signup">
		
			 	
					<label for="username" class="userforget"> Enter Your Email address</label>		 	 
			        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" style="cursor:auto">
			        		
			        <p class="recover">A recovery password will be send to your email address</p>
            		</div>

                	
                	<div class="form-group">
					<button class="btn btn-success btn-success-for" name="submit" type="submit" value="forget"> submit</button>
				</div>      			
                </form>
      			    
				
			</div>	
			
		</div>

		</div>


			<?php
					
						
						break;

			case 'server' :			
						
						extract($_POST);
						$this->email = $email;


							if($this->Form->IsEmail($email)){
								// true email valid 
								
								$sql="select * from ".TBL_USER." where user = '".$email."' ";
								$result= $this->db->query($sql,__FILE__,__LINE__);
									if($this->db->num_rows($result)>0)
									{
									
						                
						               $length = 10;

						               $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
						               
						                            $to = $email;
						                    
						                            $subject = "Forgot password reset @ Sales web" ;
						                            $comment = '<div style="text-align:left">

						                            <p>Hello ,</p>
						                            <p>Your new password is "'.$randomString.'".</p>
						                            <p>Regards,</p>
						                            <p>The shakedup Team</p>
						                            </div>';
						                            $header = "From: noreply@Salesweb.com\r\n"; 
						                            $header.= "MIME-Version: 1.0\r\n"; 
						                            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
						                            $header.= "X-Priority: 1\r\n"; 

						                            mail($to, $subject, $comment, $header);
						                
						                        
													$update_sql_array = array();
													$update_sql_array['password'] = $randomString;						
													$this->db->update(TBL_USER,$update_sql_array,'user',$email);
													

													?>


													<script>
													window.location = "login.php";

													</script>
						                
						                        <?php
												exit();
						                   
						                
									
									}
								
						}
							
			
								break;
					

					default :		echo "Invalid Parameter";
				
		}
	}*/
	

	
}
?> 