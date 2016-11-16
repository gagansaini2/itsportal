<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee.php");
require_once("class/class.employer.php");

$user_obj1=new employee();
$user_obj2=new employer();



extract($_REQUEST);     
        $user_obj1->header();

          
?>
<script type="text/javascript">
	
	selectcompany=function(){

		window.location="postjob.php"

		
	}

	

</script>
