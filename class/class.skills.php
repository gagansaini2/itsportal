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

 			
			$result=mysql_query("SELECT count(*) as total from TBL_EMPINFO where employee_id='".$_SESSION['employee_id']."'");
			$sql=mysql_fetch_assoc($result);
			// print_r($sql);
			//  print_r(count($sql));

			if ($sql['total'] > 0 ) {
				

				$insert_sql_array=array();
			$insert_sql_array['user_id'] = $_SESSION['user_id'];
			$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
			$insert_sql_array['info'] = $_REQUEST[name];	

			$this->db->update(TBL_EMPINFO,$insert_sql_array,employee_id,$_SESSION['employee_id']);


			}else{


			$insert_sql_array=array();
			$insert_sql_array['user_id'] = $_SESSION['user_id'];
			$insert_sql_array['employee_id'] = $_SESSION['employee_id'];
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



				$sql="select * from ".TBL_EMPINFO." where employee_id='".$_SESSION['employee_id']."' ";
				$result= $this->db->query($sql,__FILE__,__LINE__);


				$data=array();
				
				$row= $this->db->fetch_array($result);
					
				$data['backinfo']=$row['info'];

				
				
				
				//print_r($data);

				$resp['data']=$data;

				echo json_encode($resp);

		}


}
?> 