	<?php

	Class indexController Extends baseController
	{

		public function index() 
		{
			$this->registry->template->show('view');
		}

		/*public function loginValidation()
		{
			$this->registry->template->show('manageuser');
		}*/
			public function getUserDetails()
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
					
				}
        }
		
	}
//here is the functionaslity of add delete and remove user



	?>
