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


}
?> 