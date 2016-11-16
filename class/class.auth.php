<?php
class auth{
var $fname,$lname,$email,$password,$type,$zip,$key;


// construct
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
	$this->formvalid= new ValidateForm();
}


function activate_account($email){
	$resp=array();
	$resp['status']=true;
	$resp['status_msg']=ERRORCODE_ACTIVATION_FAILURE;
	if($this->formvalid->IsEmail($email)){
		// true email valid 
		$resp['status']=true;
		$sql="select * from ".TBL_USER." where user = '".$email."' ";
		$result= $this->db->query($sql,__FILE__,__LINE__);
			if($this->db->num_rows($result)==1)
			{
				$resp['status']=true;
				$resp['status_msg']=SUCCESSCODE_ACTIVATION;
				$update_sql_array = array();
				$update_sql_array['status'] = 1;
                
				// $update_sql_array['key'] = "Activated at :".time();
				$this->db->update(TBL_USER,$update_sql_array,'user',$email);
			}else{
				$resp['status']=false;
				$resp['status_msg']=ERRORCODE_ACTIVATION_EMAIL_NOT_EXIST;
			}
		
	}else{
		$resp['status']=false;
		$resp['status_msg']=ERRORCODE_ACTIVATION_FAILURE;
	
	}
	
	
	echo json_encode($resp);
}





function forgot_password($email){
	
	$resp=array();
	$resp['status']=true;
	$resp['status_msg']=ERRORCODE_FORGOTPASSWORD_FAILURE;
	if($this->formvalid->IsEmail($email)){
		// true email valid 
		$resp['status']=true;
		$sql="select * from ".TBL_USER." where user = '".$email."' ";
		$result= $this->db->query($sql,__FILE__,__LINE__);
			if($this->db->num_rows($result)>0)
			{
				$resp['status']=true;
				$resp['status_msg']=SUCCESSCODE_FORGOTPASSWORD;
                
               $length = 10;

                $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

                            $to = $email;
                    
                            $subject = "Forgot password reset @ Itsrecruiment" ;
                            $comment = '<div style="text-align:left">

                            <p>Hello ,</p>
                            <p>Your new password is "'.$randomString.'".</p>
                            <p>Regards,</p>
                            <p>The Itsrecruiment Team</p>
                            </div>';
                            $header = "From: noreply@Itsrecruiment.in\r\n"; 
                            $header.= "MIME-Version: 1.0\r\n"; 
                            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
                            $header.= "X-Priority: 1\r\n"; 

                            mail($to, $subject, $comment, $header);
                
                        
							$update_sql_array = array();
							$update_sql_array['password'] = $randomString;						
							$this->db->update(TBL_USER,$update_sql_array,'user',$email);
                
                        
                   
                
			
			}else{
				$resp['status']=false;
				$resp['status_msg']=ERRORCODE_FORGOTPASSWORD_FAILURE_EMAIL_NOT_EXIST;
			
			}
		
	}else{
		$resp['status']=false;
		$resp['status_msg']=ERRORCODE_FORGOTPASSWORD_FAILURE;
	
	}
	
	
	echo json_encode($resp);
}





function registration($fname,$lname,$email,$password,$type,$zip,$key="",$phoneno){
	
	$resp=array();
	$resp['status']=false;
	$resp['status_msg']=ERRORCODE_REGISTRATION_FAILURE;
	
	
		if($fname==""||$lname==""||$email==""||$password==""||$type==""||$zip=="")
		{
           
           // echo $fname;
			// checking for the 
			$resp['status']=false;
			$resp['status_msg']=ERRORCODE_REGISTRATION_FAILURE_FIELD_MISING;
					
		}else{
		
			// checking for the email existance 
			
			$sql="select * from ".TBL_USER." where email = '".$email."' ";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			if($this->db->num_rows($result)>0)
			{
				$resp['status']=false;
				$resp['status_msg']=ERRORCODE_REGISTRATION_FAILURE_PROFILE_EXIST;
			}else{
				
							$insert_sql_array = array();
							$insert_sql_array['email'] = $email;
							$insert_sql_array['lname'] = $lname;
							$insert_sql_array['fname'] = $fname;
							$insert_sql_array['email'] = $email;
                            $insert_sql_array['password'] = $password;
                            $insert_sql_array['profilepic'] =       "profile_default.png";
                            $insert_sql_array['phoneno'] =    $phoneno;

                            

                
                            if($type==1 || $type==2 || $type==""){
                                $type=="10";
                            }
							$insert_sql_array['type'] = $type;
							$insert_sql_array['zip'] = $zip;							
							
                            $key=sha1(time());	
                            $insert_sql_array['key'] = $key;	
														
							
							$this->db->insert(TBL_USER,$insert_sql_array);
                
                
                            $to = $email;
        //                    $to = "schumi.offi2124@gmail.com";
                           
                            $subject = "Registration Activation @ Shakedup" ;
                            $comment = '<div style="text-align:left">

                            <p>Hello '.$fname.',</p>

                            <p>Thanks for registering with Shakedup.</p>

                            <p>Please follow the link below to activate your account.</p>
</br>

                            <p><a style="   background: #04803a;
            background-image: -webkit-linear-gradient(top, #04803a, #09961e);
            background-image: -moz-linear-gradient(top, #04803a, #09961e);
            background-image: -ms-linear-gradient(top, #04803a, #09961e);
            background-image: -o-linear-gradient(top, #04803a, #09961e);
            background-image: linear-gradient(to bottom, #04803a, #09961e);
            -webkit-border-radius: 5;
            -moz-border-radius: 5;
            border-radius: 5px;
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
            margin:20px;
" href="http://learnsoftwaretesting.in/shakedup/shackedup2124/api.php?work=activation&email='.$email.'&key='.$key.'">Activate now</a></p>
                </br>

                            <p>Regards,</p>

                            <p>The shakedup Team</p>

                            </div>';
                            $header = "From: noreply@Shakedup.com\r\n"; 
                            $header.= "MIME-Version: 1.0\r\n"; 
                            $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
                            $header.= "X-Priority: 1\r\n"; 

                            mail($to, $subject, $comment, $header);
                
							
				
				$resp['status']=true;
				$resp['status_msg']=SUCCESSCODE_REGISTRATION;
				
			}
			
			
		}
			
	
	
	echo json_encode($resp);
}



function checklogin($email,$password){
		
	$resp=array();
	$resp['status']=false;
	$resp['status_msg']=ERRORCODE_LOGIN_FAILURE;
	if($this->formvalid->IsEmail($email) && !$this->formvalid->IsEmpty($password)){
		
		$sql = "select * from ".TBL_USER." where email='".$email."' and status=1";
		$record = $this->db->query($sql,__FILE__,__LINE__);
		$row = $this->db->fetch_array($record);
		if($email == $row['email'] and $password == $row['password'])
		{
			
			$resp['status']=true;
			$resp['status_msg']=SUCCESSCODE_LOGIN	;
			
			
			$this->create_session($row['fname'],$row['user_id'],$row['email'],$row['type']);
		}else if($email != $row['email'] ){
			$resp['status']=false;
			$resp['status_msg']=ERRORCODE_LOGIN_EMAIL_INCORRECT	;
			
		}
		else{
			$resp['status']=false;
			$resp['status_msg']=ERRORCODE_LOGIN_PASSWORD_INCORRECT	;
			
		}
	}else{
		$resp['status']=false;
		$resp['status_msg']=ERRORCODE_LOGIN_FAILURE;
			
		
	}
	
	
	echo json_encode($resp);
}


function create_session($fname,$user_id,$email,$type)
{
	$_SESSION['fname'] = $fname;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['email']= $email;
	$_SESSION['type'] = $type;
}
    
    
    
    
    
    






}
?>