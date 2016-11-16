<?php  
require_once("class/config.inc.php");
require_once("class/class.user.php");
require_once("class/class.employee.php");
require_once("class/class.employer.php");
require_once("class/class.jobs.php");
require_once("class/class.skills.php");
require_once("class/class.search.php");
require_once("class/class.auth.php");


$user_obj= new user();
$employee_obj=new employee();
$employer_obj=new employer();
$jobs_obj=new jobs();
$skill_obj=new skills();
$search_obj=new search();
$auth_obj=new auth();


// echo "<pre>";
// ini_set('max_execution_time', 800);
extract($_REQUEST);

// print_r($id);

if($work=="user_logged"){
    if(!isset($_SESSION['user_id'])){
       
        $arr[user_id]=0;
        echo json_encode($arr);
        
    }else{
       echo json_encode($_SESSION);

    }
}

if ($work=='get_lang') {
	
	$skill_obj -> getlang();
}

if ($work=='save_info') {
	
	$skill_obj -> saveinfo();
}

if ($work=='get_info') {
	
	$skill_obj -> getinfo();
}

if ($work=='get_skills') {
	
	$skill_obj -> getskills();
}

if ($work=='add_skills') {
	
	$skill_obj -> addskills();
}


if ($work=='prof_submit') {
	
	$skill_obj -> submitprof();
}


if ($work=='upload_pic') {
	
	$skill_obj -> uploadpic();
}


if ($work=='view_prof') {
	
	$skill_obj -> viewprof();
}

if ($work=='get_cities') {
	
	$skill_obj -> getcities();
}


if ($work=='get_countries') {
	
	$skill_obj -> get_countries();
}

if ($work=='save_personal') {
	
	$skill_obj -> savechanges_personal();
}


if ($work=='save_exp') {
	
	$skill_obj -> savechanges_exp();
}


if ($work=='save_education') {
	
	$skill_obj -> savechanges_education();
}

if ($work=='save_certification') {
	
	$skill_obj -> savechanges_certification();
}

if ($work=='save_skills') {
	
	$skill_obj -> savechanges_skills();
}

if ($work=='save_others') {
	
	$skill_obj -> savechanges_others();
}

if ($work=='comp_submit') {
	
	$jobs_obj -> subcompany();
}


if ($work=='job_submit') {
	
	$jobs_obj -> submitjob();
}

if ($work=='UG_list') {
	
	$employer_obj -> undergrad_list();
}

if ($work=='PG_list') {
	
	$employer_obj -> postgrad_list();
}

if ($work=='DOC_list') {
	
	$employer_obj -> doctorate_list();
}

if ($work=='get_spec') {
	
	$employer_obj -> getspec($spec_type);
}



if ($work=='apply_job') {
	
	$jobs_obj -> applyJob();
}


if ($work=='panel_login') {
	
	$jobs_obj -> loginpanel();
}


if ($work=='job_search') {
	
	$search_obj -> jobsearch();
}

if ($work=='applicant_prof') {
	
	$skill_obj -> candidateprof($id);
}

if ($work=='candidate_prof') {
	
	$skill_obj -> cand_profile($id);
}



if ($work=='get_companieslist') {
	
	$jobs_obj -> get_companies();
}


if ($work=='get_myjoblist') {
	
	$jobs_obj -> get_myjobs();
}


if ($work=='get_emplist') {
	
	$jobs_obj -> get_employeelist($jobid);
}


if ($work=='del_company') {
	
	$jobs_obj -> delete_company($companyid);
}


if ($work=='del_myjob') {
	
	$jobs_obj -> delete_myjob($jobid);
}




if ($work=='edit_company') {
	
	$jobs_obj -> edit_comp($compid);
}


if ($work=='edit_subcomp') {
	
	$jobs_obj -> sub_editcompany();
}

if ($work=='edit_myjob') {
	
	$jobs_obj -> edit_myjob($jobid);
}




if ($work=='edit_subjob') {
	
	$jobs_obj -> sub_editjob();
}


if ($work=='forgot') {
	
	$auth_obj -> forgot_password($email);
}

if ($work=='get_name') {
	
	$skill_obj -> get_emp_name();
}


if ($work=='save_profile') {
	
	$skill_obj -> save_myprofile();
}


if ($work=='get_jobs') {
	
	$jobs_obj -> get_jobs();
}







if ($work=='activation') {
	
	$auth_obj -> activate_account($email);
	$employee_obj ->activation_msg();	
}


 ?>
