<?php
class employer{

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
					</div>

					<div class="row text-center">
						<br>
						<label>New Clients -</label> <a href="signup-employer.php">Sign Up Now</a>
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
									$this->name = $row['name'];
                                    $this->company_id = $row['company_id'];
									
									$this->auth->Create_Session1($username,$this->user_id,$this->name,$this->user_type,$this->company_id);

									?>
									<script type="text/javascript">
									window.location="companyprof.php";
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

				<form name="<?php echo $FormName?>" method="POST">

					

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
									window.location = "signup-employer.php"
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
						

			
					
				<div class="jumbotron">	
					
					<div class="row text-center">
						<h4>You are successfully registered</h4>
						<h5>Click next to proceed</h5>
					</div>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						<a class="btn btn-primary btn-lg" name="submit" href="signin-employer.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
						
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



					 // if(count($_POST)>0 and $_POST['submit']=='Submit'){
      //           extract($_POST);
      //           $this->company_name = $company_name;
      //           $this->company_email = $company_email;
      //           $this->company_location = $company_location;
      //           $this->company_num = $company_num;
      //          	$this->company_website = $company_website;
      //           $this->company_type = $company_type;
      //           $this->company_description = $company_description;
                
               
      //       }
      //       $FormName = "company_prof";
      //       $ControlNames=array(
                                 
      //                           "company_name"=>array('company_name',"''","Please enter Name","span_name"),
      //                           "company_location"=>array('company_location',"''","Please enter location","span_location"),
      //                           "company_email"=>array('company_email',"EMail","Please enter Email","span_username"),
      //                           "company_num"=>array('company_num',"Number","Please enter Phone Number","span_phoneno"),
      //                           "company_website"=>array('company_website',"''","Please enter Website","span_website"),
      //                           "company_type"=>array('company_type',"''","Please select Domain","span_domain"),
      //                           "company_description"=>array('company_description',"''","Please enter Description","span_descrip")
                               
      //       );

      //       $ValidationFunctionName="comp_prof";
          
      //       $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
      //       echo $JsCodeForFormValidation;
						

						?>


			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1 style="font-size:38px;">Add company</h1>
						<h4>register your company</h4>
						<!--div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="#" class="btn btn-primary">Sign In</a></p>
						</div-->
					</div>
				</div><br><br><br>
				

				
					<h2>Company Details</h2>
					<div class="jumbotron">	
						
						
						<form name="companyform" method="POST" >	

						<div class="row">	
						<div class="col-sm-6">
							
							<div class="form-group" id="company-name-group">
								<label for="company-name">Company Name*</label>
								<input type="text" class="form-control" name="company_name" placeholder="Company Name" ng-model="company.company_name" required> 
								<span id="span_name"></span>
							</div>
							<div class="row">
							<div class="form-group col-sm-6" id="job-email-group">
								<label for="job-email">Email*</label>
								<input type="email" class="form-control" name="company_email" placeholder="Email" ng-model="company.company_email" required>
								<span id="span_username"></span>
							</div>
							<div class="form-group col-sm-6" id="company-group">
								<label for="company">Phone Number*</label>
								<input type="text" class="form-control" name="company_num" placeholder="Phone Number" ng-model="company.company_num" required>
								<span id="span_phoneno"></span>
							</div>
							</div>
							<div class="form-group" id="company-group">
								<label for="company">Location*</label>
								
								<select class="form-control" name="company_location" ng-model="company.company_location" ng-options="x.city as x.city for x in cities" required>
									<option value="">Select Location</option>
								</select>
								<span id="span_location"></span>
							</div>
							
							<div class="form-group" id="company-website-group">
								<label for="company-website">Website*</label>
								<input type="text" class="form-control" id="company-website" name="company_website" placeholder="http://" ng-model="company.company_website" required>
								<span id="span_website"></span>
							</div>

							

							<div class="form-group" id="company-group">
								<label for="company">Domain*</label>
								<select  class="form-control" id="job-type" name="company_type" ng-model="company.company_type" required>
				                    <option selected="" value="">- Select an Industry -</option>
				                    <option value="Accessories/Apparel/Fashion Design">Accessories/Apparel/Fashion Design</option>
				                    <option value="Accounting/Consulting/Taxation">Accounting/Consulting/Taxation</option>
				                    <option value="Advertising/Event Management/PR">Advertising/Event Management/PR</option>
				                    <option value="Agriculture/Dairy Technology">Agriculture/Dairy Technology</option>
				                    <option value="Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
				                    <option value="Animation / Gaming">Animation / Gaming</option>
				                    <option value="Architectural Services/ Interior Designing">Architectural Services/ Interior Designing</option>
				                    <option value="Auto Ancillary/Automobiles/Components">Auto Ancillary/Automobiles/Components</option>
				                    <option value="Banking/Financial Services/Stockbroking/Securities">Banking/Financial Services/Stockbroking/Securities</option>
				                    <option value="Banking/FinancialServices/Broking">Banking/FinancialServices/Broking</option>
				                    <option value="Biotechnology/Pharmaceutical/Clinical Research">Biotechnology/Pharmaceutical/Clinical Research</option>
				                    <option value="Brewery/Distillery">Brewery/Distillery</option>
				                    <option value="Cement/Construction/Engineering/Metals/Steel/Iron">Cement/Construction/Engineering/Metals/Steel/Iron</option>
				                    <option value="Ceramics/Sanitaryware">Ceramics/Sanitaryware</option>
				                    <option value="Chemicals/Petro Chemicals/Plastics">Chemicals/Petro Chemicals/Plastics</option>
				                    <option value="Computer Hardware/Networking">Computer Hardware/Networking</option>
				                    <option value="Consumer FMCG/Foods/Beverages">Consumer FMCG/Foods/Beverages</option>
				                    <option value="Consumer Goods - Durables">Consumer Goods - Durables</option>
				                    <option value="Courier/Freight/Transportation/Warehousing">Courier/Freight/Transportation/Warehousing</option>
				                    <option value="CRM/ IT Enabled Services/BPO">CRM/ IT Enabled Services/BPO</option>
				                    <option value="Education/Training/Teaching">Education/Training/Teaching</option>
				                    <option value="Electricals/Switchgears">Electricals/Switchgears</option>
				                    <option value="Employment Firms/Recruitment Services Firms">Employment Firms/Recruitment Services Firms</option>
				                    <option value="Entertainment/Media/Publishing/Dotcom">Entertainment/Media/Publishing/Dotcom</option>
				                    <option value="Export Houses/Textiles/Merchandise">Export Houses/Textiles/Merchandise</option>
				                    <option value="FacilityManagement">FacilityManagement</option>
				                    <option value="Fertilizers/Pesticides">Fertilizers/Pesticides</option>
				                    <option value="FoodProcessing">FoodProcessing</option>
				                    <option value="Gems and Jewellery">Gems and Jewellery</option>
				                    <option value="Glass">Glass</option>
				                    <option value="Government/Defence">Government/Defence</option>
				                    <option value="Healthcare/Medicine">Healthcare/Medicine</option>
				                    <option value="HeatVentilation/AirConditioning">HeatVentilation/AirConditioning</option>
				                    <option value="Insurance">Insurance</option>
				                    <option value="KPO/Research/Analytics">KPO/Research/Analytics</option>
				                    <option value="Law/Legal Firms">Law/Legal Firms</option>
				                    <option value="Machinery/Equipment Manufacturing/Industrial Products">Machinery/Equipment Manufacturing/Industrial Products</option>
				                    <option value="Mining">Mining</option>
				                    <option value="NGO/Social Services">NGO/Social Services</option>
				                    <option value="Office Automation">Office Automation</option>
				                    <option value="Others/Engg. Services/Service Providers">Others/Engg. Services/Service Providers</option>
				                    <option value="Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy">Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy</option>
				                    <option value="Printing/Packaging">Printing/Packaging</option>
				                    <option value="Publishing">Publishing</option>
				                    <option value="Real Estate">Real Estate</option>
				                    <option value="Retailing">Retailing</option>
				                    <option value="Security/Law Enforcement">Security/Law Enforcement</option>
				                    <option value="Shipping/Marine">Shipping/Marine</option>
				                    <option value="Software Services">Software Services</option>
				                    <option value="Steel">Steel</option>
				                    <option value="Strategy/ManagementConsultingFirms">Strategy/ManagementConsultingFirms</option>
				                    <option value="Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor">Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor</option>
				                    <option value="Telecom/ISP">Telecom/ISP</option>
				                    <option value="Tyres">Tyres</option>
				                    <option value="WaterTreatment/WasteManagement">WaterTreatment/WasteManagement</option>
				                    <option value="Wellness/Fitness/Sports">Wellness/Fitness/Sports</option>

                
								</select>
								<span id="span_domain"></span>
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
							
							<div class="form-group" id="company-description-group">
								<label for="company-description">About Company*</label>
								<input type="text" class="form-control" name="company_description" ng-model="company.company_description" placeholder="Company Description" required>
								<span id="span_descrip"></span>
							</div>
							<div class="form-group" id="company-video-group">
								<label for="company-video">Company Vision</label>
								<input type="text" class="form-control" name="company_vision" placeholder="Vision" ng-model="company.company_vision">
							</div>
							<div class="form-group" id="company-google-group">
								<label for="company-google">Mission</label>
								<input type="text" class="form-control" name="company_mission" placeholder="Your Company Mission" ng-model="company.company_mission">
							</div>
							<div class="form-group" id="company-group">
								<label for="company">Size of Employees</label>
								<input type="text" class="form-control" id="company-emp" name="company_size" placeholder="10,0000" ng-model="company.company_size">

							</div>
							
							<div class="form-group" >
								<label for="company-logo">Logo</label>
								<input type="file" id="company_logo" accept="image/* ">
							</div>

							

						</div>
						</div><br><br>



						<div align="center">
							<button class="btn btn-primary btn-lg" name="submit" value="register" ng-click="submitcomp(companyform.$valid)">Submit <i class="fa fa-arrow-right"></i></button>
						</div>
						</form>
					</div>
				
			</div>


								<?php 
										

						break;
			

			case 'server':
							
								
							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}

	

	function post_job($runat)
	{
		switch($runat){
			case 'local':

			 // if(count($_POST)>0 and $_POST['submit']=='Submit'){
    //             extract($_POST);
    //             $this->roletitle = $roletitle;
    //             $this->rolelocation = $rolelocation;
    //             $this->jobtype = $jobtype;
    //             $this->department = $department;
    //            	$this->jobcategory = $jobcategory;
    //             $this->qualifications = $qualifications;
    //             $this->description = $description;
    //             $this->req_experience = $req_experience;
    //             $this->remuneration = $remuneration;
    //            	$this->designation = $designation;
    //             $this->keyskills = $keyskills;
    //             $this->keysaccountabilities = $keysaccountabilities;
                
               
    //         }
    //         $FormName = "posting_job";
    //         $ControlNames=array(
                                 
    //                             "roletitle"=>array('roletitle',"''","Please enter the Roletitle","span_roletitle"),
    //                             "rolelocation"=>array('rolelocation',"''","Please enter location","span_location"),
    //                             "jobtype"=>array('jobtype',"''","Please select one","span_type"),
    //                             "department"=>array('department',"''","Please select one","span_department"),
                                
    //                             "qualifications"=>array('qualifications',"''","Please enter qualifications","span_qualifications"),
    //                             "description"=>array('description',"''","Please enter Description","span_descrip"),
    //                             "req_experience"=>array('req_experience',"''","Please enter Experience","span_experience"),
    //                             "remuneration"=>array('remuneration',"''","Please enter remuneration","span_remuneration"),
    //                             "designation"=>array('designation',"''","Please enter designation","span_designation"),
    //                             "keyskills"=>array('keyskills',"''","Please enter atleast one","span_keyskill"),
    //                             "keysaccountabilities"=>array('keysaccountabilities',"''","Please enter atleast one","span_keysaccountabilities")
                               
    //         );
  		// $ValidationFunctionName="post_job";
          
    //         $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
    //         echo $JsCodeForFormValidation;
						

						?>




			
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1 style="font-size:40px;">Post a Job</h1>
						<h4>Find a Right Candidate</h4>
						<!--div class="jumbotron">
							<h3>Have an account?</h3>
							<p>If you don’t have an account you can create one below by entering your email address/username.<br>
							A password will be automatically emailed to you.</p>
							<p><a href="#" class="btn btn-primary">Sign In</a></p>
						</div-->
					</div>
				</div><br><br><br>
				<h2 >Job Details</h2>
<pre>{{JSON || job}}</pre>


				



				<div class="jumbotron">


					 
				<form name="jobform" method="POST">
					<div class="row">
						
						<div class="col-sm-6">
						
							
							<div class="form-group" id="job-title-group">
								<label for="job-title">Job Title*</label>
								<input type="text" class="form-control" name="roletitle" ng-model="job.roletitle" placeholder="e.g. Web Designer" required>
								<span id="span_roletitle"></span>
							</div>
							<div class="form-group" id="job-title-group">
								<label for="job-title">Department*</label>
								<select  class="form-control" name="department" ng-model="job.department" required>
									<option value="">Choose a Department</option>
									<option value="Production">Production</option>
									<option value="Marketing & Sales">Marketing & Sales</option>
									<option value="Finance">Finance</option>
									<option value="Human resource">Human resource</option>
									<option value="Information Technology">Information Technology</option>

									
								</select><span id="span_department"></span>
								
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Role Location*</label>
								
								<select class="form-control" name="rolelocation" ng-model="job.rolelocation" ng-options="x.city as x.city for x in cities" required>
									<option value="">Select Location</option>
								</select>
								<span id="span_location"></span>
							</div>
							
							
							<div class="form-group" id="job-type-group">
								<label for="job-type">Job Type*</label>
								<select  class="form-control" id="job-type" name="jobtype"  ng-model="job.jobtype" required>
									<option value="">Choose a job type</option>
									<option value="Freelance">Freelance</option>
									<option value="Part Time">Part Time</option>
									<option value="Full Time">Full Time</option>
									<option value="Internship">Internship</option>
									<option value="Volunteer">Volunteer</option>
									<option value="Fixed term contractor">Fixed term contractor</option>
								</select><span id="span_type"></span>
							</div>
							
							
							
							<div class="form-group" id="job-description-group">
								<label for="job-description">Qualifications*</label>
								<input type="text" class="form-control" name="qualifications" ng-model="job.qualifications" placeholder="Needed as per Job" required>
								<span id="span_qualifications"></span>
							</div>
							 
							<div class="form-group" id="job-description-group">
								<label for="job-description">Description*</label>
								<input type="text" class="form-control" name="description" ng-model="job.description" placeholder="Description" required>
								<span id="span_descrip"></span>
							</div>
							
							
							
						</div>	
							
						<div class="col-sm-6">

							<div class="form-group" id="job-location-group">
								<label for="job-location">Experience*</label>
								<select name="req_experience" class="form-control" ng-model="job.req_experience" required>
									<option value="">Experience required in years</option>
									<option value="Fresher">Fresher</option>
									<option value="0-2">0-2</option>
									<option value="2-5">2-5</option>
									<option value="5-8">5-8</option>
									<option value="8-11">8-11</option>
									<option value="11-14">11-14</option>
									<option value="14-17">14-17</option>
									<option value="17-20">17-20</option>
									<option value="20+">20+</option>
									</select>
								<span id="span_experience"></span>
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Designation*</label>
								<input type="text" class="form-control" name="designation" ng-model="job.designation" placeholder="Designation" required>
								<span id="span_designation"></span>
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Remuneration*</label>
								<input type="text" class="form-control" name="remuneration" ng-model="job.remuneration" placeholder="Remuneration" required>
								<span id="span_remuneration"></span>
							</div>
							<div class="form-group" id="job-location-group">
								<label for="job-location">Employee Value Proposition</label>
								<input type="text" class="form-control" name="valueproposition" ng-model="job.valueproposition" placeholder="Value Proposition">
								<span id="span_remuneration"></span>
							</div>

							
							<div class="form-group" >
								<label for="job-description">Key Skills*</label>
								
								<selectize config='myConfig' options='myOptions' ng-model="job.keyskills" name="keyskills" required></selectize>
								 <span ng-if="jobform.$submitted && jobform.keyskills.$invalid" style="color:black;">This field is required.</span>
							</div>
							<div class="form-group" >
								<label for="job-description">Key Accountabilities*</label>
								<input type="text" class="form-control"  name="keysaccountabilities" ng-model="job.keysaccountabilities" placeholder="Key Accountabilities" required>
								<span id="span_keysaccountabilities"></span>
							</div>
							
						</div>


					</div><br><br>
					
					<div class="row text-center">

						<button class="btn btn-primary btn-lg" name="submit" ng-click="submitjob(jobform.$valid)" value="register">Submit <i class="fa fa-arrow-right"></i></button>
					</div>
				</form>
				</div>
			</div>


								<?php 
										

						break;
			

			case 'server':
							extract($_POST);
							
							$this->roletitle = $roletitle;
							$this->department = $department;
							$this->rolelocation = $rolelocation;
							$this->jobtype = $jobtype;
							$this->jobcategory = $jobcategory;
							$this->qualifications = $qualifications;
							$this->description = $description;
							$this->experience = $experience;
							$this->designation = $designation;
							$this->remuneration = $remuneration;
							$this->keyskills = $keyskills;
							$this->keysaccountabilities = $keysaccountabilities;


							//$this->type = $type;
							//$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							//if($this->Form->ValidField($username,'empty','User field is Empty or Invalid')==false)
							//	$return =false;
							//if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
							//	$return =false;	
							
							// $sql="select * from ".tbl_jobs." where role_title='".$this->roletitle."'";
							// $result= $this->db->query($sql,__FILE__,__LINE__);
							// if($this->db->num_rows($result)>0)
							// {
							// 	$_SESSION['error_msg'] = 'User already exist. Please select another username';
							// 
						
							// 	<?php
							// 	exit();

								
							// }
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['role_title'] = $this->roletitle;
							$insert_sql_array['department'] = $this->department;
							$insert_sql_array['role_location'] = $this->rolelocation;
							$insert_sql_array['job_type'] = $this->jobtype;
							$insert_sql_array['job_category'] = $this->jobcategory;
							$insert_sql_array['qualifications'] = $this->qualifications;
							$insert_sql_array['job_description'] = $this->description;
							$insert_sql_array['job_experience'] = $this->experience;
							$insert_sql_array['job_designation'] = $this->designation;
							$insert_sql_array['remuneration'] = $this->remuneration;
							$insert_sql_array['key_skills'] = $this->keyskills;
							$insert_sql_array['keys_accountabilities'] = $this->keysaccountabilities;

							$insert_sql_array['user_id']=$_SESSION['user_id'];
							$insert_sql_array['company_id']=$_SESSION['company_id'];


							$this->db->insert(tbl_jobs,$insert_sql_array);

					

					?>
					

							<div class="container">
						<div class="row text-center">
							<div class="col-sm-12">
							
						
							</div>
						</div>

			
					
				<div class="jumbotron">	
					
					<div class="row text-center">
						<h4>Your Job has posted</h4>
						<h5>thank you !!</h5>
					</div><br><br><br>
					<div class="row text-center">
						<p>&nbsp;</p>
						
						
						<a class="btn btn-primary btn-lg" name="submit" href="postjob.php">Post more Jobs </a>
						<a class="btn btn-primary btn-lg" name="submit" href="index.php" value="register">Next </a>
						
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