<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee.php"); 
//$user_obj1=new employee();

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

		<section id="resume">
			


			<?php

			if (isset($_SESSION['user_id'])) {
				
				if ($_SESSION['user_type']=='2') {
					extract($_REQUEST);
					if($submit=='register'){
						$user_obj1->emptype('server');
					}else{
						$user_obj1->emptype('local');
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
					window.location="signin.php"
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