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


				 print_r($_REQUEST);


				if ($_REQUEST['loc']) {
					
						$sql="select * from ".TBL_JOBS." where role_location= '".$_REQUEST['loc']."' ";

						$result= $this->db->query($sql,__FILE__,__LINE__);


						$data=array();
						while ( $row= $this->db->fetch_array($result)) {
						

						$data[]=$row['job_id'];
						// print_r($data);
						}
						
						print_r($data);
				}



				if (condition) {
					# code...
				}

			// $resp['status']=true;
			// $resp['data']=$_REQUEST[skills];
			echo json_encode($resp);




		}



}
?>		