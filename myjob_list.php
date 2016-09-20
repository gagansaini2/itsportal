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
		<title>its</title>
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

		<section ng-app="its" ng-controller="companylist">
			

			<div class="modal fade" id="deljob" role="dialog">
			    <div class="modal-dialog modal-sm"  style="margin-top:200px;">
			      <div class="modal-content">
			       
			        <div class="modal-body text-center">
			          <p><b>Remove this Job</b></p>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-primary" ng-click="jobdel()">Yes</button>
			          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			        </div>
			      </div>
			    </div>
			</div>
 

			<div class="modal fade" id="myjoblistempty" data-backdrop="static" role="dialog">
			    <div class="modal-dialog modal-sm"  style="margin-top:200px;">
			      <div class="modal-content">
			      
			        <div class="modal-body text-center">
			           <h5>no job is added by you yet!</h5>
			        </div>
			        <div class="modal-footer text-center">
			          <a href="postjob.php" class="btn btn-primary">add now</a>
			         
			        </div>
			      </div>
			    </div>
			</div>
 




			<?php

			$sql2="select count(*) as total from ".TBL_COMPANY." where user_id='".$_SESSION['user_id']."'";
            $result2=$user_obj2->db->query($sql2,__FILE__,__LINE__);
            $row=mysql_fetch_assoc($result2);
					                               
					                                  

			if (isset($_SESSION['user_id'])) {

				if ($_SESSION['user_type']=='4' || '3') {
					
						extract($_REQUEST);

						$user_obj2->myjob_list();
						
				
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
