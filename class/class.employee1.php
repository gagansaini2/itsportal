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


					<div class="container" ng-app="its" ng-controller="wizform">


				<form id="fooorm" name="myform" method="POST" ng-submit="submit(myform.$valid)" enctype="multipart/form-data" >		
				<div id="rootwizard"  >
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container" style="margin-top: -30px;padding-left: 30%;">
	<ul class="text-center">
	  	<li><a href="#tab1" data-toggle="tab">Personal</a></li>
		<li><a href="#tab2" data-toggle="tab">Academics</a></li>
		<li><a href="#tab3" data-toggle="tab">Experience</a></li>
		<li><a href="#tab4" data-toggle="tab">Other Details</a></li>
		
	</ul>
	 </div>
	  </div>
	</div>
	
	<div class="tab-content" style="position: relative;" >
	    
			<div class="col-sm-offset-7 col-sm-5" style="background:#e7e7e7; min-height: 500px; position: absolute; margin-top: 100px;line-height:2.5;" >
							     
							        <h3 style="text-align:center;">Applicant form</h3>
							        

							        <div class="col-sm-12" style="text-align:center;">

								          	<img src="images/profile_default.png" class="img-circle" width="150" height="150" ng-if="!form.pic">
								            <img ng-src="{{form.pic}}" class="img-circle" width="150" height="150" ng-if="form.pic">
							        </div>
							       
							        <div class="col-sm-12">
							        	<br>
							            <label>Name: &nbsp;</label><span style="text-transform:capitalize;">{{form.fname}}&nbsp;{{form.mname}}&nbsp;{{form.lname}}</span>
							            <br>
							            <label>Email: &nbsp;</label><span>{{form.email}}</span>
							            <br>
							            <label>Mob: &nbsp;</label><span>{{form.cncode}}&nbsp;{{form.phnno}}</span>
							            <br>
							            <label>Preferred Location: &nbsp;</label><span>{{form.preffloc}}</span>
							        	<br>
							        	<label>Highest Qualification: &nbsp;</label><span>{{form.highquad}}</span>
							            <br>
							            <label>Specification: &nbsp;</label><span>{{form.spec}}</span>
							            <br>
							            <div ng-if="form.expyrs"><label>Experience: &nbsp;</label><span>{{form.expyrs}}</span>
							            <br>
							            <label>Annual Salary: &nbsp;</label><span>{{form.annualsalary}}</span>
							            <br>
							            <label>Notice Period: &nbsp;</label><span>{{form.noticeperiod}}</span>
							            <br>
							            </div>
							        </div>   
<!-- <pre>
{{json || form}}
</pre>
 -->
<!-- <input type="button" ng-click="save()"> -->
							    </div>















	    <div class="tab-pane" id="tab1">
	     

	     

							  <h2>add your details</h2>
							  <div class="row">

							    <div class="col-sm-7">
							      

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

							                  <input type="text" class="form-control " name="fname" placeholder="First Name" ng-model="form.fname">
							                  <span id="span_name"></span>
							                </div>
							                <div class="form-group col-sm-4" id="name-group">

							                  <input type="text" class="form-control " name="mname"  placeholder="Middle Name" ng-model="form.mname">
							                  <!-- <span id="span_mname"></span> -->
							                </div>
							                <div class="form-group col-sm-4" id="name-group">

							                  <input type="text" class="form-control " name="lname"  placeholder="Last Name" ng-model="form.lname">
							                  <span id="span_lname"></span>
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label for="resume-name">Email*</label>
							              <div class="form-group" id="email-group">

							                <input type="email" class="form-control" name="username"  placeholder="e.g.  abc@xyz.com" ng-model="form.email" disabled>
							                <span id="span_username"></span>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label for="resume-name">Phone No.*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-2" id="phoneno-group">

							                  <select class="form-control" name="countrycode" placeholder="" ng-model="form.cncode" style="padding:2px 2px 2px 2px;">
							                  	 <option value="+91" selected="">+91</option>
							                  
							                  <?php
							                  	$sql="select * from ".TBL_COUNTRYCODE." where 1 ";

							                  	$result= $this->db->query($sql,__FILE__,__LINE__);

												while($row= $this->db->fetch_array($result)){

													?>
													<option value="<?php echo $row['phonecode'];?>"><?php echo $row['phonecode'];?></option>
													<?php
												}

												?>
							                  </select>
							                </div>
							                <div class="form-group col-sm-10" id="phoneno-group">

							                  <input type="text" class="form-control" name="phoneno"  placeholder="9999999999" ng-model="form.phnno">
							                  <span id="span_phoneno"></span>
							                </div>
							              </div>

							            </div>
							            <div class="col-sm-12">
							              <label for="resume-name">Alternate Phone No.</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-2" id="phoneno-group">

							                  
							                  <select class="form-control" name="altrnatecountrycode" placeholder="" ng-model="form.altcncode" style="padding:2px 2px 2px 2px;">
							                  	
							                  	 <option value="+91" selected="">+91</option>
							                  
							                  <?php
							                  	$sql="select * from ".TBL_COUNTRYCODE." where 1 ";

							                  	$result= $this->db->query($sql,__FILE__,__LINE__);

												while($row= $this->db->fetch_array($result)){

													?>
													<option value="<?php echo $row['phonecode'];?>"><?php echo $row['phonecode'];?></option>
													<?php
												}

												?>
							                  </select>

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
							                  <input type="text" class="form-control" name="street"  placeholder="Street" ng-model="form.street">
							                 
							                </div>
							                <div class="form-group col-sm-12" id="address-group">
							                  <input type="text" class="form-control" name="resicity"  placeholder="City" ng-model="form.city">
							                  
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
							                  
							                </div>
							                <div class="form-group col-sm-6" id="address-group">
							                  <input type="text" class="form-control" name="zip"  placeholder="ZIP Code" ng-model="form.zip">
							                  
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label>DOB*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-4" id="age-group">
							                  <select name="month"  class="form-control" placeholder="January" ng-model="form.dobmonth">
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
							                  <input type="text"  class="form-control" name="day" placeholder="Date" ng-model="form.dobdate">
							                  <span id="span_day"></span>
							                </div>
							                <div class="form-group col-sm-4" id="age-group">
							                  <input type="text"  class="form-control" name="year" placeholder="Year" ng-model="form.dobyear">
							                  <span id="span_year"></span>
							                </div>
							              </div>
							            </div>

							            <div class="col-sm-12">
							              <label class="">Gender*</label>
							              <br>
							              <div class="row">
							                <div class="form-group col-sm-6" id="gender-group">
							                  <input type="radio" name="gender" value="male" ng-model="form.gender">&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
							                  <input type="radio" name="gender" value="female" ng-model="form.gender" >&nbsp;Female
							                  <br>
							                 
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
										
											<input type="file" name="myphoto"  id="file" fileread="form.pic" />
											
											<!-- <input type="text" id="outerr"> -->
									
											
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
							                </select><span id="span_marital"></span><br>

							              </div>
							            </div>

							            <div class="col-sm-7">

							              <label >Physically Challenged</label>&nbsp;&nbsp;&nbsp;
							               <toggle-switch class="switch-info switch-small" on-label="Yes" off-label="No" ng-model="form.disability" style="float:right;" ></toggle-switch>
							              <!-- <input type="radio" name="disability" id="disability" value="1" ng-model="form.disability">Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
							              <!-- <input type="radio" name="disability" id="disability" value="0" ng-model="form.disability">No -->
							              </div>
							              <div ng-if="form.disability==true" class="col-sm-12">
							              	<br><input type="text" class="form-control" name="disabilitytype" ng-model="form.disabilitytype" placeholder="Type of Disability" >
							              </div>

							            


							            <div class="col-sm-7">
							              
							              <br><label>Passport</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							               <toggle-switch class="switch-info switch-small" on-label="Yes" off-label="No" ng-model="form.passport" style="float:right;"></toggle-switch>

							              <!-- <input type="radio"  name="chkPassPort" value="1" ng-model="form.passport">Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
							              <!-- <input type="radio"  name="chkPassPort" value="0" ng-model="form.passport">No -->
							              </div>
							            <div ng-if="form.passport==true" class="col-sm-12">
							              	<br><input type="text" class="form-control" ng-model="form.passportno" name="passportnum" placeholder="Passport Number">
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

							                <select style="width:;" name="jobtype"  class="form-control error" ng-model="form.jobtype">
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
							                 
							              	  


							                 
							                </select> 
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
							                
							              </div>
							            </div>




							            <div class="col-sm-7">
							              <div class="form-group">
							                <label for="resume-name">Ready to Relocate</label>
							                 <toggle-switch class="switch-info switch-small" on-label="Yes" off-label="No" ng-model="form.relocate" style="float:right;" ></toggle-switch>
							                <!-- <input type="radio" name="relocation" value="1" ng-model="form.relocate">Yes&nbsp;&nbsp;&nbsp;&nbsp; -->
							                <!-- <input type="radio" name="relocation" value="0" ng-model="form.relocate">No&nbsp;&nbsp;&nbsp;&nbsp; -->
							              </div>
							            </div>


							            <div class="col-sm-12">
							              <label for="photo">Upload your Resume</label>
							              <div class="form-group" id="photo-group">

							                <input type="file" name="resume" id="txtfile">
							                <p class="help-block">Optionally upload your resume for employers to view. Max. file size: 2 MB</p>

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
							     

							      <!-- Resume Details Start -->

							       <div class="row">
							      <div class="form-group col-sm-11">
							        <label>Highest Qualification*</label>
							        <select name="highestqualification" class="form-control" ng-model="form.highquad">
							          <option value="">Select your highest qualification</option>
							          <option value="Doctorate/Phd">Doctorate/Phd</option>
							          <option value="Masters">Postgraduate</option>
							          <option value="Graduate">Graduate</option>

							        </select>


							      </div>


							      
							        <div class="form-group col-sm-11">
							          <label>Course*</label>
							          <input type="text" class="form-control" name="course" placeholder="Enter Course" ng-model="form.course">
							          <span id="span_course"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>Specialization*</label>
							          <input type="text" class="form-control" name="specialization" placeholder="Enter Specialization" ng-model="form.spec">
							          <span id="span_specialization"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>University/College*</label>
							          <input type="text" class="form-control" name="university" placeholder="Institute Name" ng-model="form.college">
							          <span id="span_university"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>City*</label>
							          <input type="text" class="form-control" name="city" placeholder="City Name" ng-model="form.clgcity">
							          <span id="span_city"></span>

							        </div>
							        <div class="form-group col-sm-11">

							          <div class="form-group" id="education-dates-group">
							            <label for="education-dates">Year of Passing*</label>
							            <br>
							            <select name="year_passing" class="form-control" ng-model="form.pasinyr">
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






							      <div class="row" ng-repeat="x in form.extraedd">

							      	<div class="row">
							        <div class="col-sm-11">
							          <hr class="dashed">
							        </div>
							      </div>
							      <div class="form-group col-sm-11">
							        <label>Qualification</label>
							        <select name="highestqualification" class="form-control" id="highestqualification" ng-model="x.quad">
							          <option value="">Select your highest qualification</option>
							          <option value="Doctorate/Phd">Doctorate/Phd</option>
							          <option value="Masters">Postgraduate</option>
							          <option value="Graduate">Graduate</option>

							        </select><span id="span_highestqualification"></span>


							      </div>


							      
							        <div class="form-group col-sm-11">
							          <label>Course</label>
							          <input type="text" class="form-control" name="course" placeholder="Enter Course" ng-model="x.course">
							          <span id="span_course"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>Specialization</label>
							          <input type="text" class="form-control" name="specialization" placeholder="Enter Specialization" ng-model="x.spec">
							          <span id="span_specialization"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>University/College</label>
							          <input type="text" class="form-control" name="university" placeholder="Institute Name" ng-model="x.college">
							          <span id="span_university"></span>

							        </div>

							        <div class="form-group col-sm-11">
							          <label>City</label>
							          <input type="text" class="form-control" name="city" placeholder="City Name" ng-model="x.clgcity">
							          <span id="span_city"></span>

							        </div>
							        <div class="form-group col-sm-11">

							          <div class="form-group" id="education-dates-group">
							            <label for="education-dates">Year of Passing</label>
							            <br>
							            <select name="year_passing" class="form-control" ng-model="x.pasinyr">
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

							            </select>


							          </div>

							        </div>
							      </div>


							      <div class="row">
							        <div class="col-sm-11">
							          <p><a ng-click="addedu()">+ Add Education</a></p>

							        </div>
							      </div>





							      <div class="row">
							        <div class="col-sm-11">
							          <hr class="dashed">
							        </div>
							      </div>
							      <h3>professtional certifications </h3>

							      <div class="form-group col-sm-11" >


								        <div class="row" ng-repeat="x in form.certs">
							          <div class="col-sm-6">

							            <input type="text" class="form-control" name="certificate" id="certificate" placeholder="Certification Name eg. CCNA" ng-model="x.cername">
							            
							          </div>
							        
							        
							          <div class="col-sm-6" >

							            <input type="text" class="form-control" name="certificatenum" id="certificate" placeholder="Certificate No." ng-model="x.cerno">

							          </div>
							        </div>
							        <!-- <p class="help-block" >Certification should be certified </p> -->

							      </div>
							      
							      
							        <div class="col-sm-11">
							          <p><a ng-click="addCert()">+ Add certificate</a></p>

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

							          <select name="exyear"  class="form-control error" ng-model="form.expyrs">
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

							          <input type="text" class="form-control" name="compname" placeholder="Company Name" ng-model="form.compname"><span id="span_compname"></span>
							          <br>
							          <input type="text" class="form-control" name="jobtitle" placeholder="Job Title" ng-model="form.jobtitle"><span id="span_jobtitle"></span>
							          <br>
							          
							          <div class="row">
							          	<div class="form-group col-sm-4" style="padding-top: 6px;">
							                  <label>Working Since</label>
							                 
							                </div>
							                <div class="form-group col-sm-4" >
							                  <select name="workinmonth" class="form-control" placeholder="January" ng-model="form.workinmonth">
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
							                  
							                </div>
							               
							                <div class="form-group col-sm-4">
							                 
							                 <select name="year_passing" class="form-control" name="workinyear" ng-model="form.workinyear">
								              <option value="">Year</option>
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
								             

							            </select>
							                </div>
							                 
							              </div>



							        </div>

							        


							      </div>



							      <div class="col-sm-11">

							        <label for="resume-name">Current/Last Annual Package*</label>
							        <div class="form-group">

							          <select name="anumsal" class="form-control error" ng-model="form.annualsalary">

							             <option value="Select">Select</option>
					            <option value="<1 Lac">
					              <1 Lac</option>
					                <option value="1 Lacs">1 Lacs</option>
					                <option value="2 Lacs">2 Lacs</option>
					                <option value="3 Lacs">3 Lacs</option>
					                <option value="4 Lacs">4 Lacs</option>
					                <option value="5 Lacs">5 Lacs</option>
					                <option value="6 Lacs">6 Lacs</option>
					                <option value="7 Lacs">7 Lacs</option>
					                <option value="8 Lacs">8 Lacs</option>
					                <option value="9 Lacs">9 Lacs</option>
					                <option value="10 Lacs">10 Lacs</option>
					                <option value="11 Lacs">11 Lacs</option>
					                <option value="12 Lacs">12 Lacs</option>
					                <option value="13 Lacs">13 Lacs</option>
					                <option value="14 Lacs">14 Lacs</option>
					                <option value="15 Lacs">15 Lacs</option>
					                <option value="16 Lacs">16 Lacs</option>
					                <option value="17 Lacs">17 Lacs</option>
					                <option value="18 Lacs">18 Lacs</option>
					                <option value="19 Lacs">19 Lacs</option>
					                <option value="20 Lacs">20 Lacs</option>
					                <option value="21 Lacs">21 Lacs</option>
					                <option value="22 Lacs">22 Lacs</option>
					                <option value="23 Lacs">23 Lacs</option>
					                <option value="24 Lacs">24 Lacs</option>
					                <option value="25 Lacs">25 Lacs</option>
					                <option value="26 Lacs">26 Lacs</option>
					                <option value="27 Lacs">27 Lacs</option>
					                <option value="28 Lacs">28 Lacs</option>
					                <option value="29 Lacs">29 Lacs</option>
					                <option value="30 Lacs">30 Lacs</option>
					                <option value="30+ Lacs">30+ Lacs</option>


							          </select>
							          
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
							            
							          </div>
							        </div>
							        <div class="col-sm-6" style="padding: 24px 0px 10px 40px;">

							          <label style="width:118px;">Is Buy-Back Option Available</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							          <!-- <input type="checkbox" name="buyback" data-size='small' data-on-text="Yes" data-off-text="No" data-on-color="info" ng-value="yes" ng-model="form.buyback">
							           -->
							           <toggle-switch class="switch-info switch-small" on-label="Yes" off-label="No" ng-model="form.buyback" style="position: absolute;"></toggle-switch>


							        </div>
							      </div>
							      <div class="col-sm-11">
							      <div class="form-group" ng-repeat="x in form.extraexp">
							      	<div class="row">
							        <div class="col-sm-12">
							          <hr class="dashed">
							        </div>
							      </div>

							          <input type="text" class="form-control" name="compname" placeholder="Company Name" ng-model="x.compname"><span id="span_compname"></span>
							          <br>
							          <input type="text" class="form-control" name="jobtitle" placeholder="Job Title" ng-model="x.jobtitle"><span id="span_jobtitle"></span>
							          <br>
							          
							          <div class="row">
							          	<div class="form-group col-sm-4" id="age-group"  style="padding-top: 6px;">
							                  <label>Working Since</label>
							                  <span id="span_day"></span>
							                </div>
							                <div class="form-group col-sm-4" id="age-group">
							                  <select name="workinmonth" class="form-control" placeholder="January" ng-model="x.workinmonth">
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
							                  
							                  <select name="year_passing" class="form-control" name="workinyear" ng-model="x.workinyear">
								              <option value="">Year</option>
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
								             

							            </select>
							                </div>
							              </div>



							        </div>
							         </div>
							       


							      <div class="row">
							        <div class="col-sm-11">
							          <p><a ng-click="addexp()">+ Add More Experience</a></p>

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
							      

							      <div class="col-sm-11">
							        <label for="resume-name">Languages Known*</label>
							        <div class="form-group" >
							        <selectize config='myConfig1' options='myOptions1' ng-model="form.langs" name="langs" required></selectize>
							        <span ng-if="myform.$submitted && myform.langs.$invalid" style="color:black;">This field is required.</span>

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
	                <option value="1 Lacs">1 Lacs</option>
	                <option value="2 Lacs">2 Lacs</option>
	                <option value="3 Lacs">3 Lacs</option>
	                <option value="4 Lacs">4 Lacs</option>
	                <option value="5 Lacs">5 Lacs</option>
	                <option value="6 Lacs">6 Lacs</option>
	                <option value="7 Lacs">7 Lacs</option>
	                <option value="8 Lacs">8 Lacs</option>
	                <option value="9 Lacs">9 Lacs</option>
	                <option value="10 Lacs">10 Lacs</option>
	                <option value="11 Lacs">11 Lacs</option>
	                <option value="12 Lacs">12 Lacs</option>
	                <option value="13 Lacs">13 Lacs</option>
	                <option value="14 Lacs">14 Lacs</option>
	                <option value="15 Lacs">15 Lacs</option>
	                <option value="16 Lacs">16 Lacs</option>
	                <option value="17 Lacs">17 Lacs</option>
	                <option value="18 Lacs">18 Lacs</option>
	                <option value="19 Lacs">19 Lacs</option>
	                <option value="20 Lacs">20 Lacs</option>
	                <option value="21 Lacs">21 Lacs</option>
	                <option value="22 Lacs">22 Lacs</option>
	                <option value="23 Lacs">23 Lacs</option>
	                <option value="24 Lacs">24 Lacs</option>
	                <option value="25 Lacs">25 Lacs</option>
	                <option value="26 Lacs">26 Lacs</option>
	                <option value="27 Lacs">27 Lacs</option>
	                <option value="28 Lacs">28 Lacs</option>
	                <option value="29 Lacs">29 Lacs</option>
	                <option value="30 Lacs">30 Lacs</option>
	                <option value="31 Lacs">31 Lacs</option>
	                <option value="32 Lacs">32 Lacs</option>
	                <option value="33 Lacs">33 Lacs</option>
	                <option value="34 Lacs">34 Lacs</option>
	                <option value="35 Lacs">35 Lacs</option>
	                <option value="36 Lacs">36 Lacs</option>
	                <option value="37 Lacs">37 Lacs</option>
	                <option value="38 Lacs">38 Lacs</option>
	                <option value="39 Lacs">39 Lacs</option>
	                <option value="40 Lacs">40 Lacs</option>
	                <option value="41 Lacs">41 Lacs</option>
	                <option value="42 Lacs">42 Lacs</option>
	                <option value="43 Lacs">43 Lacs</option>
	                <option value="44 Lacs">44 Lacs</option>
	                <option value="45 Lacs">45 Lacs</option>
	                <option value="46 Lacs">46 Lacs</option>
	                <option value="47 Lacs">47 Lacs</option>
	                <option value="48 Lacs">48 Lacs</option>
	                <option value="49 Lacs">49 Lacs</option>
	                <option value="50 Lacs">50 Lacs</option>
	                <option value="50+ Lacs">50+ Lacs</option>



							          </select>
							        </div>
							      </div>






							      <div class="col-sm-11" style="float:none;">
							        <label for="resume-name">Any other relevant details</label>
							        <div class="form-group">
							          <input type="text" class="form-control" name="anyother" ng-model="form.anyother">

							        </div>
							      </div>

							      <div class="col-sm-11" >
							      	<div class="row col-sm-7"><label>Key Skills</label></div>
							      	<div class="col-sm-5 text-center"><label>Rate Yourself</label></div>
							       
							        <div class="row" ng-repeat="x in form.skills">
							        <div class="form-group col-sm-7" >

							         <selectize config='myConfig' options='myOptions' ng-model="x.keyskill"></selectize>
							         
							        </div>
							         <div class="row form-group col-sm-5" >
							         	
							         	<input-stars max="5"  ng-attr-icon-full="{{ enableReadonly ? 'fa-cog' : 'fa-star fa-lg' }}" ng-model="x.rating"></input-stars>
							      
							       </div>
							        </div>
							      </div>

							      <div class="row">
							          <div class="col-sm-11">
							            <!-- <p><a id="add-more-skills">+ Add More skills</a></p> -->
							            <p><a  ng-click="addskill()">+ Add More skills</a></p>

							          </div>
							        </div>

							     
							    </div>
							   
							  </div>

	    </div>
		
		<ul class="pager wizard" style="margin-top:80px;">
			<li class="previous first btn btn-lg" style="display:none;"><a href="#">First</a></li>
			<li class="previous btn"><a href="#">Previous</a></li>
			<!-- <li class="next last btn" style="display:none;"><a href="#">Last</a></li> -->
		  	<li class="next btn"><a href="#">Next</a></li>
		  	<button type="submit" class="finish btn btan" name="submit" value="submit" style="display:none;">Submit</button> 
		</ul>
		
	</div>

		
	
</div>
</form>

</div>



<?php
					break;
				
				case 'server':
					extract($_POST);
					print_r($_REQUEST);			




		//tab1........
					// $this->fname = $fname;
					// $this->mname = $mname;
					// $this->lname = $lname;
					// $this->username = $username;
					// $this->countrycode = $countrycode;
					// $this->phoneno = $phoneno;
					// $this->altrnatecountrycode = $altrnatecountrycode;
					// $this->altphoneno = $altphoneno;
					// $this->street = $street;
					// $this->city = $city;
					// $this->state = $state;
					// $this->zip = $zip;
					// $this->month = $month;
					// $this->day = $day;
					// $this->year = $year;
					// $this->gender = $gender;
					// $this->maritalStatus = $maritalStatus;
					// $this->facebook = $facebook;
					// $this->linkedin = $linkedin;
					// $this->disability = $disability;
					// $this->chkPassPort = $chkPassPort;
					// $this->jobtype = $jobtype;
					// $this->relocation = $relocation;
					// $this->currentlocation = $currentlocation;
					// $this->preferloc = $preferloc;



					// 		$insert_sql_array = array();
					// 		$insert_sql_array['name'] = $this->fname.' '.$this->mname.' '.$this->lname;
					// 		$insert_sql_array['email'] = $this->username;
					// 		$insert_sql_array['phoneno'] = $this->countrycode.' '.$this->phoneno;
					// 		$insert_sql_array['altphoneno'] =$this->altrnatecountrycode.' '.$this->altphoneno;
					// 		$insert_sql_array['age'] = $this->day.'-'.$this->month.'-'.$this->year;
					// 		$insert_sql_array['address'] = $this->street.','.$this->city.','.$this->state;
					// 		$insert_sql_array['zip'] = $this->zip;
					// 		$insert_sql_array['gender'] = $this->gender;
					// 		$insert_sql_array['martial_status'] = $this->maritalStatus;
					// 		$insert_sql_array['facebook_id'] = $this->facebook;
					// 		$insert_sql_array['linkedin_id'] = $this->linkedin;
					// 		$insert_sql_array['Physically_challenged'] = $this->disability;
					// 		$insert_sql_array['jobtype'] = $this->jobtype;
					// 		$insert_sql_array['Passport'] = $this->chkPassPort;
					// 		$insert_sql_array['relocation'] = $this->relocation;
					// 		$insert_sql_array['prefered_loc'] = $this->preferloc;
					// 		$insert_sql_array['current_loc'] = $this->currentlocation;

					// 		$insert_sql_array['user_id']=$_SESSION['user_id'];
					// 		$this->db->insert(tbl_employee_del,$insert_sql_array);


					// 		$id=$this->db->last_insert_id();
					// 		$_SESSION['employee_id']=$id;

					// 		$insert_sql_array = array();
					// 		$insert_sql_array['employee_id']=$_SESSION['employee_id'];
					// 		$this->db->update(TBL_USER,$insert_sql_array,user_id,$_SESSION['user_id']);



		//tab2................
		
					// for ($i=0; $i <count($course) ; $i++) { 

					// 			for ($a=$i; $a <=$i ; $a++) { 
					// 				$this->coursename=$course[$a];
					// 			}
					// 			for ($b=$i; $b <=$i ; $b++) { 
					// 				$this->cityname=$city[$b];
					// 			}
					// 			for ($c=$i; $c <=$i ; $c++) { 
					// 				$this->universityname=$university[$c];
					// 			}
					// 			for ($d=$i; $d <=$i ; $d++) { 
					// 				$this->specializationname=$specialization[$d];
					// 			}
					// 			for ($e=$i; $e <=$i ; $e++) { 
					// 				$this->qualificationname=$highestqualification[$e];
					// 			}
					// 			for ($f=$i; $f <=$i ; $f++) { 
					// 				$this->passingyear=$year_passing[$f];
					// 			}

								
					// 				$insert_sql_array = array();
					// 				$insert_sql_array['course_name'] = $this->coursename;
					// 				$insert_sql_array['city_name'] = $this->cityname;
					// 				$insert_sql_array['university_name'] = $this->universityname;
					// 				$insert_sql_array['specialization'] = $this->specializationname;
					// 				$insert_sql_array['passing_year'] = $this->passingyear;
					// 				$insert_sql_array['qualification_type'] = $this->qualificationname;

					// 				$insert_sql_array['user_id'] = $_SESSION['user_id'];
					// 				$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					// 				$this->db->insert(tbl_employee_edd,$insert_sql_array);
							

					// 		}


					// 		for ($i=0; $i <count($certificate) ; $i++) { 
								
					// 			for ($a=$i; $a <=$i ; $a++) { 
					// 				$this->certificatename=$certificate[$a];
					// 			}
					// 			for ($b=$i; $b <=$i ; $b++) { 
					// 				$this->certificatenumber=$certificatenum[$b];
					// 			}

					// 			$insert_sql_array = array();
					// 			$insert_sql_array['certificate_name'] = $this->certificatename;
					// 			$insert_sql_array['certificate_number'] = $this->certificatenumber;

					// 			$insert_sql_array['user_id'] = $_SESSION['user_id'];
					// 			$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					// 			$this->db->insert(tbl_employee_certification,$insert_sql_array);
							
					// 		}








		//tab3................
		
					// $this->exyear = $exyear;
					// $this->worknum = $worknum;
					// $this->anumsal = $anumsal;
					// $this->buyback = $buyback;
					// $this->noticeperiod = $noticeperiod;

					// if ($this->buyback !=="yes") {
					// 			$this->buyback="no";
					// 			//print_r($buyback);
					// 			//return;
					// 		}



					// $insert_sql_array = array();
					// $insert_sql_array['experience_yrs'] = $this->exyear;
					// $insert_sql_array['company_worked'] = $this->worknum;
					// $insert_sql_array['current_salary'] = $this->anumsal;
					// $insert_sql_array['buyback'] = $this->buyback;
					// $insert_sql_array['notice_period'] = $this->noticeperiod;


					// $insert_sql_array['user_id'] = $_SESSION['user_id'];
					// $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					// $this->db->insert(tbl_employee_exp,$insert_sql_array);		




					// for ($i=0; $i <count($compname) ; $i++) { 
							
					// 			for ($a=$i; $a <=$i ; $a++) { 
					// 				$this->companyname=$compname[$a];
					// 			}
					// 			for ($b=$i; $b <=$i ; $b++) { 
					// 				$this->titlejob=$jobtitle[$b];
					// 			}
					// 			for ($c=$i; $c <=$i ; $c++) { 
					// 				$this->workmnth=$workinmonth[$c];
					// 			}
					// 			for ($d=$i; $d <=$i ; $d++) { 
					// 				$this->workday=$workinday[$d];
					// 			}
					// 			for ($e=$i; $e <=$i ; $e++) { 
					// 				$this->workyear=$workinyear[$e];
					// 			}


					// 			$insert_sql_array = array();
					// 			$insert_sql_array['company_name'] = $this->companyname;
					// 			$insert_sql_array['job_title'] = $this->titlejob;
					// 			$insert_sql_array['working_time'] = $this->workday.'-'.$this->workmnth.'-'.$this->workyear;

					// 			$insert_sql_array['user_id'] = $_SESSION['user_id'];
					// 			$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					// 			$this->db->insert(tbl_employee_workex,$insert_sql_array);


					// 		}



						
							
			

		//tab4.............


					// $this->langknown = $langknown;
					// $this->anyother = $anyother;
					// $this->expectedsalary = $expectedsalary;

					








































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