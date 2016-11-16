<?php
class search{

	 var $db;
	 var $validity;
	
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->auth=new Authentication();
		
		$this->Form = new ValidateForm();
		$this->validity = new ClsJSFormValidation();

		
		}


		function jobsearch(){

			$resp=array();
			$resp['status']=false;
			$resp['status_msg']=ERRORCODE_PROPERY_FAILURE_FIELD_MISING;

			// print_r($_REQUEST);

				$searchobj=json_decode($_REQUEST['search'], true);

				$options=$searchobj['options'];
				$location=$searchobj['location'];
				$experience=$searchobj['experience'];
				$salary=$searchobj['salary'];


				
				$search_result=array();


				if (sizeof($options) > 0) {
								
					for ($i=0; $i <count($options) ; $i++) { 

						if (sizeof($location) > 0) {
							
							for ($j=0; $j <count($location) ; $j++) {

								$sql_job="select * from ".TBL_JOBS." inner join ".TBL_JOBSKILLS." on ".TBL_JOBSKILLS.".job_id=".TBL_JOBS.".job_id where skill_id= '".$options[$i]."' and location_id = '".$location[$j]."' ";
								
								$max_exp=$experience + 3;
								$sql_job.=" and min_experience >= '".$experience."' and max_experience <= '".$max_exp."'";					


								if (isset($salary)) {
									
									$sql_job.="and min_remuneration >= '".$salary."' ";
								}

								
								$result= $this->db->query($sql_job,__FILE__,__LINE__);
								while ( $row= $this->db->fetch_array($result)) {
								
								
								$search_result[]=$row['job_id'];
								// print_r($search_result);
								}
							} 
							

						}else{

							$sql_job="select * from ".TBL_JOBS." inner join ".TBL_JOBSKILLS." on ".TBL_JOBSKILLS.".job_id=".TBL_JOBS.".job_id where skill_id= '".$options[$i]."' ";
								
							$max_exp=$experience + 3;
							$sql_job.=" and min_experience >= '".$experience."' and max_experience <= '".$max_exp."'";					


							if (isset($salary)) {
								
								$sql_job.="and min_remuneration >= '".$salary."' ";
							}

							// print_r($sql_job);
							$result= $this->db->query($sql_job,__FILE__,__LINE__);
							while ( $row= $this->db->fetch_array($result)) {
							
							
							$search_result[]=$row['job_id'];
							// print_r($search_result);
							}



						}



					}
				}


				
				
				$search_result=array_unique($search_result);
// print_r($search_result);

				$search_result=array_values($search_result);


// print_r($search_result);

			$final=array();
			
				for ($i=0; $i <count($search_result) ; $i++) { 


						$sql="select * from ".TBL_JOBS." where job_id= '".$search_result[$i]."' ";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						$row= $this->db->fetch_array($result); 
						

						if ($row['posted_on']!="") {
					
				
						$post_time=$row['posted_on'];		
						$curr_time=time();
						$diff=$curr_time - $post_time;


						//no. minutes,hours,days,mnths....
						$min=floor($diff/60);
						$hours=floor($diff/(60*60));
						$days=floor($diff/(60*60*24));
						$weeks=floor($diff/(60*60*24*7));

						if ($min > 60) {
							
							if ($hours > 24) {
								
								if ($days > 7) {
									
									if ($weeks > 1) {
										$posted_on=$weeks." weeks ago";	
									}elseif($weeks == 1){
										$posted_on="a week ago";	
									}

								}elseif($days == 1){
									$posted_on="a day ago";							
								}else{
									$posted_on=$days." days ago";	
								}

							}elseif($hours == 1){

								$posted_on="an hour ago";
							}else{

								$posted_on=$hours." hours ago";
							}

						}else{
							$posted_on=$min." minutes ago";
						}

						$row['posted_on']=$posted_on;
						}	





						$sql1="select * from ".TBL_LOGO." where company_id= '".$row['company_id']."' ";
						$result1= $this->db->query($sql1,__FILE__,__LINE__);
						$row1= $this->db->fetch_array($result1); 
						
						$row['logo_name']=$row1['logo_name'];

						$sql2="select * from ".TBL_COMPANY." where company_id= '".$row['company_id']."' ";
						$result2= $this->db->query($sql2,__FILE__,__LINE__);
						$row2= $this->db->fetch_array($result2);

						$row['company_name']=$row2['company_name'];

						$sql3="select * from ".TBL_STATELIST." where location_id= '".$row['location_id']."' ";
						$result3= $this->db->query($sql3,__FILE__,__LINE__);
						$row3= $this->db->fetch_array($result3);

						$row['job_loc']=$row3['city_name'];

						$final[]=$row;


				}


			$resp['status']=true;
			$resp['data']=$final;
			echo json_encode($resp);




		}



}
?>		