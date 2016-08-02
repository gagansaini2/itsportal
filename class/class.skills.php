<?php
class skills{

	 var $db;
	 var $validity;
	
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->auth=new Authentication();
		
		$this->Form = new ValidateForm();

		
		}
	

		function skillfun1($runat){
			switch($runat){
			case 'local' :
					extract($_POST);

					?>
					<div class="jumbotron">
						<form method="POST">
						<button type="submit" name="sub" value="reg" >submit</button>
						</form>
					</div>


					<?php
					break;
			case 'server' :
					extract($_POST);

					$alpha = range("a","z");
					//echo($alpha);
					//echo(count($alpha));
					// $beeta = array();
					// $gama = array();

					for ($i=0; $i <count($alpha) ; $i++) { 
						//echo($alpha[$i]);
						// echo $alpha[$i];

						for ($j=0; $j <count($alpha) ; $j++) { 
							
							//echo "".$alpha[$i]."".$alpha[$j]."<br>";

							for ($s=0; $s <count($alpha) ; $s++) { 
								$number= $alpha[$i]."".$alpha[$j]."".$alpha[$s];
								//echo $number." <br>";

								//$beeta[]=$number;
								$insert_sql_array = array();
								$insert_sql_array['key_val'] = $number;
								$this->db->insert(tbl_skills,$insert_sql_array);


							}
						}
						//$beeta[$i]=$number;
					}

					
					break;
			}

		}


		function getskills(){
			// print_r("expression");

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;



				$sql="select * from ".TBL_SKILLS." where 1  ";
				$result= $this->db->query($sql,__FILE__,__LINE__);


				$data=array();
				$lang=array();
				while ( $row= $this->db->fetch_array($result)) {
					
				$lang['skills']=$row['key_val'];

				$data[]=$lang;
				
				}
				//print_r($data);

				$resp['data']=$data;

				echo json_encode($resp);

		}



		function getlang(){
			// print_r("expression");

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;



				$sql="select * from ".TBL_LANGUAGES." where 1  ";
				$result= $this->db->query($sql,__FILE__,__LINE__);


				$data=array();
				$lang=array();
				while ( $row= $this->db->fetch_array($result)) {
					
				$lang['lang']=$row['Language'];

				$data[]=$lang;
				
				}
				//print_r($data);

				$resp['data']=$data;

				echo json_encode($resp);

		}


		function saveinfo(){

			$resp=array();
			$resp['status']=false;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

 			
			 $result=mysql_query("SELECT count(*) as total from TBL_EMPINFO where user_id='".$_SESSION['user_id']."'");
			$sql=mysql_fetch_assoc($result);
		
			if ($sql['total'] > 0 ) {
				

				$insert_sql_array=array();
			$insert_sql_array['user_id'] = $_SESSION['user_id'];
			
			$insert_sql_array['info'] = $_REQUEST[name];	

			$this->db->update(TBL_EMPINFO,$insert_sql_array,user_id,$_SESSION['user_id']);


			}else{
			print_r($_REQUEST);

			$insert_sql_array=array();
			$insert_sql_array['user_id'] = $_SESSION['user_id'];
			
			$insert_sql_array['info'] = $_REQUEST[name];	

			$this->db->insert(TBL_EMPINFO,$insert_sql_array);


			}

			$resp['status']=true;
			$resp['data']=$_REQUEST[name];
			echo json_encode($resp);

		}




		function addskills(){

			$resp=array();
			$resp['status']=false;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;


			$insert_sql_array=array();
			$insert_sql_array['key_val']=$_REQUEST[skills];
			$this->db->insert(TBL_SKILLS,$insert_sql_array);

			$resp['status']=true;
			$resp['data']=$_REQUEST[skills];
			echo json_encode($resp);



		}


		function getinfo(){



				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;



				$sql="select * from ".TBL_EMPINFO." where user_id='".$_SESSION['user_id']."' ";
				$result= $this->db->query($sql,__FILE__,__LINE__);


				$data=array();
				
				$row= $this->db->fetch_array($result);
					
				$data['backinfo']=$row['info'];
				// print_r($data['backinfo']);
				
				if ($data['backinfo']==null) {
					echo $data['backinfo']="";
				}
				
				//print_r($data);

				$resp['data']=$data;

				echo json_encode($resp);

		}




		function submitprof(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;


// print_r($_REQUEST);
							
                 //certificate retrive........
							$cer1=$_REQUEST['object'];
							$allinfo=json_decode($cer1, true);
							 // print_r($allinfo);



							$certificates=$allinfo['certs'];
				//all arrays are retrive...........			
							$education=$allinfo['extraedd'];
							$experience=$allinfo['extraexp'];
							$skills=$allinfo['skills'];
							$languages=json_encode($allinfo['langs']);


				//.........

		


		//tab1........
				


					$insert_sql_array = array();
							$insert_sql_array['name'] =$allinfo['fname'].' '.$allinfo['mname'].' '.$allinfo['lname'];
							$insert_sql_array['email'] =$allinfo['email'];
							$insert_sql_array['phoneno'] = $allinfo['cncode'].' '.$allinfo['phnno'];
							$insert_sql_array['altphoneno'] =$allinfo['altcncode'].' '.$allinfo['altphno'];
							$insert_sql_array['age'] = $allinfo['dobdate'].'-'.$allinfo['dobmonth'].'-'.$allinfo['dobyear'];
							$insert_sql_array['address'] = $allinfo['street'].','.$allinfo['city'].','.$allinfo['state'];
							$insert_sql_array['zip'] = $allinfo['zip'];
							$insert_sql_array['gender'] = $allinfo['gender'];
							$insert_sql_array['martial_status'] = $allinfo['mrital'];
							$insert_sql_array['facebook_id'] = $allinfo['facebook'];
							$insert_sql_array['linkedin_id'] = $allinfo['linkedin'];
							$insert_sql_array['Physically_challenged'] = $allinfo['disability'];
							$insert_sql_array['jobtype'] = $allinfo['jobtype'];
							$insert_sql_array['Passport'] = $allinfo['passport'];
							$insert_sql_array['relocation'] = $allinfo['relocate'];
							$insert_sql_array['prefered_loc'] = $allinfo['preffloc'];
							$insert_sql_array['current_loc'] = $allinfo['curentloc'];
							$insert_sql_array['disability_type'] = $allinfo['disabilitytype'];
							$insert_sql_array['passport_no'] = $allinfo['passportno'];


							$insert_sql_array['user_id']=$_SESSION['user_id'];
							$this->db->insert(tbl_employee_del,$insert_sql_array);


							$id=$this->db->last_insert_id();
							$_SESSION['employee_id']=$id;

							$insert_sql_array = array();
							$insert_sql_array['employee_id']=$_SESSION['employee_id'];
							$this->db->update(TBL_USER,$insert_sql_array,user_id,$_SESSION['user_id']);


				//tab2.........

						$insert_sql_array = array();
									$insert_sql_array['course_name'] = $allinfo['course'];
									$insert_sql_array['city_name'] = $allinfo['clgcity'];
									$insert_sql_array['university_name'] = $allinfo['college'];
									$insert_sql_array['specialization'] = $allinfo['spec'];
									$insert_sql_array['passing_year'] = $allinfo['pasinyr'];
									$insert_sql_array['qualification_type'] = $allinfo['highquad'];

									$insert_sql_array['user_id'] = $_SESSION['user_id'];
									$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
									$this->db->insert(tbl_employee_edd,$insert_sql_array);
							
						if (count($education) > 0) {
									
											

							for ($i=0; $i <count($education) ; $i++) { 

									$finaledd=$education[$i];
									$this->coursename=$finaledd['course'];
									$this->cityname=$finaledd['clgcity'];
								    $this->universityname=$finaledd['college'];
								    $this->specializationname=$finaledd['spec'];
								    $this->passingyear=$finaledd['pasinyr'];
								    $this->qualificationname=$finaledd['quad'];
									 

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
						}		

						if (count($certificates) > 1) {
							
						
							for ($i=0; $i <count($certificates) ; $i++) { 
								

								$final=$certificates[$i];
								$this->certificatename=$final['cername'];
								$this->certificatenumber=$final['cerno'];

								$insert_sql_array = array();
								$insert_sql_array['certificate_name'] = $this->certificatename;
								$insert_sql_array['certificate_number'] = $this->certificatenumber;

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(tbl_employee_certification,$insert_sql_array);
							
							}
						}

	//tab3...........................



							$insert_sql_array = array();
							$insert_sql_array['experience_yrs'] = $allinfo['expyrs'];
							$insert_sql_array['company_worked'] = $allinfo['worknum'];
							$insert_sql_array['current_salary'] = $allinfo['annualsalary'];
							$insert_sql_array['buyback'] = $allinfo['buyback'];
							$insert_sql_array['notice_period'] = $allinfo['noticeperiod'];



							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(tbl_employee_exp,$insert_sql_array);



							///workex........



							$insert_sql_array = array();
							$insert_sql_array['company_name'] = $allinfo['compname'];
							$insert_sql_array['job_title'] = $allinfo['jobtitle'];
							$insert_sql_array['working_time'] = $allinfo['workinday'].'-'.$allinfo['workinmonth'].'-'.$allinfo['workinyear'];
							


							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(TBL_EMPLOYEE_WORKEX,$insert_sql_array);

						if (count($experience) > 0) {
								
							
							 for ($i=0; $i <count($experience) ; $i++) { 
								

								$finalexperience=$experience[$i];
								$this->companyname=$finalexperience['compname'];
								$this->jobtitle=$finalexperience['jobtitle'];
								$this->workinmonth=$finalexperience['workinmonth'];
								$this->workinday=$finalexperience['workinday'];
								$this->workinyear=$finalexperience['workinyear'];
								

								$insert_sql_array = array();
								$insert_sql_array['company_name'] = $this->companyname;
								$insert_sql_array['job_title'] = $this->jobtitle;
								$insert_sql_array['working_time'] = $this->workinday.'-'.$this->workinmonth.'-'.$this->workinyear;

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(TBL_EMPLOYEE_WORKEX,$insert_sql_array);
							
							}
						 }
	


				//tab4.....................



							$insert_sql_array = array();
							$insert_sql_array['expected_salary'] = $allinfo['compname'];
							$insert_sql_array['anyother_detail'] = $allinfo['jobtitle'];
							$insert_sql_array['languages_known'] = $languages;
							
							


							$insert_sql_array['user_id'] = $_SESSION['user_id'];
							$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
							$this->db->insert(TBL_OTHERS,$insert_sql_array);


							for ($i=0; $i <count($skills) ; $i++) { 
								

								$finalskills=$skills[$i];
								$this->skillname=$finalskills['keyskill'];
								$this->skillrating=$finalskills['rating'];

								$insert_sql_array = array();
								$insert_sql_array['keyskill_name'] = $this->skillname;
								$insert_sql_array['key_rating'] = $this->skillrating;

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(TBL_EMPLOYEE_KEYSKILS,$insert_sql_array);
							
							}


// image upload....
				// $image = sha1(uniqid());
				// $target_dir = "uploads/";
				
				
				// $imageFileType = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
				// $image1 = $image. "." .$imageFileType;
				// $target_file = $target_dir . $image. "." .$imageFileType;

				// $uploadOk = 1;

			
				// // print_r($target_file);
				// //Check if image file is a actual image or fake image
				// print_r($_FILES["photo"]["name"]);

				// if(isset($_POST["submit"])) {
				//     $check = getimagesize($_FILES["photo"]["tmp_name"]);
				//     //print_r($check);
				//     if($check !== false) {
				//         echo "File is an image - " . $check["mime"] . ".";
				//         $uploadOk = 1;


				//         if ($_FILES["photo"]["size"] > 5000000) {
				// 		    echo "Sorry, your file is too large.";
				// 		    $uploadOk = 0;
				// 		}
				// 		elseif (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
				// 		        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
				// 		        $insert_sql_array = array();
				// 	            $insert_sql_array['image_name'] = $image1;
				// 	            $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
				// 	            $insert_sql_array['user_id'] = $_SESSION['user_id'];
				// 	            $this->db->insert(TBL_IMAGE,$insert_sql_array);


				// 	    } else {
				// 	        echo "Sorry, there was an error uploading your file.";
				// 	    }

				//     } else {
				//         echo "File is not an image.";
				//         $uploadOk = 0;
				//     }
				// }

					// image upload endsssss.....
					$resp['data']=$_REQUEST['email'];
					echo json_encode($resp);
			
			}

		

}
?> 