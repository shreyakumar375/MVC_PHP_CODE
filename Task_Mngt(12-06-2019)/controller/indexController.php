<?php

Class indexController Extends baseController
{

	public function index() 
	{
		if(isset($_SESSION['user_feature_info']['User_id'])){
			if($_SESSION['user_feature_info']['Role_name']=='SuperAdmin')
			{

				$this->registry->template->show('view');
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
			
			$this->registry->template->show('view');
		}	
	}

	public function loginValidation() 
	{
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$email=$_POST['email'];
		$loginId=$_POST['LoginId'];
		$user_obj = new user();
		$result = $user_obj->getUserDetails($this->registry->db,$loginId,$username,$password,$c_password,$email);
		

		$result = json_decode($result,true);
		
		$_SESSION['user_feature_info']=$result['MVC']['user_result'];
		//print_r($_SESSION['user_feature_info']['email_id']);exit();
		
		if(count($_SESSION['user_feature_info'])>0)
		{
			
			$this->registry->template->result = $result;
		    $this->registry->template->show('dashboard');
			
		}
		else
		{
			$this->registry->template->userErrMsg = "Invalid username/password.";
			$this->registry->template->show('view');
			
		}
	}

			// logout functionality
			public function logoutPortal()
			{
				session_destroy();
				$this->registry->template->show('view');
			}
			public function samePage() 
			{
				if(isset($_SESSION['user_feature_info']['user_id']))
				{
					$this->registry->template->show('dashboard');
				}
				else
				{
						$this->registry->template->show('view');
				}	
			}

		}

?>
