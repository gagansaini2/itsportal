<?php include('include/common_includes.php');  ?>
<?php require_once("class/class.employee.php");

$user_obj1=new employee();



extract($_REQUEST);     
        $user_obj1->header();

          
?>