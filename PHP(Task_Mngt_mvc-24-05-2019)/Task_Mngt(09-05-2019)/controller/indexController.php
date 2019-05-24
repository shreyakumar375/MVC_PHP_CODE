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
			$password=$_POST['password'];
			$email=$_POST['email'];
			$loginId=$_POST['LoginId'];
			$user_obj = new user();
			$result = $user_obj->getUserDetails($this->registry->db,$loginId,$username,$password,$c_password,$email);
			$result = json_decode($result);
			
			if(count($result->MVC->user_result)>0)
			{
				
				foreach ($result->MVC->user_result as $key => $value)
				{
					
					$_SESSION['userName'] = $value->TM_info_user_name;
					
					$_SESSION['userRole'] = $value->TM_role_name;	
				}
				if($_SESSION['userRole']=='Admin')
				{

					$this->registry->template->show('manageuser');
				}
				else if($_SESSION['userRole']=='User')
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


	}



?>
