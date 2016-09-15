<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employer.php"); 
$user_obj2=new employer();

 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Jobseek - Job Board Responsive HTML Template">
		<meta name="author" content="Coffeecream Themes, info@coffeecream.eu">
		<title>ITS Recruitment</title>
		<link rel="shortcut icon" href="images/favicon.png">

		<!-- Main Stylesheet -->
		<link href="css/style.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section ng-app="its" ng-controller="companyprof">

			<div class="modal fade" id="myyModal" data-backdrop="static" role="dialog">
			    <div class="modal-dialog" style="margin-top:200px;">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header  text-center">
			          
			          <h3 class="modal-title">Your Job has been posted</h3>
			        </div>
			       
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" style="float:left;" ><a href="jobslist.php">See Jobs List</a></button>

			          <button type="button" class="btn btn-default" style="float:right;"><a href="" onclick="location.reload()">Add more Jobs</a></button>
			        </div>
			      </div>
			      
			    </div>
			  </div>


<?php

	if ($_SESSION['user_type']=='4') {

?>		
	
			  <div class="modal fade" id="companymodal" data-backdrop="static" role="dialog" ng-init="load()">
			    <div class="modal-dialog" style="margin-top:200px;">
			    
			      <!-- Modal content-->
			      <div class="modal-content" style="padding:10%;">
			      	 <div class="modal-body" >

			        	<h4 >JOB for :</h4><br>
			        	<div class="col-sm-12">
				        	<div class="col-sm-4 text-center" ng-repeat="x in companylist">
				        		<a ng-click="selectcomp(x)">
				        			<img src="uploads/{{x.company_logo.logo_name}}" style="width:100px; height:100px;"><br>
				        			<h6>{{x.company.company_name}}</h6>
				        		</a><br>



				        	</div>
				        	
			        	</div>
		        		<div class="row">
						    <div class="col-sm-5">
						          <hr class="dashed">
				        	</div>
				        	<span class="col-sm-1">
				        	<b>OR</b>
				        	</span>
				        	<div class="col-sm-5">
						          <hr class="dashed">
				        	</div>
				        </div>

				        <div class="row text-center">
				        	<br><a class="btn btn-primary" href="companyprof.php">new company profile</a>
				        </div>
		          	
			        </div>
			       
			      </div>
			      
			    </div>
			  </div>
<?php	}		
?>

			<?php

			$sql2="select count(*) as total from ".TBL_COMPANY." where user_id='".$_SESSION['user_id']."'";
            $result2=$user_obj2->db->query($sql2,__FILE__,__LINE__);
            $row=mysql_fetch_assoc($result2);
					                          

			if (isset($_SESSION['user_id'])) {

				if ($_SESSION['user_type']=='4' || '3') {
					
					if ($row['total'] > 0) {


						extract($_REQUEST);
						if($submit=='register'){
							$user_obj2->post_job('server');
						}else{
							$user_obj2->post_job('local');
						}

					}else{
						?>
					<script type="text/javascript">
						window.location="companyprof.php"
					</script>
					<?php

					}
				}else{
					
					?>
					<script type="text/javascript">
						window.location="index.php"
					</script>
					<?php	
				}
			}else{
				?>
					<script type="text/javascript">
						window.location="signin-employer.php"
					</script>
					<?php	
			}
				
				

				 ?>



		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		<?php include('include/footer.php'); ?>

	</body>
</html>