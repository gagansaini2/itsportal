<?php  
require_once("class/config.inc.php");
require_once("class/class.user.php");
require_once("class/class.employee.php");
require_once("class/class.employer.php");
require_once("class/class.jobs.php");


$user_obj= new user();
$employee_obj=new employee();
$employer_obj=new employer();
$jobs_obj=new jobs();



extract($_REQUEST);

print_r($id);

if($work=="user_logged"){
    if(!isset($_SESSION['user_id'])){
       
        $arr[user_id]=0;
        echo json_encode($arr);
        
    }else{
       echo json_encode($_SESSION);

    }
}

 ?>
