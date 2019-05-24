	<?php

	Class indexController Extends baseController
	{

		public function index() 
		{
			$this->registry->template->show('view');
		}

		public function loginValidation() 
		{
			//echo "string";exit();
			session_start();
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$loginId=$_POST['LoginId'];
			$user_obj = new user();
			$result = $user_obj->getUserDetails($this->registry->db,$loginId,$username,$password,$c_password,$email);
			$result = json_decode($result);
			//print_r(count($result->MVC->user_result));exit();
			//echo '<pre>';print_r($result);exit;
			/*if(empty($username) || empty($password)){
				$this->registry->template->userErrMsg = "Please enter username/password.";
			}else*/ if(count($result->MVC->user_result)>0){
				//print_r($result->user_result);exit;
				foreach ($result->MVC->user_result as $key => $value) {
					//echo $value->TM_info_user_name;
					$_SESSION['userName'] = $value->TM_info_user_name;
					$_SESSION['userEmail'] = $value->TM_info_user_emailid;
					$_SESSION['userName'] = $value->TM_info_user_name;
					$_SESSION['userRole'] = $value->TM_role_name;
				}
				if($_SESSION['userRole']=='Admin'){

				$this->registry->template->show('manageuser');
			}else{
				$this->registry->template->userErrMsg = "Invalid username/password.";
				$this->registry->template->show('view');
			}
			}else{

				$this->registry->template->userErrMsg = "Invalid username/password.";
				$this->registry->template->show('view');
			}
		}
			/*public function getUserDetails()
        {
            
            $login_id=$_POST['TM_info_user_id '];
            $user_name = $_POST['username'];
            $password=$_POST['password']; 
            $c_password=$_POST['cpassword'];
            $Email=$_POST['email']; 
            $user_obj = new user();
            $result = $user_obj->getUserDetails($this->registry->db,$login_id,$user_name,$password,$c_password,$Email);
           
            if(count($result)!='')
			{
				echo json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=>1)));
			}
			else
			{
				echo json_encode(array('MVC'=>array('valid'=>1,'session'=>1,'user_result'=>0)));
			}
        }*/

        /*public function loginValidation(){
        	$this->registry->template->show('new');
        }*/
		
	}
//here is the functionaslity of add delete and remove user

	

	?>
