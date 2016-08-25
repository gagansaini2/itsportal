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
			// print_r($_REQUEST);

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
				if($row['info']){
				$data['backinfo']=$row['info'];
					
				}	
				// print_r($data['backinfo']);
				
				// if ($data['backinfo']==null) {
				// 	echo $data['backinfo']="";
				// }
				
				//print_r($data);

				$resp['data']=$data;

				echo json_encode($resp);

		}


		function getcities(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

				$sql="select * from ".TBL_STATELIST." where 1  ";
				$result= $this->db->query($sql,__FILE__,__LINE__);


				$data=array();
				$city=array();
				while ( $row= $this->db->fetch_array($result)) {
					
				$city['city']=$row['city_name'];

				$data[]=$city;
				
				}

				// print_r($data);
				$resp['data']=$data;

				echo json_encode($resp);
		}




		function submitprof(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;



		//image retrive..........

				 $fileName = $_FILES['file']['name'];
				 $filetmp = $_FILES['file']['tmp_name'];
				 $filesize = $_FILES["file"]["size"];


		//txt documnt retrive..........
				 
				  $textname = $_FILES['txtfile']['name'];
				  $txtfiletmp = $_FILES['txtfile']['tmp_name'];
			
				  $txtfilesize = $_FILES["txtfile"]["size"];


							
                // all data retrive........

               		$allinfo1=json_decode($_REQUEST['profdata'], true);
					$allinfo=$allinfo1['profile'];


							
				//all arrays are retrive...........			
							$education=$allinfo['extraedd'];
							$experience=$allinfo['extraexp'];
							$skills=$allinfo['skills'];
							$languages=json_encode($allinfo['langs']);
							$certificates=$allinfo['certs'];

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


	// 			//tab2.........

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

	// //tab3...........................



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
	


	// 			//tab4.....................



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

							

				$image = sha1(uniqid());
				$target_dir = "uploads/";
				
				
				$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
				$image1 = $image. "." .$imageFileType;
				$target_file = $target_dir . $image. "." .$imageFileType;

				$uploadOk = 1;

			
				// print_r($target_file );
				//Check if image file is a actual image or fake image

				
				    $check = getimagesize($filetmp);
				     print_r($check);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;


				        if ($filesize > 5000000) {
						    echo "Sorry, your file is too large.";
						    $uploadOk = 0;
						}
						if (move_uploaded_file($filetmp, $target_file)) {
						        //echo "The file ". basename($fileName). " has been uploaded.";
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
				

					// image upload endsssss.....



				// text upload.........

				$text = sha1(uniqid());
				$target_dir1 = "uploads/";
				
				
				$txtFileType = pathinfo($textname,PATHINFO_EXTENSION);
				$text1 = $text. "." .$txtFileType;
				$target_file1 = $target_dir1 . $text. "." .$txtFileType;

				$uploadOk = 1;

			
				print_r($txtFileType );
				//Check if image file is a actual image or fake image
				
				
				    // $check1 = get_file_mime_type($filetmp);
				    // print_r($check1);

				    if($txtFileType == "txt" || "docx" || "doc") {
				        echo "File is an text - " . $txtFileType. ".";
				        $uploadOk = 1;


				        if ($txtfilesize > 1000000) {
						    echo "Sorry, your file is too large.";
						    $uploadOk = 0;
						}
						if (move_uploaded_file($txtfiletmp, $target_file1)) {
						        //echo "The file ". basename($textname). " has been uploaded.";
						        $insert_sql_array = array();
					            $insert_sql_array['resume_name'] = $text1;
					            $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					            $insert_sql_array['user_id'] = $_SESSION['user_id'];
					            $this->db->insert(TBL_RESUME,$insert_sql_array);


					    } else {
					        echo "Sorry, there was an error uploading your file.";
					    }

				    } else {
				        echo "File is not an text.";
				        $uploadOk = 0;
				    }

					$resp['data']=$allinfo['email'];
					echo json_encode($resp);
			
			}



			function viewprof(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

				
				$sql="SELECT * FROM TBL_EMPLOYEE_DEL INNER JOIN TBL_IMAGE ON TBL_EMPLOYEE_DEL.user_id = TBL_IMAGE.user_id WHERE TBL_EMPLOYEE_DEL.employee_id = '".$_SESSION['employee_id']."' ";
				$sql2="select * from ".TBL_EMPLOYEE_EDD." where employee_id='".$_SESSION['employee_id']."' ";
				$sql3="select * from ".TBL_EMPLOYEE_EXP." where employee_id='".$_SESSION['employee_id']."' ";
				$sql4="select * from ".TBL_OTHERS." where employee_id='".$_SESSION['employee_id']."' ";
				$sql5="select * from ".TBL_EMPLOYEE_CERTIFICATION." where employee_id='".$_SESSION['employee_id']."' ";
				$sql7="select * from ".TBL_EMPLOYEE_WORKEX." where employee_id='".$_SESSION['employee_id']."' ";
				$sql6="select * from ".TBL_EMPLOYEE_KEYSKILS." where employee_id='".$_SESSION['employee_id']."' ";
				
				// $sql="SELECT * FROM TBL_EMPLOYEE_DEL INNER JOIN TBL_IMAGE ON TBL_EMPLOYEE_DEL.user_id = TBL_IMAGE.user_id WHERE TBL_EMPLOYEE_DEL.employee_id = '".$_SESSION['employee_id']."' ";
				

				$row= mysql_fetch_assoc($this->db->query($sql,__FILE__,__LINE__));
				
				$result2=$this->db->query($sql2,__FILE__,__LINE__);
				while($roww = mysql_fetch_assoc($result2)) {
				$row2[]=$roww;
				}
				

				$row3= mysql_fetch_assoc($this->db->query($sql3,__FILE__,__LINE__));
				
				$row4= mysql_fetch_assoc($this->db->query($sql4,__FILE__,__LINE__));
				$row4['languages_known']=json_decode($row4['languages_known']);


				$result5=$this->db->query($sql5,__FILE__,__LINE__);
				while($roww = mysql_fetch_assoc($result5)) {
				$row5[]=$roww;
				}
								

				$result6=$this->db->query($sql6,__FILE__,__LINE__);
				while($roww = mysql_fetch_assoc($result6)) {
				$row6[]=$roww;
				}
				
				$result7=$this->db->query($sql7,__FILE__,__LINE__);
				while($roww= mysql_fetch_assoc($result7)) {
					$row7[]=$roww;
				}
				
				// $row8= $this->db->fetch_array($this->db->query($sql8,__FILE__,__LINE__));

				$data=array();
				$data['personal']=$row;
				$data['eddu']=$row2;
				$data['exp']=$row3;
				$data['exp']['empwork']=$row7;
				$data['others']=$row4;
				$data['certificates']=$row5;
				$data['keyskills']=$row6;
			
				
				$resp['data']=$data;
				echo json_encode($resp);
			}


			function savechanges_personal(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

				 print_r($_REQUEST);
				echo $fileName = $_FILES['file']['name'];
				 $filetmp = $_FILES['file']['tmp_name'];
				 $filesize = $_FILES["file"]["size"];



				 if (isset($fileName)) {
				 	$image = sha1(uniqid());
				$target_dir = "uploads/";
				
				
				$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
				$image1 = $image. "." .$imageFileType;
				$target_file = $target_dir . $image. "." .$imageFileType;

				$uploadOk = 1;

			
				    $check = getimagesize($filetmp);
				    // print_r($check);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;


				        if ($filesize > 5000000) {
						    echo "Sorry, your file is too large.";
						    $uploadOk = 0;
						}
						if (move_uploaded_file($filetmp, $target_file)) {
						        //echo "The file ". basename($fileName). " has been uploaded.";
						        $insert_sql_array = array();
					            $insert_sql_array['image_name'] = $image1;
					            $insert_sql_array['employee_id'] = $_SESSION['employee_id'];
					            $insert_sql_array['user_id'] = $_SESSION['user_id'];
					            
					            $this->db->update(TBL_IMAGE,$insert_sql_array,employee_id,$_SESSION['employee_id']);

					    } else {
					        echo "Sorry, there was an error uploading your file.";
					    }

				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				 	# code...
				 }
				
				if (isset($_REQUEST['name'])) {
				$insert_sql_array['name'] =$_REQUEST['name'];
				$insert_sql_array['email'] =$_REQUEST['email'];
				$insert_sql_array['phoneno'] = $_REQUEST['phoneno'];
				$insert_sql_array['altphoneno'] =$_REQUEST['altphoneno'];
				$insert_sql_array['age'] = $_REQUEST['age'];
				$insert_sql_array['address'] = $_REQUEST['address'];
				$insert_sql_array['zip'] = $_REQUEST['zip'];
				$insert_sql_array['gender'] = $_REQUEST['gender'];
				$insert_sql_array['martial_status'] = $_REQUEST['martial_status'];
				$insert_sql_array['facebook_id'] = $_REQUEST['facebook_id'];
				$insert_sql_array['linkedin_id'] = $_REQUEST['linkedin_id'];
				
				$insert_sql_array['prefered_loc'] = $_REQUEST['prefered_loc'];
				$insert_sql_array['current_loc'] = $_REQUEST['current_loc'];
				
 				$this->db->update(TBL_EMPLOYEE_DEL,$insert_sql_array,employee_id,$_SESSION['employee_id']);
				}

			
				
				$resp['data']=$_REQUEST;
				echo json_encode($resp);


			}


			function savechanges_exp(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

				$info_exp=json_decode($_REQUEST['exp'], true);
				$workarray=$info_exp['empwork'];

				 // print_r($workarray);

				$insert_sql_array=array();
				$insert_sql_array['experience_yrs'] = $info_exp['experience_yrs'];
				$insert_sql_array['company_worked'] = $info_exp['company_worked'];
				$insert_sql_array['current_salary'] = $info_exp['current_salary'];
				$insert_sql_array['notice_period'] = $info_exp['notice_period'];

				$this->db->update(TBL_EMPLOYEE_EXP,$insert_sql_array,employee_id,$_SESSION['employee_id']);


				for ($i=0; $i <count($workarray) ; $i++) { 

						$wrk=$workarray[$i];
						$workexid=$wrk['workex_id'];
						$workexcomp=$wrk['company_name'];
						
					if (isset($workexid)) {
							

								$insert_sql_array = array();
								$insert_sql_array['company_name'] = $wrk['company_name'];
								$insert_sql_array['job_title'] = $wrk['job_title'];
								$insert_sql_array['working_time'] = $wrk['working_time'];
					
								$this->db->update(TBL_EMPLOYEE_WORKEX,$insert_sql_array,workex_id,$workexid);

					}else{

						if (isset($workexcomp)) {

								$insert_sql_array = array();
								$insert_sql_array['company_name'] = $wrk['company_name'];
								$insert_sql_array['job_title'] = $wrk['job_title'];
								$insert_sql_array['working_time'] = $wrk['working_time'];

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(TBL_EMPLOYEE_WORKEX,$insert_sql_array);
						}
						
					}
					
				}

				
				echo json_encode($resp);	
			}


			function savechanges_education(){


				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;



				$info_edu=json_decode($_REQUEST['exp'], true);
				// print_r($info_edu);

				for ($i=0; $i <count($info_edu) ; $i++) { 
					
					$edu=$info_edu[$i];
					$eduid=$edu['edu_id'];
					// print_r($eduid);

					if (isset($eduid)) {

							$insert_sql_array['course_name'] = $edu['course_name'];
							$insert_sql_array['city_name'] = $edu['city_name'];
							$insert_sql_array['university_name'] = $edu['university_name'];
							$insert_sql_array['specialization'] = $edu['specialization'];
							$insert_sql_array['passing_year'] = $edu['passing_year'];
							$insert_sql_array['qualification_type'] = $edu['qualification_type'];

							$this->db->update(TBL_EMPLOYEE_EDD,$insert_sql_array,edu_id,$eduid);
						
					}else{
						if (isset($edu['qualification_type'])) {
							
									$insert_sql_array = array();
									$insert_sql_array['course_name'] =$edu['course_name'];
									$insert_sql_array['city_name'] = $edu['city_name'];
									$insert_sql_array['university_name'] = $edu['university_name'];
									$insert_sql_array['specialization'] = $edu['specialization'];
									$insert_sql_array['passing_year'] = $edu['passing_year'];
									$insert_sql_array['qualification_type'] = $edu['qualification_type'];

									$insert_sql_array['user_id'] = $_SESSION['user_id'];
									$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
									$this->db->insert(tbl_employee_edd,$insert_sql_array);
						}
					}
				}

				echo json_encode($resp);

			}

			function savechanges_certification(){


				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;


				$info_cert=json_decode($_REQUEST['exp'], true);
				print_r($info_cert);


				for ($i=0; $i <count($info_cert) ; $i++) { 
					
					$cert=$info_cert[$i];
					$certid=$cert['certificate_id'];
					// print_r($eduid);

					if (isset($certid)) {

								$insert_sql_array = array();
								$insert_sql_array['certificate_name'] = $cert['certificate_name'];
								$insert_sql_array['certificate_number'] = $cert['certificate_number'];
							

							$this->db->update(tbl_employee_certification,$insert_sql_array,certificate_id,$certid);
						
					}else{
						if (isset($cert['certificate_name'])) {
							
								$insert_sql_array = array();
								$insert_sql_array['certificate_name'] = $cert['certificate_name'];
								$insert_sql_array['certificate_number'] = $cert['certificate_number'];

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(tbl_employee_certification,$insert_sql_array);
						}
					}
				}
				echo json_encode($resp);

			}


			function savechanges_skills(){

				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

					$info_skills=json_decode($_REQUEST['exp'], true);
					// print_r($info_skills);
				
				for ($i=0; $i <count($info_skills) ; $i++) { 
					
					$skills=$info_skills[$i];
					$skillid=$skills['skill_id'];
					// print_r($eduid);

					if (isset($skillid)) {

								$insert_sql_array = array();
								$insert_sql_array['keyskill_name'] = $skills['keyskill_name'];
								$insert_sql_array['key_rating'] = $skills['key_rating'];
							

								$this->db->update(TBL_EMPLOYEE_KEYSKILS,$insert_sql_array,skill_id,$skillid);
						
					}else{
						if (isset($skills['keyskill_name'])) {
							
								$insert_sql_array = array();
								$insert_sql_array['keyskill_name'] =$skills['keyskill_name'];
								$insert_sql_array['key_rating'] = $skills['key_rating'];

								$insert_sql_array['user_id'] = $_SESSION['user_id'];
								$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
								$this->db->insert(TBL_EMPLOYEE_KEYSKILS,$insert_sql_array);
						}
					}
				}

				echo json_encode($resp);

			}

			function savechanges_others(){


				$resp=array();
				$resp['status']=true;
				$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

				$info_others=json_decode($_REQUEST['exp'], true);
				$languages=json_encode($info_others['languages_known']);

							$insert_sql_array = array();
							$insert_sql_array['expected_salary'] = $info_others['expected_salary'];
							$insert_sql_array['anyother_detail'] = $info_others['anyother_detail'];
							$insert_sql_array['languages_known'] = $languages;
							
							
							$this->db->update(TBL_OTHERS,$insert_sql_array,employee_id,$_SESSION['employee_id']);

					$resp['data']=$languages;
				echo json_encode($resp);			
							

			}

		

}
?> 
