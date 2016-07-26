<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee1.php"); 
$user_obj=new employee1();

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
		<!-- <link rel="stylesheet" type="text/css" href="js\bower_components\bootstrap\dist\css\bootstrap.min.css"> -->
		<!-- Main Stylesheet -->
		<!-- <link href="css/style.css" rel="stylesheet"> -->

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		


	</head>
	<body >

		<!-- ============ PAGE LOADER START ============ -->
<?php include('include/header.php'); ?>

		<!-- ============ HEADER END ============ -->

		<!-- ============ RESUME START ============ -->

		<section id="resume">
			


			<?php
				extract($_REQUEST);
					if($submit=='register'){
						$user_obj->empprofile('server');
					}else{
						$user_obj->empprofile('local');
					}
				

				 ?>



		</section>

		<!-- ============ RESUME END ============ -->

		<!-- ============ CONTACT START ============ -->

		 <?php include('include/footer.php'); ?> 

	</body>
</html>
<script src="js\bower_components\jquery\dist\jquery.min.js"></script>
<script src="js\bower_components\bootstrap\dist\js\bootstrap.min.js"></script>
<script src="js\bower_components\twitter-bootstrap-wizard\jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
  	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
		
		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
			$('#rootwizard').find('.pager .next').hide();
			$('#rootwizard').find('.pager .finish').show();
			$('#rootwizard').find('.pager .finish').removeClass('disabled');
			

		} else {
			$('#rootwizard').find('.pager .next').show();
			$('#rootwizard').find('.pager .finish').hide();
		}
		
	}, onNext: function(tab, navigation, index) {
			if(index==1) {
				// Make sure we entered the name
				// if(!$('#name').val()) {
				// 	alert('You must enter your name');
				// 	$('#name').focus();
				// 	return false;
				// }
			}
			
			
		}});
	// $('#rootwizard .finish').click(function() {
	// 	alert('Finished!, Starting over!');
	// 	$('#rootwizard').find("a[href*='tab1']").trigger('click');
	// });
});
</script>
<script type="text/javascript">
							jQuery(document).ready(function($)
							{
								$("#s2example-2").select2({
									placeholder: 'Choose your favorite US Countries',
									allowClear: true
								}).on('select2-open', function()
								{
									// Adding Custom Scrollbar
									$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
								});
								
							});
						</script>


