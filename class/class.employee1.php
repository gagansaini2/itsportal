<?php
class employee1{

	 var $db;
	 var $validity;
	 var $auth;
	
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->auth=new Authentication();
		
		$this->Form = new ValidateForm();
		$this->validity = new ClsJSFormValidation();

		
		}



		function empprofile($runat){
			switch ($runat) {
				case 'local':
				?>


					<div class="container">
				<div id="rootwizard">
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
	<ul>
	  	<li><a href="#tab1" data-toggle="tab">Personal</a></li>
		<li><a href="#tab2" data-toggle="tab">Academics</a></li>
		<li><a href="#tab3" data-toggle="tab">Experience</a></li>
		<li><a href="#tab4" data-toggle="tab">Other Details</a></li>
		
	</ul>
	 </div>
	  </div>
	</div>
	<form method="POST" enctype="multipart/form-data" >
	<div class="tab-content" ng-app="its" ng-controller="wizform" style="position: relative;" >
	    
			<div class="col-sm-offset-7 col-sm-5" style="background:#e7e7e7; min-height: 500px; position: absolute; margin-top: 100px;line-height:2.5;" >
							     
							        <h3 style="text-align:center;">Applicant form</h3>
							        <br>
							        <div class="row">
							          <div class="col-sm-6">
							            <label>Name: &nbsp;</label><span style="text-transform:capitalize;">{{form.fname}}&nbsp;{{form.mname}}&nbsp;{{form.lname}}</span>
							            <br>
							            <label>Email: &nbsp;</label><span>{{form.email}}</span>
							            <br>
							            <label>Mob: &nbsp;</label><span>{{form.altcncode}}&nbsp;{{form.phnno}}</span>
							            <br>
							            <label>Preferred Location: &nbsp;</label><span>{{form.preffloc}}</span>
							            </div>
							            
							          
							          <div class="col-sm-6" style="text-align:center;">
							            <img id="output" class="img-circle" width="130" height="130" >
							          </div>

							        </div>
							        <label>Highest Qualification: &nbsp;</label><span>{{form.highquad}}</span>
							            <br>
							            <label>Specification: &nbsp;</label><span>{{form.spec}}</span>
							            <br>
							            <label>Experience: &nbsp;</label><span>{{form.expyrs}}</span>
							            <br>
							            <label>Annual Salary: &nbsp;</label><span>{{form.annualsalary}}</span>
							            <br>
							            <label>Notice Period: &nbsp;</label><span>{{form.noticeperiod}}</span>
							            <br>
<pre>
{{json || form}}
</pre>

<input type="button" ng-click="savenow()" value="Save" >

							    </div>















	    <div class="tab-pane" id="tab1">
	     

	     

							  <h2>add your details</h2>
							  <div class="row">

							    <div class="col-sm-7">
							      <!-- <form  name="form1"  method="POST"> -->

							      <!-- Resume Details Start -->
							      <div class="panel-group col-sm-12">
							        <div class="panel panel-default panel-deefault">
							          <div class="panel-heading panel-heeading">
							            Personal Details
							          </div>


							          <div class="panel-body">

							            <div class="col-sm-12">

							              <label for="resume-name">Name*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-4" id="name-group">

							                  <input type="text" class="form-control " name="fname" id="name" placeholder="First Name" ng-model="form.fname">
							                  <span id="span_name"></span>
							                </div>
							                <div class="form-group col-sm-4" id="name-group">

							                  <input type="text" class="form-control " name="mname" id="mname" placeholder="Middle Name" ng-model="form.mname">
							                  <!-- <span id="span_mname"></span> -->
							                </div>
							                <div class="form-group col-sm-4" id="name-group">

							                  <input type="text" class="form-control " name="lname" id="lname" placeholder="Last Name" ng-model="form.lname">
							                  <span id="span_lname"></span>
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label for="resume-name">Email*</label>
							              <div class="form-group" id="email-group">

							                <input type="text" class="form-control" name="username" id="resume-name" placeholder="e.g.  abc@xyz.com" ng-model="form.email">
							                <span id="span_username"></span>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label for="resume-name">Phone No.*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-2" id="phoneno-group">

							                  <input type="text" class="form-control" name="countrycode" value="+91" placeholder="" ng-model="form.cncode">
							                </div>
							                <div class="form-group col-sm-10" id="phoneno-group">

							                  <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="9999999999" ng-model="form.phnno">
							                  <span id="span_phoneno"></span>
							                </div>
							              </div>

							            </div>
							            <div class="col-sm-12">
							              <label for="resume-name">Alternate Phone No.</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-2" id="phoneno-group">

							                  <input type="text" class="form-control" name="altrnatecountrycode" value="+91" placeholder=""ng-model="form.altcncode">

							                </div>
							                <div class="form-group col-sm-10" id="phoneno-group">

							                  <input type="text" class="form-control" name="altrnatephoneno" placeholder="9999999999" ng-model="form.altphno">

							                </div>
							              </div>
							            </div>




							            <div class="col-sm-12">
							              <label for="address">Residential Address*</label>
							              <div class="row">
							                <div class="form-group col-sm-12" id="address-group">
							                  <input type="text" class="form-control" name="street" id="address" placeholder="Street" ng-model="form.street">
							                  <span id="span_street"></span>
							                </div>
							                <div class="form-group col-sm-12" id="address-group">
							                  <input type="text" class="form-control" name="city" id="address" placeholder="City" ng-model="form.city">
							                  <span id="span_city"></span>
							                </div>
							                <div class="form-group col-sm-6" id="address-group">
							                  <select class="form-control" name="state" class="error" ng-model="form.state">
							                    <option value="" selected="">State</option>
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
							                  <span id="span_state"></span>
							                </div>
							                <div class="form-group col-sm-6" id="address-group">
							                  <input type="text" class="form-control" name="zip" id="address" placeholder="ZIP Code" ng-model="form.zip">
							                  <span id="span_zip"></span>
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label>DOB*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-4" id="age-group">
							                  <select name="month" id="month" class="form-control" placeholder="January" ng-model="form.dobmonth">
							                    <option value="" selected="">Month</option>
							                    <option value="01">January</option>
							                    <option value="02">February</option>
							                    <option value="03">March</option>
							                    <option value="04">April</option>
							                    <option value="05">May</option>
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
							                  <input type="text" id="age" class="form-control" name="day" placeholder="Date" ng-model="form.dobdate">
							                  <span id="span_day"></span>
							                </div>
							                <div class="form-group col-sm-4" id="age-group">
							                  <input type="text" id="age" class="form-control" name="year" placeholder="Year" ng-model="form.dobyear">
							                  <span id="span_year"></span>
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label class="">Gender*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-6" id="gender-group">
							                  <input type="radio" name="gender" value="male" id="gender" ng-model="form.gender">Male&nbsp;&nbsp;&nbsp;&nbsp;
							                  <input type="radio" name="gender" value="female" id="gender" ng-model="form.gender">Female&nbsp;&nbsp;&nbsp;&nbsp;
							                  <br>
							                  <span id="span_gender"></span>
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label for="photo">Upload your Photo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							              <p class="help-block" style="display:initial;">Profiles with pictures are 70% more likely to be contacted</p>
							              <div class="form-group" id="photo-group">
							                <!-- <input type="file" id="photo" name="photo"  file-model="form.photo"> -->
							                <!-- <span class="btn btn-default btn-file" >
											Add photo <input type = "file" name="photo" nv-file-model = "form.myFile" />
											</span> -->
											<input type ="file" name="photo" onchange="showImg(event)" file-model="form.file" />
											<script type="text/javascript">

												function showImg(event){
												
													var output = document.getElementById('output');
    												output.src = URL.createObjectURL(event.target.files[0]);
													

												}
											</script>
											
							                <p class="help-block">JPG PNG . file size: 5 MB</p>
							                <br>

							              </div>
							            </div>


							          </div>
							        </div>

							        <div class="panel panel-default panel-deefault">
							          <div class="panel-heading panel-heeading">
							            Other Details
							          </div>
							          <div class="panel-body">

							            <div class="col-sm-12">
							              <label>Marital Status*</label>
							              <br>
							              <div class="form-group" id="age-group">
							                <select name="maritalStatus" class="form-control" ng-model="form.mrital">
							                  <option value="" selected="">Select</option>
							                  <option value="Unmarried">Single/unmarried</option>
							                  <option value="Married">Married</option>
							                </select><span id="span_marital"></span>

							              </div>
							            </div>

							            <div class="col-sm-12">

							              <label>Physically Challenged</label>&nbsp;&nbsp;&nbsp;

							              <input type="radio" name="disability" id="disability" value="1" ng-model="form.disability">Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							              <input type="radio" name="disability" id="disability" value="0" ng-model="form.disability">No

							              <div id="disabilitytype"></div>

							            </div>


							            <div class="col-sm-12">
							              <br>
							              <label>Passport</label>&nbsp;&nbsp;&nbsp;

							              <input type="radio" id="chkYes" name="chkPassPort" value="1" ng-model="form.passport">Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							              <input type="radio" id="chkNo" name="chkPassPort" value="0" ng-model="form.passport">No

							              <div id="txtPassportNumber"></div>



							            </div>



							            <div class="col-sm-12">
							              <br>
							              <label>Facebook ID</label>
							              <div class="form-group" id="photo-group">

							                <input type="text" class="form-control" name="facebook" ng-model="form.facebook">
							              </div>
							            </div>


							            <div class="col-sm-12">
							              <label>Linkedin ID</label>&nbsp;&nbsp;&nbsp;
							              <p class="help-block" style="display:initial;">Profiles with Linkedin are considered more Trustworthy</p>
							              <div class="form-group" id="photo-group">

							                <input type="text" class="form-control" name="linkedin" ng-model="form.linkedin">
							                <br>
							              </div>
							            </div>




							          </div>
							        </div>


							        <div class="panel panel-default panel-deefault">
							          <div class="panel-heading panel-heeading">
							            Job Details
							          </div>
							          <div class="panel-body">

							            <div class="col-sm-12">
							              <label for="resume-name">Job Type*</label>&nbsp;&nbsp;&nbsp;
							              <div class="form-group">

							                <select style="width:;" name="jobtype" id="jobtype" class="form-control error" ng-model="form.jobtype">
							                  <option value="" selected="">Select</option>
							                  <option value="internship">Internship</option>
							                  <option value="part">Part Time</option>
							                  <option value="full">Full Time</option>
							                  <option value="freelance">Freelance</option>
							                  <option value="Fixed term contractor">Fixed term contractor</option>
							                </select>
							                <span id="span_jobtype"></span>
							              </div>
							            </div>


							            <div class="col-sm-12">
							              <label for="resume-name">Current Location*</label>
							              <br>
							              <div class="form-group">

							                <select class="form-control" name="currentlocation" class="error" ng-model="form.curentloc">
							                  <option value="" selected="">Select</option>
							                  
							                  <?php
							                  	$sql="select * from ".TBL_STATELIST." where 1 ";

							                  	$result= $this->db->query($sql,__FILE__,__LINE__);

												while($row= $this->db->fetch_array($result)){

													?>
													<option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
													<?php
												}

												?>
							                 
							              	  


							                 
							                </select> <span id="span_currentlocation"></span>
							              </div>


							            </div>

							            <div class="col-sm-12">
							              <label for="resume-name">Preferred Job Location*</label>
							              <div class="form-group">

							                <select class="form-control" name="preferloc" class="error" ng-model="form.preffloc">
							                  <option value="" selected="">Select</option>
							                  
							                  <?php
							                  	$sql="select * from ".TBL_STATELIST." where 1 ";

							                  	$result= $this->db->query($sql,__FILE__,__LINE__);

												while($row= $this->db->fetch_array($result)){

													?>
													<option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
													<?php
												}

												?>
							                </select>
							                <span id="span_preloc"></span>
							              </div>
							            </div>




							            <div class="col-sm-12">
							              <div class="form-group">
							                <label for="resume-name">Ready to Relocate</label>&nbsp;&nbsp;&nbsp;
							                <input type="radio" name="relocation" value="1" ng-model="form.relocate">Yes&nbsp;&nbsp;&nbsp;&nbsp;
							                <input type="radio" name="relocation" value="0" ng-model="form.relocate">No&nbsp;&nbsp;&nbsp;&nbsp;
							              </div>
							            </div>


							            <div class="col-sm-12">
							              <label for="photo">Upload your Resume</label>
							              <div class="form-group" id="photo-group">

							                <input type="file" name="resume">
							                <p class="help-block">Optionally upload your resume for employers to view. Max. file size: 1 MB</p>

							              </div>
							            </div>




							          </div>
							        </div>


							      </div>






							      <!-- <div class="col-sm-12 text-center">
													<p>&nbsp;</p>
													
													<a class="btn btn-primary btn-lg" name="back" href="emp_type.php" value=""><i class="fa fa-arrow-left"></i> Back</a>
													<button class="btn btn-primary btn-lg" name="submit" id="submitpersonal" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
												</div> -->






							      <!-- 	</form> -->

							    </div>
							   
							  </div>



							</div>
	    
	    <div class="tab-pane" id="tab2">
	     

	     <h2>Academics</h2>


							  <div class="row">
							    <div class="col-sm-7">
							      <!-- <form  name="form2" method="POST" > -->

							      <!-- Resume Details Start -->

							      <div class="row">
							      <div class="form-group col-sm-11">
							        <label>Highest Qualification</label>
							        <select name="highestqualification[]" class="form-control" id="highestqualification" ng-model="form.highquad">
							          <option value="">Select your highest qualification</option>
							          <option value="Doctorate/Phd">Doctorate/Phd</option>
							          <option value="Masters">Postgraduate</option>
							          <option value="Undergraduate">Undergraduate</option>

							        </select><span id="span_highestqualification"></span>


							      </div>


							      
							        <div class="form-group col-sm-11">
							          <label>Course</label>
							          <input type="text" class="form-control" name="course[]" placeholder="Enter Course" ng-model="form.course">
							          <span id="span_course"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>Specialization</label>
							          <input type="text" class="form-control" name="specialization[]" placeholder="Enter Specialization" ng-model="form.spec">
							          <span id="span_specialization"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>University/College</label>
							          <input type="text" class="form-control" name="university[]" placeholder="Institute Name" ng-model="form.college">
							          <span id="span_university"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>City</label>
							          <input type="text" class="form-control" name="city[]" placeholder="City Name" ng-model="form.clgcity">
							          <span id="span_city"></span>

							        </div>
							        <div class="form-group col-sm-11">

							          <div class="form-group" id="education-dates-group">
							            <label for="education-dates">Year of Passing</label>
							            <br>
							            <select name="year_passing[]" class="form-control" ng-model="form.pasinyr">
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

							      <div class="form-group col-sm-11">

								        <div class="row">
							          <div class="col-sm-6">

							            <input type="text" class="form-control" name="certificate[]" id="certificate" placeholder="Certification Name eg. CCNA" ng-model="form.cername">

							          </div>
							        
							        
							          <div class="col-sm-6" >

							            <input type="text" class="form-control" name="certificatenum[]" id="certificate" placeholder="Certificate No." ng-model="form.cerno">

							          </div>
							        </div>
							        <!-- <p class="help-block" >Certification should be certified </p> -->

							      </div>
							      
							      <div class="row">
							        <div class="col-sm-11">
							          <p><a id="add-certificate">+ Add certificate</a></p>

							        </div>
							      </div>

							      <!-- <div class="row text-center">
															<p>&nbsp;</p>
															<a class="btn btn-primary btn-lg" name="back" href="emp_prof1.php" value=""><i class="fa fa-arrow-left"></i> Back</a>
															<a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
															<button class="btn btn-primary btn-lg" name="submit" id="submiteducation" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
														</div> -->


							      <!-- </form> -->
							    </div>

							    
							  </div>


							</div>

	    
		<div class="tab-pane" id="tab3">
			

			<h2>experience</h2>



							  <!-- Resume Details Start -->
							  <div class="row">
							    <div class="col-sm-7">
							      <!-- <form  name="form3" method="POST"> -->
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
							        <div class="form-group">

							          <select name="exyear" id="expyear" class="form-control error" ng-model="form.expyrs">
							            <option value="" selected="">Select</option>
							            <option value="0">Fresher</option>
							            <option value="1 years">1 years</option>
							            <option value="2 years">2 years</option>
							            <option value="3 years">3 years</option>
							            <option value="4 years">4 years</option>
							            <option value="5 years">5 years</option>
							            <option value="6 years">6 years</option>
							            <option value="7 years">7 years</option>
							            <option value="8 years">8 years</option>
							            <option value="9 years">9 years</option>
							            <option value="10 years">10 years</option>
							            <option value="11 years">11 years</option>
							            <option value="12 years">12 years</option>
							            <option value="13 years">13 years</option>
							            <option value="14 years">14 years</option>
							            <option value="15 years">15 years</option>
							            <option value="16 years">16 years</option>
							            <option value="17 years">17 years</option>
							            <option value="18 years">18 years</option>
							            <option value="19 years">19 years</option>
							            <option value="20 years">20 years</option>
							            <option value="21 years">21 years</option>
							            <option value="22 years">22 years</option>
							            <option value="23 years">23 years</option>
							            <option value="24 years">24 years</option>
							            <option value="25 years">25 years</option>
							            <option value="26 years">26 years</option>
							            <option value="27 years">27 years</option>
							            <option value="28 years">28 years</option>
							            <option value="29 years">29 years</option>
							            <option value="30 years">30 years</option>
							            <option value="31 years">30+ years</option>
							          </select>
							          <span id="span_exyear"></span>
							        </div>
							      </div>



							      <div class="col-sm-11">
							        <label for="resume-name">No. of Organisations Worked with</label>
							        <div class="form-group">

							          <select name="worknum" class="form-control error" ng-model="form.worknum">
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
							        <div class="form-group">

							          <input type="text" class="form-control" name="compname[]" placeholder="Company Name" ng-model="form.compname"><span id="span_compname"></span>
							          <br>
							          <input type="text" class="form-control" name="jobtitle[]" placeholder="Job Title" ng-model="form.jobtitle"><span id="span_jobtitle"></span>
							          <br>
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
																</div> -->




							        </div>


							      </div>



							      <div class="col-sm-11">

							        <label for="resume-name">Current/Last Annual Package*</label>
							        <div class="form-group">

							          <select name="anumsal" class="form-control error" ng-model="form.annualsalary">

							            <option value="">Select</option>
							            <option value="<1 Lac">
							              <1 Lac</option>
							                <option value="1" Lacs>1</option>
							                <option value="2" Lacs>2</option>
							                <option value="3" Lacs>3</option>
							                <option value="4" Lacs>4</option>
							                <option value="5" Lacs>5</option>
							                <option value="6" Lacs>6</option>
							                <option value="7" Lacs>7</option>
							                <option value="8" Lacs>8</option>
							                <option value="9" Lacs>9</option>
							                <option value="10 Lacs">10</option>
							                <option value="11 Lacs">11</option>
							                <option value="12 Lacs">12</option>
							                <option value="13 Lacs">13</option>
							                <option value="14 Lacs">14</option>
							                <option value="15 Lacs">15</option>
							                <option value="16 Lacs">16</option>
							                <option value="17 Lacs">17</option>
							                <option value="18 Lacs">18</option>
							                <option value="19 Lacs">19</option>
							                <option value="20 Lacs">20</option>
							                <option value="21 Lacs">21</option>
							                <option value="22 Lacs">22</option>
							                <option value="23 Lacs">23</option>
							                <option value="24 Lacs">24</option>
							                <option value="25 Lacs">25</option>
							                <option value="26 Lacs">26</option>
							                <option value="27 Lacs">27</option>
							                <option value="28 Lacs">28</option>
							                <option value="29 Lacs">29</option>
							                <option value="30 Lacs">30</option>
							                <option value="31 Lacs">31</option>
							                <option value="32 Lacs">32</option>
							                <option value="33 Lacs">33</option>
							                <option value="34 Lacs">34</option>
							                <option value="35 Lacs">35</option>
							                <option value="36 Lacs">36</option>
							                <option value="37 Lacs">37</option>
							                <option value="38 Lacs">38</option>
							                <option value="39 Lacs">39</option>
							                <option value="40 Lacs">40</option>
							                <option value="41 Lacs">41</option>
							                <option value="42 Lacs">42</option>
							                <option value="43 Lacs">43</option>
							                <option value="44 Lacs">44</option>
							                <option value="45 Lacs">45</option>
							                <option value="46 Lacs">46</option>
							                <option value="47 Lacs">47</option>
							                <option value="48 Lacs">48</option>
							                <option value="49 Lacs">49</option>
							                <option value="50 Lacs">50</option>
							                <option value="50+ Lacs">50+</option>


							          </select>
							          <span id="span_salary"></span>
							        </div>
							      </div>


							      <div class="col-sm-11">
							        <div class="row col-sm-6">
							          <label for="resume-name">Notice Period*</label>
							          <div class="form-group">

							            <select name="noticeperiod" id="noticeperiod" class="form-control error" ng-model="form.noticeperiod">
							              <option value="">Select</option>
							              <option value="Immediate">Immediate</option>
							              <option value="<1 month">
							                <1 month</option>
							                  <option value="1 month">1 month</option>
							                  <option value="2 months">2 months</option>
							                  <option value="3 months">3 months</option>
							            </select>
							            <span id="span_notice"></span>
							          </div>
							        </div>
							        <div class="col-sm-6" style="padding: 25px 25px 30px 45px;">

							          <label for="resume-name">Is Buy-Back Option Available</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							          <input type="checkbox" name="buyback" data-size='small' data-on-text="Yes" data-off-text="No" data-on-color="info" value="yes">



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





							      <!-- <div class="col-sm-12 text-center">
														<p>&nbsp;</p>
														<a class="btn btn-primary btn-lg" name="back" href="emp_prof2.php" value=""><i class="fa fa-arrow-left"></i> Back</a>
														<a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
														<button class="btn btn-primary btn-lg" id="submitexperience" name="submit" onclick="return <?php echo $ValidationFunctionName;?>()" value="register">Next <i class="fa fa-arrow-right"></i></button>
													</div> -->



							      <!-- </form> -->
							    </div>
							

							  </div>



							</div>

	    
	    <div class="tab-pane" id="tab4" style="min-height: 750px;">
			

			 <h2>More Details</h2>



							  <!-- Resume Details Start -->
							  <div class="row">
							    <div class="col-sm-7">
							      <!-- <form  name="form4" id="fff" method="POST"> -->

							      <div class="col-sm-11">
							        <label for="resume-name">Languages Known*</label>
							        <div class="form-group">
							        	<selectize config='myConfig1' options='myOptions1' ng-model="form.langs"></selectize>
							         <!-- <selectize config='myConfig' options='myOptions' ng-model="myModel"> -->

							           
							        </div>
							      </div>




							      <div class="col-sm-11" style="float:none;">
							        <div class="form-group">
							          <label for="resume-name">Expected Salary &nbsp;&nbsp;&nbsp;<span class="help-block" style="display:initial;">Lacs per anum </span></label>
							          <select class="form-control" name="expectedsalary" class="error" ng-model="form.expsal">

							            <option value="Select">Select</option>
							            <option value="<1 Lac">
							              <1 Lac</option>
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
							        <div class="form-group">
							          <input type="text" class="form-control" name="anyother" ng-model="form.anyother"/>
							        </div>
							      </div>

							      <div class="col-sm-11">
							        <label for="resume-name">Key Skills*</label>
							        <br>
							        <div class="row form-group col-sm-7">

							         <selectize config='myConfig' options='myOptions' ng-model="form.keyskill"></selectize>

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

							          </div>
							        </div>
							      </div>



							      <!-- <button class="btn btn-primary btn-lg" name="submit" value="register">Submit <i class="fa fa-arrow-right"></i></button> -->

							      <!-- <div class="col-sm-12 text-center">
													<p>&nbsp;</p>
													<a class="btn btn-primary btn-lg" name="back" href="emp_prof3.php" value=""><i class="fa fa-arrow-left"></i>Back</a>
													<a class="btn btn-primary btn-lg" name="submit" href="job2.php" value="register">Next <i class="fa fa-arrow-right"></i></a>
													<button class="btn btn-primary btn-lg" name="submit" id="butto" onclick="return <?php echo $ValidationFunctionName;?>()"  value="register">Submit <i class="fa fa-arrow-right"></i></button>
												</div> -->


							      <!-- </form> -->
							    </div>
							   
							  </div>

	    </div>
		
		<ul class="pager wizard">
			<li class="previous first btn btn-lg" style="display:none;"><a href="#">First</a></li>
			<li class="previous btn"><a href="#">Previous</a></li>
			<li class="next last btn" style="display:none;"><a href="#">Last</a></li>
		  	<li class="next btn"><a href="#">Next</a></li>
		  	<button class="finish btn btan" name="submit" value="register" style="display:none;">Submit</button> 
		</ul>
		
	</div>
</form>
		
	
</div>
</div>



<?php
					break;
				
				case 'server':
					extract($_POST);

//image upload....
				$image = sha1(uniqid());
				$target_dir = "uploads/";
				
				
				$imageFileType = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
				$image1 = $image. "." .$imageFileType;
				$target_file = $target_dir . $image. "." .$imageFileType;

				$uploadOk = 1;

			
				//print_r($target_file);
				//Check if image file is a actual image or fake image
				
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["photo"]["tmp_name"]);
				    //print_r($check);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;


				        if ($_FILES["photo"]["size"] > 5000000) {
						    echo "Sorry, your file is too large.";
						    $uploadOk = 0;
						}
						elseif (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
						        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
						        $insert_sql_array = array();
					            $insert_sql_array['image_name'] = $image1;
					            $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					            $insert_sql_array['user_id'] = $_SESSION['user_id'];
					            $this->db->insert(TBL_IMAGE,$insert_sql_array);


					    } else {
					        echo "Sorry, there was an error uploading your file.";
					    }

				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}

//image upload endsssss.....





			


				   



			//print_r("expression");




				break;
			
			default:
				# code...
				break;
			}

		}

	


	
}

?>		