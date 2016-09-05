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
		<link rel="stylesheet" href="js/bower_components/selectize/dist/css/selectize.default.css ">
		<!-- <link rel="stylesheet" type="text/css" href="js\bower_components\bootstrap\dist\css\bootstrap.min.css"> -->
		<!-- Main Stylesheet -->
		<link href="css/style.css" rel="stylesheet">

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

		<section>
			


			<?php
				extract($_REQUEST);
					if($submit1=='register'){
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

<!-- <script src="js\bower_components\bootstrap\dist\js\bootstrap.min.js"></script> -->
<script src="js\bower_components\twitter-bootstrap-wizard\jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

		var $validator = $("#fooorm").validate({

		  rules: {
		    username: {
		      required: true,
		      email: true
		     
		    },
		    fname: {
		      required: true,
		    },
		    lname: {
		      required: true,
		    },
		    phoneno:{
		    	required: true,
		    	number: true
		    },
		    street: {
		    	required: true
		    },
		    resicity: {
		    	required: true
		    },
		    state: {
		    	required: true
		    },
		    zip:{
		    	required: true,
		    	number: true
		    },
		    month: {
		    	required: true
		    },
		    day: {
		    	required: true
		    },
		    year: {
		    	required: true
		    },
		    gender:{
		    	required: true
		    },
		    maritalStatus:{
		    	required: true
		    },
		    jobtype:{
		    	required: true
		    },
		    currentlocation:{
		    	required: true
		    },
		    preferloc:{
		    	required: true
		    },
		   	exyear:{
		    	required: true
		    },
		    anumsal:{
		    	required: true
		    },
		    noticeperiod:{
		    	required: true
		    },
		    
		    highestqualification:{
		    	required: true
		    },
		    course:{
		    	required: true
		    },
		    specialization:{
		    	required: true
		    },
		    university:{
		    	required: true
		    },
		    city:{
		    	required: true
		    },
		    year_passing:{
		    	required: true
		    },
		    compname:{
		    	required: true
		    },
		    jobtitle:{
		    	required: true
		    },
		    workinmonth:{
		    	required: true
		    },
		     workinday:{
		    	required: true
		    },

		     workinyear:{
		    	required: true
		    },
		    country:{
		    	required: true
		    },
		    myphoto:{
		    	extension: "jpg|jpeg|png"
		    },
		    resume:{
		    	extension: "doc|docx|txt"
		    },
		    disabilitytype:{
		    	required: true
		    },
		    passportnum:{
		    	required: true
		    }

		  },
		 	errorPlacement: function(error, element) {
			if (element.attr("name") == "gender")
			    {
			        error.insertBefore("#span_gender");
			    }
			    else
			    {
			        error.insertAfter(element);
			    }
			}



		 
		 	
		});


	
  	$('#rootwizard').bootstrapWizard({ onNext: function(tab, navigation, index) {
			
	  			var $valid = $("#fooorm").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				
	  				return false;	 
	  			}
			
			
			
		}, onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
		
		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
			$('#rootwizard').find('.pager .next').hide();
			$('#rootwizard').find('.finish').show();
			$('#rootwizard').find('.pager .finish').removeClass('disabled');

			

		} else {
			$('#rootwizard').find('.pager .next').show();
			$('#rootwizard').find('.pager .finish').hide();
		}

			
		}, onTabClick:  function(tab, navigation, index){
			// return false;

		}, onFinish: function(tab, navigation, index){
			
			// var $valid = $("#fooorm").valid();
	  // 			if(!$valid) {
	  // 				$validator.focusInvalid();
	  				
	  // 				return false;	 
	  // 			}
		}
	});
	// $('#rootwizard .finish').click(function() {
		
	// });
});

</script>




