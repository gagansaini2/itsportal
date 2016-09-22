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

				if (sizeof($location) > 0) {

						
						for ($i=0; $i <count($location) ; $i++) { 

							$sql="select * from ".TBL_JOBS." where location_id= '".$location[$i]."' ";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							while ( $row= $this->db->fetch_array($result)) {
						

							$search_result[]=$row['job_id'];
							// print_r($search_result);
							}
							

						}
				}
// print_r(sizeof($options));

				if (sizeof($options) > 0) {

						
						for ($i=0; $i <count($options) ; $i++) { 


							$sql="select * from ".TBL_JOBSKILLS." where skill_id= '".$options[$i]."' ";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							while ( $row= $this->db->fetch_array($result)) {
							
							
							$search_result[]=$row['job_id'];
							// print_r($search_result);
							}
							

						}
				}


				if (isset($experience)) {



						$sql="select * from ".TBL_JOBS." where min_experience= '".$experience."' ";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						while ( $row= $this->db->fetch_array($result)) {
						

							$search_result[]=$row['job_id'];

						}
				}


				if (isset($salary)) {



						$sql="select * from ".TBL_JOBS." where max_remuneration= '".$salary."' ";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						while ( $row= $this->db->fetch_array($result)) {
						

							$search_result[]=$row['job_id'];

						}
				}


				$search_result=array_unique($search_result);


				$final=array();
				for ($i=0; $i <count($search_result) ; $i++) { 


						$sql="select * from ".TBL_JOBS." where job_id= '".$search_result[$i]."' ";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						$row= $this->db->fetch_array($result); 
						

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


			// $resp['status']=true;
			$resp['data']=$final;
			echo json_encode($resp);




		}



}
?>		