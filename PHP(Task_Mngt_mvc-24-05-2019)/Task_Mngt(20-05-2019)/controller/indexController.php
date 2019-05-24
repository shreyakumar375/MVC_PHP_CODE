<?php

	Class indexController Extends baseController
	{

		public function index() 
		{
			$this->registry->template->show('view');

		}

		public function loginValidation() 
		{
			session_start();
			$username=$_POST['username'];
			$password=md5($_POST['password']);
			$email=$_POST['email'];
			$loginId=$_POST['LoginId'];
			$user_obj = new user();
			$result = $user_obj->getUserDetails($this->registry->db,$loginId,$username,$password,$c_password,$email);
			$result = json_decode($result);
			
			if(count($result->MVC->user_result)>0)
			{
				
				foreach ($result->MVC->user_result as $key => $value)
				{
					
					$_SESSION['username'] = $value->TM_info_user_name;
					$_SESSION['password'] = $value->TM_info_user_pass;
					
					$_SESSION['userRole'] = $value->TM_role_name;
					$_SESSION['email'] = $value->TM_info_user_emailid;	
				}
				if($_SESSION['userRole']=='SuperAdmin')
				{

					$this->registry->template->show('manageuser');
				}
				else if($_SESSION['userRole']=='Admin')
				{

					$this->registry->template->show('manageroles');
				}
				else
				{
					$this->registry->template->userErrMsg = "Invalid username/password.";
					$this->registry->template->show('view');
				}
			}
			else
			{

				$this->registry->template->userErrMsg = "Invalid username/password.";
				$this->registry->template->show('view');
			}
		}
		public function samePage() 
		{
			$this->registry->template->show('manageuser');
		}

	}



?>
